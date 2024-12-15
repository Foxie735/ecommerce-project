@extends('layouts.app')
@section('content')

<style>
    .bg-img {
        width: 100vw;
        height: 100vh;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
    }

    .confirm {
        background-color: #2f4156;
        color: white;
    }

    .confirm:hover {
        background-color: #1b2530;
        color: #f7f5f5;
    }

    .card {
        box-shadow: 0px 3px 10px black;
    }
</style>

<img class="bg-img" src="{{ asset('assets/images/bg1.jpg') }}" alt="bg image">
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2f4156;">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="#" style="font-size:25px;">
            <img class="text-align" src="{{ asset('assets/images/logo-fs.jpg') }}" alt="logo fs" width="30" height="24" class="d-inline-block align-text-top">
                Fuushop
        </a> 
        <div class="navbar-nav nav-underline">
            <div class="d-flex">
                <a class="nav-link p-2" aria-current="page" href="/login">Login</a>
                <a class="nav-link p-2 ms-2" href="/register">Register</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-auto" style="width: 360px;">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn confirm">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
