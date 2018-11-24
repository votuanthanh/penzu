<?php

namespace App\Repositories\Eloquent;
use App\Journal;
use App\Repositories\Contracts\JournalRepositoryInterface;

/**
* 
*/
class JournalRepository implements JournalRepositoryInterface
{
	public function getAllJournal()
	{
		return Journal::with('user')->orderBy('created_at', 'DESC')->simplePaginate(10);
	}

	public function show($id) 
	{
		return Journal::find($id);
	}

	public function update(array $request, $id)
	{
		if (Journal::find($id)->update($request)) {
            return true;
        }
        return false;
	}

	public function delete($id)
	{
		if (!$id) {
            return false;
        }
        Journal::find($id)->delete();
        
        return true;
	}
}