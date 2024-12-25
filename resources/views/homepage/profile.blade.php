@extends('layouts.template')

@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col mb-4 mb-lg-0">
            <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                    <div class="col-md-4 gradient-custom text-center text-white"
                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <img src="{{ $user->img_user ? asset('storage/' . $user->img_user) : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp' }}"
                            alt="Avatar" class="img-fluid mt-5 mb-3" style="width: 80px;" />
                        <h5 class="text-dark">{{ $user->name }}</h5>
                        <p class="text-dark">{{ ucfirst($user->role) }}</p>
                        <i class="far fa-edit mb-5"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h5>Profile Information</h5>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-lg mb-2">
                                    <h6>Name</h6>
                                    <p class="text-muted">{{ $user->name }}</p>
                                </div>
                                <div class="col-lg mb-2">
                                    <h6>Email</h6>
                                    <p class="text-muted">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection