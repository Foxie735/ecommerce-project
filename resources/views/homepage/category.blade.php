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
                <a href="#">
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
                            <a href="#" class="btn btn-info">
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
@endsection