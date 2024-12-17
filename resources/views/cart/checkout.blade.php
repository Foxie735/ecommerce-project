@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-8">
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
                <div class="row mb-2">
                    <div class="col col-12 mb-2">
                        <div class="card">
                            <div class="card-header">
                                Item
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($itemcart->CartDetail as $detail)
                                            <tr>
                                                <td>
                                                    {{ $no++ }}
                                                </td>
                                                <td>
                                                    {{ $detail->product->name_product }}
                                                    <br/>
                                                    {{ $detail->product->code_product }}
                                                </td>
                                                <td>
                                                    {{ number_format($detail->price, 2) }}
                                                </td>
                                                <td>
                                                    {{ number_format($detail->quantity, 2) }}
                                                </td>
                                                <td>
                                                    {{ number_format($detail->subtotal, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12">
                        <div class="card">
                            <div class="card-header">Shipping Address</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name Customer</th>
                                                <th>Address</th>
                                                <th>Telephone Number</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($itemshippingaddress)
                                                <tr>
                                                    <td>
                                                        {{ $itemshippingaddress->nama_penerima }}
                                                    </td>
                                                    <td>
                                                        {{ $itemshippingaddress->address }}<br/>
                                                        {{ $itemshippingaddress->ward }},
                                                        {{ $itemshippingaddress->subdistrict }}<br/>
                                                        {{ $itemshippingaddress->city }},
                                                        {{ $itemshippingaddress->province }} -
                                                        {{ $itemshippingaddress->postal_code }}
                                                    </td>
                                                    <td>
                                                        {{ $itemshippingaddress->telephone }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('shippingaddress.index') }}" class="btn btn-success btn-sm">
                                                            Change Address
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('shippingaddress.index') }}" class="btn btn-sm btn-primary">
                                    Add Address
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-4">
                <div class="card">
                    <div class="card-header">
                        Summary
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
                    <div class="card-footer">
                        <form action="{{ route('usertransaction.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block">Make an order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection