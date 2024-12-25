@extends('layouts.template')
@push('css')
<style>
    #carousel img {
    max-height: 500px;
    object-fit: cover;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col col-lg-6 col-md-6">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($itemproduct->ImageProduct as $index => $img)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset($img->img_product) }}" alt="..." class="d-block w-100">
                        </div>
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
        <div class="col col-lg-6 col-md-6">
            <div class="row">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="card-body">
                                @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-warning">{{ $error }}</div>
                                @endforeach
                                @endif
                                @if($message = Session::get('error'))
                                <div class="alert alert-warning">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                @if($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                <span class="small">{{ $itemproduct->category->name_category }}</span>
                                <h5>{{ $itemproduct->name_product }}</h5>
                                @if(empty($itemproduct->discount))
                                <p>
                                    Rp. {{ number_format($itemproduct->price, 2) }}
                                </p>

                                @else
                                <p>
                                    @php
                                    $realprice = $itemproduct->price;
                                    $discount = (100/100 - $itemproduct->discount / 100) * $realprice;
                                    @endphp
                                    Rp. {{ number_format($discount, 2) }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            Description
                        </div>
                        <div class="card-body">
                            {{ $itemproduct->description_product }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('cartdetail.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_product" value="{{ $itemproduct->id_product }}">
                                <button class="btn btn-block btn-primary" type="submit">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection