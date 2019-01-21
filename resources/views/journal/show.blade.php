@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SHOW A JOURNAL</div>

                <div class="card-body">
                    <form method="GET" enctype="multipart/form-data" action="{{ route('journal.show', $journal->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">TITLE</label>
                            <div class="col-md-6">
                                {{ $journal->title }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                {{ $journal->description }}
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <label for="description" class="col-sm-4 col-form-label text-md-right">User</label>
                            <div class="col-md-6">
                                  {{ $journal->user->first_name }} {{ $journal->user->last_name }}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a class="btn btn-primary" href="{{route('journal.index')}}">
                                    BACK
                                </a>
                                <a class="btn btn-primary" href="{{route('journal.export', $journal->id)}}">
                                    EXPORT TO PDF
                                </a>
                            </div>
                        </div>
                    </form>

                    <hr />
                    <h4>Display Comments</h4>
                    
                        <div class="display-comment">
                            <strong>{{ $journal->user->first_name }} {{ $journal->user->last_name }}</strong>
                            <p>This is comment</p>
                        </div>
                        <div class="display-comment">
                            <strong>{{ $journal->user->first_name }} {{ $journal->user->last_name }}</strong>
                            <p>This is comment</p>
                        </div>
                        <div class="display-comment">
                            <strong>{{ $journal->user->first_name }} {{ $journal->user->last_name }}</strong>
                            <p>This is comment</p>
                        </div>
                        <div class="display-comment">
                            <strong>{{ $journal->user->first_name }} {{ $journal->user->last_name }}</strong>
                            <p>This is comment</p>
                        </div>

                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="#">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" placeholder="Your comment here!"/>
                            <input type="hidden" name="post_id" value="1" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment"  />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
