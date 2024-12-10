@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product</h4>
                    <div class="card-tools">
                        <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">
                            New
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Input Keyword">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="50px">No</th>
                                    <th>Image</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Total Product</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <img src="{{ asset('assets/images/kimbab.jpg') }}" alt="Product Image" width="150px">
                                        <div class="row mt-2">
                                            <div class="col">
                                                <input type="file" name="image" id="image">
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-sm btn-primary">
                                                    Upload
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>K1</td>
                                    <td>Kimbab</td>
                                    <td>50</td>
                                    <td>
                                        <a href="{{ route('product.show', 2) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                                            Detail
                                        </a>
                                        <a href="{{ route('product.edit', 2) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                                            Edit
                                        </a>
                                        <button class="btn btn-sm btn-danger mb-2">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection