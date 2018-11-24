<?php

namespace App\Repositories\Eloquent;
use App\Journal;
use App\Album;
use App\Repositories\Contracts\AlbumRepositoryInterface;

/**
* 
*/
class AlbumRepository implements AlbumRepositoryInterface
{
	public function getAllAlbum()
	{
		return Album::with('user')->orderBy('created_at', 'DESC')->paginate(10);
	}

	public function showAlbum($id) 
	{
		return Album::find($id);
	}

	public function update(array $request, $id)
	{
		if (Album::find($id)->update($request)) {
            return true;
        }
        return false;
	}

	public function delete($id)
	{
		if (!$id) {
            return false;
        }
        Album::find($id)->delete();
        
        return true;
	}
}