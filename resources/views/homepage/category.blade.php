@extends('layouts.template')
<style>
    .fixed-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .container {
        padding-left: 15px;
        /* Add padding to the left */
        padding-right: 15px;
        /* Add padding to the right */
    }

    .category-divider {
        width: 100%;
        height: 1px;
        background-color: #7c7c7d;
    }
</style>
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col col-md-12 col-sm-12 mb-4">
            <h2 class="text-center">Product Category</h2>
            <div class="category-divider"></div>
        </div>
        <div class="m-auto row">
            @foreach($itemcategory as $category)
            <div class="col">
                <div class="card mb-4 shadow">
                    <div>
                        <h5 class="card-header text-center">{{ $category->name_category }}</h5>
                    </div>
                    <a href="#">
                        <img src="{{ asset($category->img_category) }}" alt="Meals" class="card-img-top fixed-img">
                    </a>
                    <div class="col">
                        <div class="card-body text-center">
                            <a href="#" class="btn btn-warning">See Category</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-4">
        <div class="col col-md-12 col-sm-12 mb-4">
            <hr>
            <h2 class="text-center">New Product</h2>
            <div class="category-divider"></div>
        </div>
        <div class="m-auto row">
            @foreach($itemproduct as $product)
            <div class="col-auto">
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
                        <a href="{{ route('home.productdetail', $product->slug_product) }}"
                            class="text-decoration-none">
                            <h5 class="card-text text-dark">
                                {{ $product->name_product }}
                            </h5>
                        </a>
                        <div class="row mt-2">
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
                            <div class="col">
                                <a href="{{ route('home.productdetail', $product->slug_product) }}"
                                    class="btn btn-info">
                                    Detail
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
@endsection