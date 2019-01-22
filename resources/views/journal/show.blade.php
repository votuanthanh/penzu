@extends('layouts.app')

@section('content')

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('journal-css/comment-journal.css') }}">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endpush

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

                        @forelse($journal->comments->sortByDesc('created_at') as $comment)

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="thumbnail">
                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                </div><!-- /thumbnail -->
                            </div><!-- /col-sm-1 -->

                            <div class="col-sm-9">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</strong> <span class="text-muted">commented {{ $comment->created_at->diffForHumans() }}: &nbsp</span>
                                    </div>
                                    <div class="panel-body">
                                        {{ $comment->description}}
                                    </div><!-- /panel-body -->
                                </div><!-- /panel panel-default -->
                            </div><!-- /col-sm-5 -->
                        </div>
                        @empty
                            <p>Nothing. Let's the first !</p>
                        @endforelse

                    <hr />
                    <h4><label for="comment_body">Add comment</label></h4>
                    <form method="post" action="{{ route('comments.store', $journal->id)}}">
                        @csrf
                        <div class="form-group">
                            <input id="comment_body" type="text" name="comment_body" require autofocus class="form-control {{ $errors->has('comment_body') ? ' is-invalid' : '' }}" value="{{ old('comment_body')}}" placeholder="Your comment here!"/>
                            @if (session('message'))
                            <div class="alert alert-{{ session('level') }}" role="alert">
                                <strong>{{session('message')}}</strong>
                            </div>
                            @endif
                            @if ($errors->has('comment_body'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('comment_body') }}</strong>
                                </span>
                            @endif
                            <input type="hidden" name="journal_id" value="{{$journal->id}}" />
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
