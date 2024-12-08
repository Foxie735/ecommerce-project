@extends('layouts.template')
<style>
    .fixed-img {
        height: 200px;
        object-fit: cover; 
        width: 100%;
    }
    .container {
        padding-left: 15px; /* Add padding to the left */
        padding-right: 15px; /* Add padding to the right */
    }
</style>
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col col-md-12 col-sm-12 mb-4">
            <div class="category-divider"></div>
            <h2 class="text-center">Product Category</h2>
            <div class="category-divider"></div>
        </div>
        <div class="m-auto row">
            {{-- First Category --}}
            <div class="col-4">
                <div class="card mb-4 shadow-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/meals.jpg') }}" alt="Meals" class="card-img-top fixed-img">
                    </a>
                    <div class="card-body">
                        <a href="" class="text-decoration-none">
                            <p class="card-text">Meals</p>
                        </a>
                    </div>
                </div>
            </div>
            {{-- Second Category --}}
            <div class="col-4">
                <div class="card mb-4 shadow-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/drinks.jpg') }}" alt="Drinks" class="card-img-top fixed-img">
                    </a>
                    <div class="card-body">
                        <a href="" class="text-decoration-none">
                            <p class="card-text">Drinks</p>
                        </a>
                    </div>
                </div>
            </div>
            {{-- Third Category --}}
            <div class="col-4">
                <div class="card mb-4 shadow-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/fruitsveges.jpg') }}" alt="Fruits & Vegges" class="card-img-top fixed-img">
                    </a>
                    <div class="card-body">
                        <a href="" class="text-decoration-none">
                            <p class="card-text">Fruits & Vegges</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col col-md-12 col-sm-12 mb-4">
                <div class="category-divider"></div>
                <h2 class="text-center">New Product</h2>
                <div class="category-divider"></div>
            </div>
        {{-- first product --}}
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/pizza1.jpg') }}" alt="" class="card-img-top fixed-img">
                    </a>
                    <div class="card-body">
                        <a href="#" class="text-decoration-none">
                            <p class="card-text">
                                Pizza
                            </p>
                        </a>
                        <div class="row mt-4">
                            <div class="col">
                                <button class="btn btn-light">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <p>
                                    Rp.100.000,00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/dumpling.jpg') }}" alt="" class="card-img-top fixed-img">
                    </a>
                    <div class="card-body">
                        <a href="#" class="text-decoration-none">
                            <p class="card-text">
                                Dumpling
                            </p>
                        </a>
                        <div class="row mt-4">
                            <div class="col">
                                <button class="btn btn-light">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <p>
                                    Rp.20.000,00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/drink6.jpg') }}" alt="" class="card-img-top fixed-img">
                    </a>
                    <div class="card-body">
                        <a href="#" class="text-decoration-none">
                            <p class="card-text">
                                Tea
                            </p>
                        </a>
                        <div class="row mt-4">
                            <div class="col">
                                <button class="btn btn-light">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <p>
                                    Rp.8.000,00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection