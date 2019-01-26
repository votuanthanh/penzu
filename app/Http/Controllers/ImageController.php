<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateImageRequest; 
use App\Album;
use App\Image;
use Auth;
use File;
use Alert;

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
       
       	try {
        	if ($image->save())
            {
                Alert::success('Congratulations!', 'Image has been successfully added');

                return redirect()
                	->route('album.show', ['id' => $image->album_id]);
            }
        } catch (\Exception $e) {
            Alert::error('Oops...!', 'Image has not been added');
                
            return redirect()
                ->route('album.show', ['id' => $image->album_id]);
        }
    }

    public function delete($id)
    {
        $path = public_path('/images/albumImages');

    	$image = Image::find($id);
    	$image->delete();
        if(File::exists($path.'/'.$image->description)) {
            File::delete($path.'/'.$image->description);
        }

        Alert::success('Congratulations!', 'Your image has been successfully deleted');
        // Alert::warning('Are you sure?', 'This will delete your image.')->persistent(true, true);
    	return redirect()->route('album.show', ['id' => $image->album_id]);
    }
}
