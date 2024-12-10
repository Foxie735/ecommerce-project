@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-3 col-md-3"></div>
        <div class="col col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Category</h3>
                    <div class="card-tools">
                        <a href="{{ route('category.index') }}" class="btn btn-danger btn-sm">
                            Close
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', 1) }}">
                        <div class="form-group">
                            <label for="nama_kategori">Category Name</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="slug_kategori">Category Slug</label>
                            <input type="text" name="slug_kategori" id="slug_kategori" class="form-control">
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