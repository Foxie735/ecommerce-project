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
                    @if ($message = Session::get('error'))
                        <div class="alert alert-error">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="50px">No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Total</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->code_product }}</td>
                                    <td>{{ $item->name_product }}</td>
                                    <td>{{ $item->quantity }} {{ $item->per_unit }}</td>
                                    <td>{{ number_format($item->price, 2) }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('product.show', $item->id_product) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                                            Detail
                                        </a>
                                        <a href="{{ route('product.edit', $item->id_product) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('product.destroy', $item->id_product) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('delete')

                                            <button style="submit" class="btn btn-sm btn-danger mb-2" onclick="return confirm('Are you sure to remove this data?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">
                                        <div class="alert alert-warning">
                                            Data not found
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection