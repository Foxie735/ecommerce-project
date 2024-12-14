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
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="id_category" id="id_category">Product Category</label>
                            <select name="id_category" id="id_category" class="form-control @error('id_category')
                                is-invalid
                            @enderror">
                                <option value="">Choose Category</option>
                                @foreach ($itemcategory as $category)
                                <option value="{{ $category->id_category }}" {{ old('id_category') == $category->id_category ? 'selected' : '' }}>
                                    {{ $category->name_category }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="code_product">Code Product</label>
                            <input type="text" name="code_product" id="code_product" class="form-control @error('code_product') is-invalid
                                @enderror" value="{{ old('code_product') }}">
                                @error('code_product')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_product">Product Name</label>
                            <input type="text" name="name_product" id="name_product" class="form-control @error('name_product') is-invalid
                                @enderror" value="{{ old('name_product') }}">
                                @error('name_product')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug_product">Product Slug</label>
                            <input type="text" name="slug_product" id="slug_product" class="form-control @error('slug_product') is-invalid
                                @enderror" value="{{ old('slug_product') }}">
                                @error('slug_product')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="description_product">Description</label>
                            <textarea name="description_product" id="description_product" cols="30" rows="5" class="form-control @error('description_product') is-invalid
                                @enderror">
                                {{ old('description_product') }}
                            </textarea>
                                @error('description_product')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="quantity">Qty</label>
                                    <input type="text" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid
                                        @enderror" value="{{ old('quantity') }}">
                                        @error('quantity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="per_unit">Per Unit</label>
                                    <input type="text" name="per_unit" id="per_unit" class="form-control @error('per_unit') is-invalid
                                        @enderror" value="{{ old('per_unit') }}">
                                        @error('per_unit')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control @error('price') is-invalid
                                @enderror" value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" name="discount" id="discount" class="form-control @error('discount') is-invalid
                                @enderror" value="{{ old('discount') }}">
                                @error('discount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control
                                @error('status') is-invalid
                                @enderror">
                                <option value="publish" {{ old('status') === 'publish' ? 'selected' : '' }}>Publish</option>
                                <option value="notpublish" {{ old('status') === 'notpublish' ? 'selected' : '' }}>Not Publish</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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