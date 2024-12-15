@extends('layouts.template')
@section('content')
<div class="container">
    <div class="col col-md-8">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning">{{ $error }}</div>
            @endforeach
        @endif
        @if($message = Session::get('error'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Item
            </div>
            <div class="card-body">
                <div class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itemcart->CartDetail as $detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $detail->product->name_product }}
                                    <br/>
                                    {{ $detail->product->code_product }}
                                </td>
                                <td>
                                    {{ number_format($detail->price, 2) }}
                                </td>
                                <td>
                                    <form action="#" method="POST">
                                        @method('patch')
                                        @csrf
                                        <input type="hidden" name="param" value="minus">
                                        <button class="btn btn-primary btn-sm">
                                            -
                                        </button>
                                    </form>
                                    <button class="btn btn-outline-primary btn-sm" disabled="true">
                                        {{ number_format($detail->quantity, 2) }}
                                    </button>
                                    <form action="#" method="POST">
                                        @method('patch')
                                        @csrf
                                        <input type="hidden" name="param" value="plus">
                                        <button class="btn btn-primary btn-sm">
                                            +
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    {{ number_format($detail->subtotal, 2) }}
                                </td>
                                <td>
                                    <form action="#" method="post" style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger mb-2">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection