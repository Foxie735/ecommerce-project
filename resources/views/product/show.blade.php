@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product Detail</h3>
                        <div class="card-tools">
                            <a href="{{ route('product.index') }}" class="btn btn-sm btn-danger">
                                Close
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Product Code</td>
                                    <td>
                                        {{ $detailProduct->code_product }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Name</td>
                                    <td>
                                        {{ $detailProduct->name_product }}
                                    </td>
                                    <tr>
                                        <td>Qty</td>
                                        <td>
                                            {{ $detailProduct->quantity }} {{ $detailProduct->per_unit }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>
                                           Rp. {{ number_format($detailProduct->price, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td>
                                           {{ $detailProduct->discount }} %
                                        </td>
                                    </tr>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product Image</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store_image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_product" value="{{ $detailProduct->id_product }}">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="file" name="img_product" id="img_product" 
                                        class="form-control @error('img_product')
                                            is-invalid
                                        @enderror">
                                        @error('img_product')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse($imageProduct as $img)
                            <div class="col-md-3 mb-2">
                                <img src="{{ asset($img->img_product) }}" alt="image" class="img-thumbnail mb-2">
                                <form action="{{ route('product.destroy_image', $img->id_img_product) }}"
                                    method="POST" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger mb-2" onclick="return confirm('Are you sure to remove this data?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            @empty
                                <div class="col col-md-12 mb-2">
                                    <div class="alert alert-danger">
                                        Image still empty
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection