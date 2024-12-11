@extends('layouts.template')
<style>
    .category-divider{
        width: 100%; 
        height: 1px; 
        background-color: black;
    }
    .fixed-img {
        height: 200px;
        object-fit: cover; 
        width: 100%;
    }
    
    .container {
        padding-left: 15px;
        padding-right: 15px;
    }

    #carousel img {
        width: 100%;
        height: 80vh;
        object-fit: cover;
        object-position: center;
    }
</style>
@section('content')
    {{-- start carousel --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/images/meals.jpg') }}" alt="meals">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/drinks.jpg') }}" alt="drinks">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/jus.jpg') }}" alt="juice">
                        </div>
                    </div>
                    <a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- end carousel --}}

    {{-- start product category --}}
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
    </div>
    {{-- end product category --}}

    {{-- start promo product --}}
    <div class="container">
        <div class="row mt-4">
            <div class="col col-md-12 col-sm-12 mb-4">
                <div class="category-divider"></div>
                <h2 class="text-center">Promo</h2>
                <div class="category-divider"></div>
            </div>
        {{-- first product --}}
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/blueberry.jpg') }}" alt="" class="card-img-top fixed-img">
                    </a>
                    <div class="card-body">
                        <a href="#" class="text-decoration-none">
                            <p class="card-text">
                                Blueberry
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
                                    <del>Rp.15.000,00</del>
                                    <br>
                                    Rp.10.000,00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/chickensalad.jpg') }}" alt="" class="card-img-top fixed-img">
                    </a>
                    <div class="card-body">
                        <a href="#" class="text-decoration-none">
                            <p class="card-text">
                                Chicken Salad
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
                                    <del>Rp.30.000,00</del>
                                    <br>
                                    Rp.23.000,00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/drink5.jpg') }}" alt="" class="card-img-top fixed-img">
                    </a>
                    <div class="card-body">
                        <a href="#" class="text-decoration-none">
                            <p class="card-text">
                                Juice
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
                                    <del>Rp.12.000,00</del>
                                    <br>
                                    Rp.8.000,00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end promo product --}}
    {{-- start new product --}}
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
    {{-- end new product --}}
    
@endsection