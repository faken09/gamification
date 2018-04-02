<?php

namespace App\Http\Controllers\Admin;

use App\Enemy;
use App\Http\Requests\EnemyRequest;
use App\Quest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EnemyController extends Controller
{

    // Create a new thumbnail file for images
    public function createThumbnailfromFile($width, $height, $orignalfile)
    {
        $upload = Image::make($orignalfile->getRealPath())->fit($width, $height, function ($c) {
            $c->aspectRatio();
        });
        $upload->encode('jpg');
        return $upload;
    }


    public function index()
    {
        $enemies = Enemy::orderBy('name', 'ASC')->get();
        return view('admin.enemies.index', compact('enemies'));
    }

    public function create()
    {
        $quests = Quest::orderBy('title', 'ASC')->get();
        return view('admin.enemies.create', compact('quests'));
    }

    public function store(EnemyRequest $request)
    {

        $enemy = new Enemy;
        $enemy->name = $request->name;
        $enemy->description = $request->description;
        $enemy->health = $request->health;
        $enemy->attack = $request->attack;

        if ($request->file('image')) {
            $image = md5($request->name . microtime());
            $imageFilename = $image . ".jpg";
            $file = @file_get_contents($request->image);
            $imageSaved = Storage::disk(env('STORAGE_DISK_DRIVER'))->put('enemies/' . $imageFilename, $file,
                [
                    'visibility' => 'public',
                    'CacheControl' => 'max-age=31536000'
                ]);

            if ($imageSaved) {
                $imageFilename_sm = $image . '_sm.jpg';
                $file = $this->createThumbnailfromFile(80, 80, $request->file('image'));
                $imageSmSaved = Storage::disk(env('STORAGE_DISK_DRIVER'))->put('enemies/' . $imageFilename_sm, $file,
                    [
                        'visibility' => 'public',
                        'CacheControl' => 'max-age=31536000'
                    ]);
            }

        }
        if ($imageSaved && $imageSmSaved) {
            $enemy->image = $imageFilename;
            $enemy->image_sm = $imageFilename_sm;


            if ($enemy->save()) {
                return redirect()->route('admin.enemies.index')->with('flash_message', $enemy->id .' er blevet oprettet!');
            }

        }

    }

    public function edit($id)
    {
        $enemy = Enemy::findOrFail($id);
        if ($enemy) {
            $quests = Quest::orderBy('title', 'ASC')->get();
            return view('admin.enemies.edit', compact('enemy', 'quests'));
        }
    }

    public function update($id, EnemyRequest $request)
    {
        $enemy = Enemy::findOrFail($id);
        if ($enemy) {
            $enemy->name = $request->name;
            $enemy->description = $request->description;
            $enemy->health = $request->health;
            $enemy->attack = $request->attack;

            if ($request->file('image')) {
                $imageFilename = $enemy->image;
                $file = @file_get_contents($request->image);
                $imageSaved = Storage::disk(env('STORAGE_DISK_DRIVER'))->put('enemies/' . $imageFilename, $file,
                    [
                        'visibility' => 'public',
                        'CacheControl' => 'max-age=31536000'
                    ]);

                if ($imageSaved) {

                    $imageFilename_sm = $enemy->image_sm;
                    $file = $this->createThumbnailfromFile(80, 80, $request->file('image'));
                    Storage::disk(env('STORAGE_DISK_DRIVER'))->put('enemies/' . $imageFilename_sm, $file,
                        [
                            'visibility' => 'public',
                            'CacheControl' => 'max-age=31536000'
                        ]);
                }


            }

            if ($enemy->save()) {
                return redirect()->route('admin.enemies.index')->with('flash_message', $enemy->id .' er blevet oprettet!');
            }



        }
    }

    // delete one player
    public function destroy($id)
    {

        //find id by slug
        $enemy = Enemy::findOrFail($id);

        if($enemy->image) {
            Storage::disk(env('STORAGE_DISK_DRIVER'))->delete("/enemies/".$enemy->image);
            Storage::disk(env('STORAGE_DISK_DRIVER'))->delete("/enemies/".$enemy->image_sm);
        }

        // check to see if user is owner of the post
        if ($enemy->delete()) {
            return back()->with('flash_message', $enemy->id .' er blevet slettet!');
        }
        abort(404, 'page not found');
    }

}
