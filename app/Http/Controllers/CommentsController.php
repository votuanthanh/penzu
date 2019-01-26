<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;

use App\Comment;
use App\Journal;
use Auth;
use Alert;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request)
    {
        $user = Auth::user();
        $journal = Journal::find($request->journal_id);
        if($request->comment_body){

            $comment = new Comment();
            $comment->description = $request->comment_body;
            $comment->user_id = $user->id;
            
            $journal->comments()->save($comment);
            Alert::success('Congratulations!', 'Thanks for your comment.');
            
            return redirect()->route('journal.show', ['journal' => $journal->id]);
                    
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $journal = Journal::find($request->journal_id);

        if(Comment::find($request->comment_id)->update($request))
        {
            Alert::success('Congratulations!', 'Your comment has been successfully updated.');

            return redirect()->route('journal.show', ['journal' => $journal->id]);
        }    
            
        else
        {
            Alert::error('Oops..!', 'Your comment has not been updated.');
            
            return redirect()->route('journal.show', ['journal' => $journal->id]);                  
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $journal = Journal::find($request->journal_id);

        if(Comment::find($request->comment_id)->delete())
        {
            Alert::success('Congratulations!', 'Your comment has been successfully deleted.');
            
            return redirect()->route('journal.show', ['journal' => $journal->id]);                    
        }

        else
        {
            Alert::error('Oops...!', 'Your comment has not been deleted.');
           
            return redirect()->route('journal.show', ['journal' => $journal->id]);                 
        }

    }
}
