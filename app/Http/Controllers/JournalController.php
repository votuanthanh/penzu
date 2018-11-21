<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

use App\Http\Requests\CreateJournalRequest;
use App\Journal;
use App\User;
use App\Tag;
use App\Comment;
use App\Repositories\Eloquent\JournalRepository;
use App\Repositories\Contracts\JournalRepositoryInterface;
use Auth;

class JournalController extends Controller
{
    protected $journalRepository;

    public function __construct(JournalRepository $journalRepository)
    {
        $this->journalRepository = $journalRepository;
    }

    public function index()
    {
        $journals = $this->journalRepository->getAllJournal();

        return view('journal.index', ['journals' => $journals]);
    }

    public function show($id)
    {
        $journal = $this->journalRepository->show($id);

        return view('journal.show', ['journal' => $journal]);
    }

    public function create()
    {
        return view('journal.create');
    }

    public function store(CreateJournalRequest $request)
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
            return redirect()
                    ->route('journal.index')
                    ->with('level', 'danger')
                    ->with('message', 'Journal was not created');
        }
    }

    public function edit($id)
    {
       $journal = $this->journalRepository->show($id);

        return view('journal.edit', ['journal' => $journal]);
    }

    public function update(CreateJournalRequest $request, $id)
    {
        try {
            if ($this->journalRepository->update($request->all(), $id))
                return redirect()
                        ->route('journal.index')
                        ->with('level', 'success')
                        ->with('message', 'Journal was successfully updated');

        } catch (\Exception $e) {
            return redirect()
                ->route('journal.index')
                ->with('level', 'danger')
                ->with('message', 'Journal was not updated');
        }
    }

    public function delete($id)
    {
        if($this->journalRepository->delete($id))
        return redirect()
                    ->route('journal.index')
                    ->with('level', 'success')
                    ->with('message', 'Journal was successfully deleted'); 
    }
}
