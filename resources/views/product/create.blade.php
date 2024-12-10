@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-3 col-md-3"></div>
        <div class="col col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Page</h3>
                    <div class="card-tools">
                        <a href="{{ route('product.index') }}" class="btn btn-danger btn-sm">
                            Close
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.create') }}">
                        <div class="form-group">
                            <label for="nama_produk">Product Name</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="slug_produk">Product Slug</label>
                            <input type="text" name="slug_produk" id="slug_produk" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Description</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col col-lg-3 col-md-3"></div>
    </div>
</div>
@endsection