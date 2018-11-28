@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADD IMAGE</div>
                
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('image.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" name="description" class="custom-file-input{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description">
                                    <label class="custom-file-label" for="description">Choose file</label>
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="album_id" value="{{$album->id}}">
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    SAVE
                                </button>
                            </div>
                        </div>
                    </form>
@endsection
