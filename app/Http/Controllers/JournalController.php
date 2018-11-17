<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Journal;
use App\User;
use App\Tag;
use App\Comment;
use App\Repositories\Eloquent\JournalRepository;
use App\Repositories\Contracts\JournalRepositoryInterface;
use Auth;

class JournalController extends Controller
{
    public function index(JournalRepositoryInterface $journalRepository)
    {
        $journals = $journalRepository->getAllJournal();

        return view('journal.index', ['journals' => $journals]);
    }

    public function create()
    {
        return view('journal.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        // $id = Auth::id();

        try {
            $journal = new Journal($request->all());
            
            if ($user->journals()->save($journal))
            {
                return redirect()
                    ->route('journal.index')
                    ->with('level', 'success')
                    ->with('message', 'Journal was successfully created');
            }
        } catch (\Exception $e) {
             
        }
    }
}
