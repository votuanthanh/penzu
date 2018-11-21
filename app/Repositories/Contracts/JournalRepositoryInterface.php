<?php

namespace App\Repositories\Contracts;

interface JournalRepositoryInterface {
	public function getAllJournal();
	public function show($id);
	public function update(array $request, $id);
	public function delete($id);
}