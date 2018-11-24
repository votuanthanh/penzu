<?php

namespace App\Repositories\Contracts;

interface AlbumRepositoryInterface {
	public function getAllAlbum();
	public function showAlbum($id);
	public function update(array $request, $id);
	public function delete($id);
}