@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">EDIT INFORMATION</div>
                @if (session('message'))
                <div class="alert alert-{{ session('level') }}" role="alert">
                    <strong>{{session('message')}}</strong>
                </div>
                @endif
                <div class="card-body">

                    <!-- display avatar -->
                    <div class="col-sm-3">
                        <div class="thumbnail">
                            @if($user->provider_id == 0)
                            <img class="img-responsive user-photo" 
                            src="{{ $user->avatar }} " alt="Avatar">
                            @elseif ($user->provider_id == 1)
                            <img class="img-responsive user-photo" src="{{ asset('images/avatarImages/' . $user->avatar) }}" alt="Avatar">
                            @elseif ($user->provider == 'facebook')
                                @if ($user->avatar)
                                    <img class="img-responsive user-photo" src="{{ asset('images/avatarImages/' . $user->avatar) }}" alt="Avatar">
                                @else    
                                    <img class="img-responsive user-photo" 
                                    src="https://graph.facebook.com/v3.0/{{ $user->provider_id }}/picture?type=normal" alt="Avatar">
                                @endif
                            @elseif ($user->provider == 'google')
                                    <img class="img-responsive user-photo" 
                                            src="https://i.stack.imgur.com/34AD2.jpg" alt="Avatar">
                            @endif
                        </div><!-- /thumbnail -->
                    </div><!-- /col-sm-1 -->
                    <!--  -->

                    <form method="POST" action="{{ route('user.update') }} " enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right" for="first_name">First name</label>
                            <div class="col-md-4">
                                <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" required autofocus>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>    
                        
                            
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right" for="last_name">Last name</label>
                            <div class="col-md-4">
                                <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" required autofocus>
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right" for="birthday">Birthday</label>
                            <div class="col-md-4">
                                <input class="form-control" id="birthday" type="date" name="birthday" value="{{ $user->birthday }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right" for="gender">Gender</label>
                            <div class="col-md-4">
                                <label class="radio-container m-r-45">Male
                                    <input type="radio" value="1" name="gender" {{$user->gender == 1 ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Female
                                    <input type="radio" name="gender" value="0" {{$user->gender == 0 ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right" for="address">Address</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="address" id="address" value="{{ $user->address }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-sm-4 col-form-label text-md-right">Avatar</label>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" name="avatar" class="custom-file-input{{ $errors->has('avatar') ? ' is-invalid' : '' }}" id="avatar">
                                    <label class="custom-file-label" for="avatar">Choose file</label>
                                    @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    SAVE
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
