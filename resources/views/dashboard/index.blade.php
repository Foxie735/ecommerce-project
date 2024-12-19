@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8 col-lg-4">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $itemorder }}</h3>
                    <p>Order</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/admin/transaction" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-8 col-lg-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $productCount }}</h3>
                    <p>Product</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/admin/product" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-8 col-lg-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $memberCount }}</h3>
                    <p>Member</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/admin/customer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection