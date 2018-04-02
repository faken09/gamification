<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LocationRequest;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LocationController extends Controller
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
        $locations = Location::orderBy('name', 'ASC')->get();
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(LocationRequest $request)
    {

        $location = new Location;
        $location->name = $request->name;
        $location->description = $request->description;

        if ($request->file('image')) {
            $image = md5($request->name . microtime());
            $imageFilename = $image . ".jpg";
            $file = @file_get_contents($request->image);
            $imageSaved = Storage::disk(env('STORAGE_DISK_DRIVER'))->put('locations/' . $imageFilename, $file,
                [
                    'visibility' => 'public',
                    'CacheControl' => 'max-age=31536000'
                ]);

            if ($imageSaved) {
                $imageFilename_sm = $image . '_sm.jpg';
                $file = $this->createThumbnailfromFile(80, 80, $request->file('image'));
                $imageSmSaved = Storage::disk(env('STORAGE_DISK_DRIVER'))->put('locations/' . $imageFilename_sm, $file,
                    [
                        'visibility' => 'public',
                        'CacheControl' => 'max-age=31536000'
                    ]);
            }

        }
        if ($imageSaved && $imageSmSaved) {
            $location->image = $imageFilename;
            $location->image_sm = $imageFilename_sm;


            if ($location->save()) {
                return redirect()->route('admin.locations.index')->with('flash_message', $location->id .' er blevet oprettet!');
            }

        }

    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        if ($location) {
            return view('admin.locations.edit', compact('location'));
        }
    }

    public function update($id, LocationRequest $request)
    {
        $location = Location::findOrFail($id);
        if ($location) {
            $location->name = $request->name;
            $location->description = $request->description;


            if ($request->file('image')) {
                $imageFilename = $location->image;
                $file = @file_get_contents($request->image);
                $imageSaved = Storage::disk(env('STORAGE_DISK_DRIVER'))->put('locations/' . $imageFilename, $file,
                    [
                        'visibility' => 'public',
                        'CacheControl' => 'max-age=31536000'
                    ]);

                if ($imageSaved) {

                    $imageFilename_sm = $location->image_sm;
                    $file = $this->createThumbnailfromFile(80, 80, $request->file('image'));
                    Storage::disk(env('STORAGE_DISK_DRIVER'))->put('locations/' . $imageFilename_sm, $file,
                        [
                            'visibility' => 'public',
                            'CacheControl' => 'max-age=31536000'
                        ]);
                }


            }

            if ($location->save()) {
                return redirect()->route('admin.locations.index')->with('flash_message', $location->id .' er blevet oprettet!');
            }



        }
    }

    // delete one player
    public function destroy($id)
    {

        //find id by slug
        $location = Location::findOrFail($id);

        if($location->image) {
            Storage::disk(env('STORAGE_DISK_DRIVER'))->delete("/locations/".$location->image);
            Storage::disk(env('STORAGE_DISK_DRIVER'))->delete("/locations/".$location->image_sm);
        }

        // check to see if user is owner of the post
        if ($location->delete()) {
            return back()->with('flash_message', $location->id .' er blevet slettet!');
        }
        abort(404, 'page not found');
    }


}
