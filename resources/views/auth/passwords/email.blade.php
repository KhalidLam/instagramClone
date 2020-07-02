@extends('layouts.authlayout')

@section('form')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form">
        @csrf
        <span class="login100-form-title p-b-34">
            Reset Password
        </span>

        @error('email')
            <div class="alert alert-danger w-100 mb-1">{{ $message }}</div>
        @enderror
        <div class="wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autocomplete="email" autofocus>
            <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Send Password Reset Link
            </button>
        </div>


        <div class="w-full text-center p-t-27 p-b-100">
            <span class="txt1">
                Remembered you password?
            </span>

            <a href="{{ route('login') }}" class="txt2">
                Go ahead and login
            </a>
        </div>

    </form>

@endsection
