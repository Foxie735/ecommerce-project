@extends('layouts.dashboard')

@section('content')

<style>
    .co {
        background-color: #2f4156;
        color: white;
    }

    .co:hover {
        background-color: #1b2530;
        color: #f7f5f5;
    }
</style>

<div class="container-fluid">
    {{-- Tabel Kategori --}}
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Category</h4>
                    <div class="card-tools">
                        <a href="{{ route('category.create') }}" class="btn btn-sm btn-info">New</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.find') }}" method="GET">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="key" id="key" class="form-control" placeholder="Input Keyword">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn co">
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
                                    <th>Image</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Total Product</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse($items as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img src="{{ asset($item->img_category) }}" alt="Product Image" width="150px">
                                        
                                    </td>
                                    <td>{{ $item->code_category }}</td>
                                    <td>{{ $item->name_category }}</td>
                                    <td>{{ count($item->Product) }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $item->id_category) }}" class="btn btn-sm btn-warning mr-2 mb-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('category.destroy', $item->id_category) }}" method="POST" style="display: inline">
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
                                        <td colspan="7">
                                            <div class="alert alert-warning">Data not found</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection