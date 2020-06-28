{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback m-l-16" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <!--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> -->

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback m-l-16" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <!--<label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label> -->

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}" autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback m-l-16" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback m-l-16" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <!--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> -->

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.authlayout')

@section('form')
    <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
        @csrf
        <span class="login100-form-title p-b-34">
            Sign Up
        </span>


        {{-- @error('email')
            <div class="alert alert-danger w-100 mb-1">{{ $message }}</div>
        @enderror --}}
        <div class="wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"  name="email" placeholder="Email">
            <span class="focus-input100"></span>
             @error('email')
                <span class="invalid-feedback m-l-16" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}" autocomplete="name" autofocus>
            <span class="focus-input100"></span>
            @error('name')
                <span class="invalid-feedback m-l-16" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input id="username" type="text" class="input100 @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}" autocomplete="username" autofocus>
            <span class="focus-input100"></span>
            @error('username')
                <span class="invalid-feedback m-l-16" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="wrap-input100 validate-input m-b-20" data-validate="Type password">
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"  name="password" placeholder="Password" autocomplete="new-password">
            <span class="focus-input100"></span>
            @error('password')
                <span class="invalid-feedback m-l-16" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Type password">
            <input id="password-confirm" type="password" class="input100"  name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
            <span class="focus-input100"></span>
            @error('password-confirm')
                <span class="invalid-feedback m-l-16" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn" >
                Register
            </button>
        </div>

        <div class="w-full text-center m-t-49">
            <a href="{{ route('login') }}" class="txt3 ">
                Login
            </a>
        </div>

    </form>
@endsection