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
		return Journal::with('users')->orderBy('created_at', 'DESC')->paginate(10);
	}
}