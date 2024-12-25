@extends('layouts.template')
<style>
   .category-divider {
       width: 100%;
       height: 1px;
       background-color: #7c7c7d;
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
</style>

@section('content')
<div class="container">
   <div class="row mt-4">
       <div class="col col-md-12 col-sm-12 mb-4">
           <h2 class="text-center">{{ $category->name_category }}</h2>
           <div class="category-divider"></div>
       </div>
       <div class="row">
           @foreach($products as $product)
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
                       <a href="{{ route('home.productdetail', $product->slug_product) }}" class="text-decoration-none">
                           <h5 class="card-text text-dark">{{ $product->name_product }}</h5>
                       </a>
                       <div class="row mt-2">
                           <div class="col-auto">
                               @if(empty($product->discount))
                               <p>Rp. {{ number_format($product->price, 2) }}</p>
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
                               <a href="{{ route('home.productdetail', $product->slug_product) }}" class="btn btn-info">Detail</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           @endforeach
       </div>
       <div class="d-flex justify-content-center">
           {{ $products->links() }}
       </div>
   </div>
</div>
@endsection