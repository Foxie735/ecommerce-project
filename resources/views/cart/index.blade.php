@extends('layouts.template')
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
<div class="container">
    <div class="row">
        <div class="col col-md-8">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            @if($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header bg-info text-light">
                    <h6>Item</h6>
                </div>
                <div class="card-body border border-info">
                    <table class="table table-hover">
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
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('cartdetail.update', $detail->id_cart_detail) }}" method="POST">
                                                @method('patch')
                                                @csrf
                                                <input type="hidden" name="param" value="minus">
                                                <button class="btn btn-sm co">
                                                    -
                                                </button>
                                            </form>
                                            <button class="btn btn-outline-dark btn-sm" disabled="true">
                                                {{ number_format($detail->quantity, 2) }}
                                            </button>
                                            <form action="{{ route('cartdetail.update', $detail->id_cart_detail) }}" method="POST">
                                                @method('patch')
                                                @csrf
                                                <input type="hidden" name="param" value="plus">
                                                <button class="btn btn-sm co">
                                                    +
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        {{ number_format($detail->subtotal, 2) }}
                                    </td>
                                    <td>
                                        <form action="{{ route('cartdetail.destroy', $detail->id_cart_detail) }}" method="POST" style="display: inline;">
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
                    </table>
                </div>
            </div>
        </div>
        <div class="col col-md-4">
            <div class="card border border-info mb-4">
                <div class="card-header bg-info text-light">
                    <h6>Summary</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>No Invoice</td>
                            <td class="text-right">
                                {{ $itemcart->no_invoice }}
                            </td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td class="text-right">
                                {{ number_format($itemcart->subtotal, 2) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td class="text-right">
                                {{ number_format($itemcart->total, 2) }}
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- <div class="card-footer border border-info"> -->
                    <div>
                        <a href="{{ route('cart.checkout') }}" class="btn btn-block co rounded-0">
                            Checkout
                        </a>
                    </div>
                <!-- </div> -->
            </div>
            <div class="card border border-info mb-4">
                <div class="card-header">
                    <h6>Remove All Cart</h6>
                </div>
                <form action="{{ url('empty') . '/' . $itemcart->id_cart }}" method="post">
                    @method('patch')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block rounded-0">Empty</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection