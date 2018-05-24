<?php

namespace App\Http\Controllers\Admin;

use App\Enemy;
use App\Http\Requests\QuestRequest;
use App\Level;
use App\Location;
use App\Quest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class QuestController extends Controller
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

        $quests = Quest::orderBy('title', 'ASC')->get();
        return view('admin.quests.index', compact('quests'));
    }

    public function create()
    {
        $levels = Level::orderBy('id', 'ASC')->get();
        return view('admin.quests.create', compact('levels'));
    }

    public function store(QuestRequest $request)
    {


        $quest = new Quest;
        $quest->title = $request->title;
        $quest->description = $request->description;
        $quest->info = $request->info;
        $quest->solution = $request->solution;
        $quest->gold_rewards = $request->gold_rewards;
        $quest->experience_gains = $request->experience_gains;


        if ($request->required_level) {
            $level = Level::findOrFail($request->required_level);
            if ($level->id) {
                $quest->required_level = $level->id;
            }
        }

        if ($request->file('image')) {
            $image = md5($request->name . microtime());
            $imageFilename = $image . ".jpg";
            $file = @file_get_contents($request->image);
            $imageSaved = Storage::disk(env('STORAGE_DISK_DRIVER'))->put('quests/' . $imageFilename, $file,
                [
                    'visibility' => 'public',
                    'CacheControl' => 'max-age=31536000'
                ]);

            if ($imageSaved) {
                $imageFilename_sm = $image . '_sm.jpg';
                $file = $this->createThumbnailfromFile(420, 236, $request->file('image'));
                $imageSmSaved = Storage::disk(env('STORAGE_DISK_DRIVER'))->put('quests/' . $imageFilename_sm, $file,
                    [
                        'visibility' => 'public',
                        'CacheControl' => 'max-age=31536000'
                    ]);
            }

        }
        if ($imageSaved && $imageSmSaved) {
            $quest->image = $imageFilename;

            if ($quest->save()) {
                return redirect()->route('admin.quests.index')->with('flash_message', $quest->id . ' er blevet oprettet!');
            }

        }


    }

    public function edit($id)
    {
        $quest = Quest::findOrFail($id);
        if ($quest) {

            $levels = Level::orderBy('id', 'ASC')->get();
            return view('admin.quests.edit', compact('quest', 'levels'));
        }
    }

    public function update($id, QuestRequest $request)
    {
        $quest = Quest::findOrFail($id);
        if ($quest) {
            $quest->title = $request->title;
            $quest->description = $request->description;
            $quest->info = $request->info;
            $quest->solution = $request->solution;
            $quest->gold_rewards = $request->gold_rewards;
            $quest->experience_gains = $request->experience_gains;


            if ($request->required_level) {
                $level = Level::findOrFail($request->required_level);
                if ($level->id) {
                    $quest->required_level = $level->id;
                }
            }

            if ($request->file('image')) {
                $imageFilename = $quest->image;
                $file = @file_get_contents($request->image);
                $imageSaved = Storage::disk(env('STORAGE_DISK_DRIVER'))->put('quests/' . $imageFilename, $file,
                    [
                        'visibility' => 'public',
                        'CacheControl' => 'max-age=31536000'
                    ]);

                if ($imageSaved) {
                    $imageFilename_sm = $image . '_sm.jpg';
                    $file = $this->createThumbnailfromFile(420, 236, $request->file('image'));
                    $imageSmSaved = Storage::disk(env('STORAGE_DISK_DRIVER'))->put('quests/' . $imageFilename_sm, $file,
                        [
                            'visibility' => 'public',
                            'CacheControl' => 'max-age=31536000'
                        ]);
                }

            }

            if ($quest->save()) {
                return redirect()->route('admin.quests.index')->with('flash_message', $quest->id . ' er blevet oprettet!');
            }


        }
    }

    // delete one player
    public function destroy($id)
    {
        //find id by slug
        $quest = Quest::findOrFail($id);

        // check to see if user is owner of the post
        if ($quest->delete()) {
            return back()->with('flash_message', $quest->id . ' er blevet slettet!');
        }
        abort(404, 'page not found');
    }

}
