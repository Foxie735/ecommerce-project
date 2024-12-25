@extends('layouts.template')

@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col mb-4 mb-lg-0">
            <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                    <div class="col-md-4 gradient-custom text-center text-white"
                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                            alt="Avatar" class="img-fluid mt-5 mb-3" style="width: 80px;" />
                        <h5 class="text-dark">Citra Ayu Ardhanareswari</h5>
                        <p class="text-dark">Role</p>
                        <i class="far fa-edit mb-5"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h5>Profile Information</h5>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-lg mb-2">
                                    <h6>Name</h6>
                                    <p class="text-muted">Citra Ayu Ardhanareswari</p>
                                </div>
                                <div class="col-lg mb-2">
                                    <h6>Email</h6>
                                    <p class="text-muted">ciitrardhanares@gmail.com</p>
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-lg mb-3">
                                    <h6>Address</h6>
                                    <p class="text-muted">Jl. Salemba Bluntas</p>
                                </div>
                                <div class="col-lg mb-3">
                                    <h6>Phone Number</h6>
                                    <p class="text-muted">+62 888 0997 5565</p>
                                </div>
                            </div>
                            <div>
                                <a href="" class="btn btn-block btn-info rounded">
                                    Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection