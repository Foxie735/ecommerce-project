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
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="code_category">Code Category</label>
                            <input type="text" name="code_category" id="code_category" class="form-control
                            @error('code_category') is-invalid
                            @enderror" value="{{ old('code_category') }}">
                            @error('code_category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_category">Category Name</label>
                            <input type="text" name="name_category" id="name_category" class="form-control
                            @error('name_category') is-invalid
                            @enderror" value="{{ old('name_category') }}">
                            @error('name_category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug_category">Category Slug</label>
                            <input type="text" name="slug_category" id="slug_kategori" class="form-control
                            @error('slug_category') is-invalid
                            @enderror" value="{{ old('slug_category') }}">
                            @error('slug_category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="img_category">Image Category</label>
                            <input type="file" name="img_category" id="img_category" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control
                            @error('status') is-invalid
                            @enderror">
                                @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <option value="publish" {{ old('status') === 'publish' ? 'selected' : '' }}>Publish</option>
                                <option value="notpublish" {{ old('status') === 'notpublish' ? 'selected' : '' }}>Not Publish</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description_category">Description</label>
                            <textarea name="description_category" id="description_category" cols="30" rows="5" class="form-control @error('description_category') is-invalid
                            @enderror" value="{{ old('description_category') }}">
                                {{ old('description_category') }}
                            </textarea>
                            @error('description_category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Save</button>
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
