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
                                        PRO-12
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Name</td>
                                    <td>
                                        Kimbab
                                    </td>
                                    <tr>
                                        <td>Qty</td>
                                        <td>
                                            12
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>
                                            Rp.15.000
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
                        <form action="#">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="file" name="image" id="image">
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
                            <div class="col-md-3 mb-2">
                                <img src="{{ asset('assets/images/kimbab.jpg') }}" alt="image" class="img-thumbnail mb-2">
                                <button class="btn-sm btn-danger btn">
                                    Delete
                                </button>
                            </div>
                            <div class="col-md-3 mb-2">
                                <img src="{{ asset('assets/images/kimbab.jpg') }}" alt="image" class="img-thumbnail mb-2">
                                <button class="btn-sm btn-danger btn">
                                    Delete
                                </button>
                            </div>
                            <div class="col-md-3 mb-2">
                                <img src="{{ asset('assets/images/kimbab.jpg') }}" alt="image" class="img-thumbnail mb-2">
                                <button class="btn-sm btn-danger btn">
                                    Delete
                                </button>
                            </div>
                            <div class="col-md-3 mb-2">
                                <img src="{{ asset('assets/images/kimbab.jpg') }}" alt="image" class="img-thumbnail mb-2">
                                <button class="btn-sm btn-danger btn">
                                    Delete
                                </button>
                            </div>
                            <div class="col-md-3 mb-2">
                                <img src="{{ asset('assets/images/kimbab.jpg') }}" alt="image" class="img-thumbnail mb-2">
                                <button class="btn-sm btn-danger btn">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection