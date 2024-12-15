<!-- @extends('layouts.app') -->

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?v=3.2.0') }}">
</head>

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

    .sign {
        background-color: #2f4156;
        color: white;
    }

    .sign:hover {
        background-color: #1b2530;
        color: #f7f5f5;
    }

    .card {
        box-shadow: 0px 3px 10px black;
    }
</style>

<body>
    <img class="bg-img" src="{{ asset('assets/images/bg1.jpg') }}" alt="bg image">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2f4156;">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="#" style="font-size:25px;">
                <img class="text-align" src="{{ asset('assets/images/logo-fs.jpg') }}" alt="logo fs" width="30" height="24" class="d-inline-block align-text-top">
                Fuushop
            </a> 
            <div class="navbar-nav nav-underline">
                <div class="d-flex">
                    <a class="nav-link active p-2" aria-current="page" href="/login">Login</a>
                    <a class="nav-link p-2 ms-2" href="/register">Register</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container d-flex justify-content-center" style="min-height: 90vh">
        <!-- /.login-logo -->
        <div class="card m-auto" style="width: 360px;">
            <div class="card-header text-center">
                <a href="/" class="h1">Fuushop</a>
            </div>
            <div class="card-body">
                <p class="text-center">Sign in to start shopping</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                            placeholder="Email">
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
                        <input type="password" class="form-control @error('password')
                        is-invalid @enderror" placeholder="Password" name="password" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-block sign">Sign In</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-12 mt-3 mb-2">
                            <a href="{{ route('password.request') }}" class="btn btn-warning btn-block">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
                <p class="mb-0 text-center">
                    <a href="/register" class="text-center">Dont have an account?</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js?v=3.2.0') }}"></script>
</body>
</html>
@endsection