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
                        @foreach($itemslide as $index => $slide)
                            @if($index == 0)
                            <div class="carousel-item active">
                                <img src="{{ asset($slide->img_slideshow) }}" alt="{{ $slide->caption_title }}">
                                <div class="carousel-caption d-none d-md-block bg-secondary rounded-pill">
                                    <h3 class="text-shadow text-bold">
                                        {{ $slide->caption_title }}
                                    </h3>
                                </div>
                            </div>
                            @else
                            <div class="carousel-item">
                                <img src="{{ asset($slide->img_slideshow) }}" alt="{{ $slide->caption_title }}">
                                <div class="carousel-caption d-none d-md-block bg-secondary rounded-pill">
                                    <h3 class="text-shadow text-bold">
                                        {{ $slide->caption_title }}
                                    </h3>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
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
                @foreach($itemcategory as $category)
                <div class="col-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="#">
                            <img src="{{ asset($category->img_category) }}" alt="Meals" class="card-img-top fixed-img">
                        </a>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="card-text">{{ $category->name_category }}</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-info">
                                        See Category
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
            @foreach($productpromo as $promo)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        @if($promo->ImageProduct->isNotEmpty())
                        @foreach($promo->ImageProduct->take(1) as $image)
                        <a href="{{ route('home.productdetail', $promo->slug_product) }}">
                            <img src="{{ asset($image->img_product) }}" alt="" class="card-img-top fixed-img">
                        </a>
                        @endforeach
                        @else
                        <a href="#">
                            <img src="{{ asset('default-image.jpg') }}" alt="No Image" class="card-img-top fixed-img">
                        </a>
                        @endif
                        <div class="card-body">
                            <a href="#" class="text-decoration-none">
                                <p class="card-text">
                                    {{ $promo->name_product }}
                                </p>
                            </a>
                            <div class="row mt-4">
                                <div class="col">
                                    <a href="{{ route('home.productdetail', $promo->slug_product) }}" class="btn btn-info">
                                        Detail
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <p>
                                        <del>Rp. {{ number_format($promo->price) }}</del>
                                        <br>
                                        @php
                                        $realprice = $promo->price;
                                        $discount = (100/100 - $promo->discount / 100) * $realprice;
                                        @endphp
                                        Rp. {{ number_format($discount, 2) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
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
            @foreach($itemproduct as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        @if($product->ImageProduct->isNotEmpty())
                            @foreach($product->ImageProduct->take(1) as $image)
                                <a href="{{ route('home.productdetail', $product->slug_product) }}">
                                    <img src="{{ asset($image->img_product) }}" alt="" class="card-img-top fixed-img">
                                </a>
                            @endforeach
                        @else
                        <a href="#">
                            <img src="{{ asset('default-image.jpg') }}" alt="No Image" class="card-img-top fixed-img">
                        </a>
                        @endif
                        <div class="card-body">
                            <a href="#" class="text-decoration-none">
                                <p class="card-text">
                                    {{ $product->name_product }}
                                </p>
                            </a>
                            <div class="row mt-4">
                                <div class="col">
                                    <a href="{{ route('home.productdetail', $product->slug_product) }}" class="btn btn-info">
                                        Detail
                                    </a>
                                </div>
                                <div class="col-auto">
                                    @if(empty($product->discount))
                                    <p>
                                        Rp. {{ number_format($product->price, 2) }}
                                    </p>

                                    @else
                                    <p>
                                        @php
                                        $realprice = $product->price;
                                        $discount = (100/100 - $product->discount / 100) * $realprice;
                                        @endphp
                                        Rp. {{ number_format($discount, 2) }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
    {{-- end new product --}}
    
@endsection