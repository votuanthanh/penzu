<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateImageRequest; 
use App\Album;
use App\Image;
use Auth;
use File;
class ImageController extends Controller
{

    public function create($id)
    {
    	$album = Album::find($id);

        return view('image.create', ['album' => $album]); 
    }

    public function store(CreateImageRequest $request)
    {
    	
	    $album = $request->album_id;
	    $image = new Image($request->all());

    	$fileUpload = $request->description;
        $nameFileUpload = uniqid() . '.' . $fileUpload->getClientOriginalExtension();
        $path = public_path('/images/albumImages');
        $fileUpload->move($path, $nameFileUpload);
        $image->description = $nameFileUpload;
        $image->album_id = $album;
        // dd($path);
        $image->save();
       //	try {
        	// if ($album->images()->save($image))
         //    {
                return redirect()
                	->route('album.show', ['id' => $image->album_id])
                    ->with('level', 'success')
                    ->with('message', 'Image was successfully added');
            //}
        // } catch (\Exception $e) {
        //      dd($e);
        // }
    }

    public function delete($id)
    {
        $path = public_path('/images/albumImages');

    	$image = Image::find($id);
    	$image->delete();
        if(File::exists($path.'/'.$image->description)) {
            File::delete($path.'/'.$image->description);
        }

    	return redirect()
            	->route('album.show', ['id' => $image->album_id])
                ->with('level', 'success')
                ->with('message', 'Image was successfully deleted');
    }
}
