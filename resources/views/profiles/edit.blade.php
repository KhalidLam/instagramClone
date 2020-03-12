@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                    <form method="POST" action="/profile/{{ $user->username }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row ">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><strong> {{ __('Name') }}</strong></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="username" class="col-md-4 col-form-label text-md-right"><strong> {{ __('Username') }}</strong></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"  value="{{ old('username') ?? $user->username }}" autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="website" class="col-md-4 col-form-label text-md-right"><strong> {{ __('Website') }}</strong></label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') ?? $user->profile->website }}" autocomplete="new-website">

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="bio" class="col-md-4 col-form-label text-md-right"><strong> {{ __('Bio') }}</strong></label>

                            <div class="col-md-6">
                                <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" cols="30" rows="10" autocomplete="new-bio">{{ old('bio') ?? $user->profile->bio }}</textarea>
                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><strong> {{ __('Email') }}</strong></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
        
                            <label for="image" class="col-md-4 col-form-label text-md-right"><strong>Change Profile Photo</strong></label> 
                            
                            <div class="col-md-6 ">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image"> 
                                    <label class="custom-file-label" for="image">{{ old('image') ?? "Upload Photo..." }}</label> 
                                
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
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
