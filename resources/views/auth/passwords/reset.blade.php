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

    .btn {
        background-color: #2f4156;
        color: white;
    }

    .btn:hover {
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
<div class="container d-flex justify-content-center" style="min-height: 90vh">
    <div class="card m-auto" style="width: 360px;">
        <div class="card-header text-center">
            <a href="{{ route('home.index') }}" class="h1">Fuushop</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                        placeholder="Email" {{ $email ?? old('email') }}>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-block">Change password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1 text-center">
                <a href="/login">Login</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

@endsection