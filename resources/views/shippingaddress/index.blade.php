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
            <div class="col col-8 mb-2">
                <div class="card border border-info">
                    <div class="card-header bg-info text-light">
                        <div class="row">
                            <div class="col">
                                <h6>Shipping Address</h6>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('cart.checkout') }}" class="btn btn-sm btn-danger">
                                    Close
                                </a>
                            </div>
                        </div>
                    </div>
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
                                    @foreach($itemshippingaddress as $shipping)
                                        <tr>
                                            <td>
                                                {{ $shipping->nama_penerima }}
                                            </td>
                                            <td>
                                                {{ $shipping->address }}<br/>
                                                {{ $shipping->ward }},
                                                {{ $shipping->subdistrict }}<br/>
                                                {{ $shipping->city }},
                                                {{ $shipping->province }} -
                                                {{ $shipping->postal_code }}
                                            </td>
                                            <td>
                                                {{ $shipping->telephone }}
                                            </td>
                                            <td>
                                                <form action="{{ route('shippingaddress.update', $shipping->id_shipping_address) }}" 
                                                    method="post">
                                                    @method('patch')
                                                    @csrf
                                                    @if($shipping->status == '1')
                                                        <button type="submit" class="btn btn-info btn-sm" disabled>
                                                            Set Priority
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn btn-sm border border-info">
                                                            Set Priority
                                                        </button>    
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">
                                {{ $itemshippingaddress->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-4 mb-2">
                <div class="card border border-info">
                    <div class="card-header bg-info text-light">
                        <h6>Shipping Address Form</h6>
                    </div>
                    <div class="card-body">
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
                        <form action="{{ route('shippingaddress.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama_penerima">Name Customer</label>
                                        <input type="text" name="nama_penerima" class="form-control"
                                            value="{{ old('nama_penerima') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ old('address') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone">Telephone Number</label>
                                        <input type="text" name="telephone" class="form-control"
                                            value="{{ old('telephone') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="province">Province</label>
                                        <input type="text" name="province" class="form-control"
                                            value="{{ old('province') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" class="form-control"
                                            value="{{ old('city') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="subdistrict">Subdistrict</label>
                                        <input type="text" name="subdistrict" class="form-control"
                                            value="{{ old('subdistrict') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="ward">Ward</label>
                                        <input type="text" name="ward" class="form-control"
                                            value="{{ old('ward') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="postal_code">Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control"
                                            value="{{ old('postal_code') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-block co">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection