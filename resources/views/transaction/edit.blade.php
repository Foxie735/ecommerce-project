@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-8 col-md-8 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Item</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-right">Qty</th>
                                        <th class="text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($itemorder->Cart->CartDetail as $detail)  
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            {{ $detail->Product->code_product }}
                                        </td>
                                        <td>
                                            {{ $detail->Product->name_product }}
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($detail->price, 2) }}
                                        </td>
                                        <td class="text-right">
                                            {{ $detail->quantity }}
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($detail->subtotal, 2) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <td colspan="5">
                                        <b>Total</b>
                                    </td>
                                    <td class="text-right">
                                        <b>
                                            {{ number_format($itemorder->Cart->total + $itemorder->Cart->shipping_cost, 2) }}
                                        </b>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('transaction.index') }}" class="btn btn-sm btn-danger">Close</a>
                    </div>
                </div>
            </div>
            <div class="col col-lg-4 col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">
                        Summary
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
                        <div class="table-responsive">
                            <form action="{{ route('transaction.update', $itemorder->id_order) }}" method="post">
                                @csrf
                                @method('patch')
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Total</td>
                                            <td>
                                                <input type="text" name="total" id="total" class="form-control" value="{{ $itemorder->Cart->total }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>
                                                <input type="text" name="subtotal" id="subtotal" class="form-control" value="{{ $itemorder->Cart->subtotal }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Shipping Cost</td>
                                            <td>
                                                <input type="text" name="shipping_cost" id="shipping_cost" class="form-control" value="{{ $itemorder->Cart->shipping_cost }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Expedition</td>
                                            <td>
                                                <input type="text" name="expedition" id="expedition" class="form-control" value="{{ $itemorder->Cart->expedition }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No. Receipt</td>
                                            <td>
                                                <input type="text" name="no_receipt" id="no_receipt" class="form-control" value="{{ $itemorder->Cart->no_receipt }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Payment Status</td>
                                            <td>
                                                <select name="payment_status" id="payment_status" class="form-control">
                                                    <option value="paid" {{ $itemorder->Cart->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                                    <option value="notpaid" {{ $itemorder->Cart->payment_status == 'notpaid' ? 'selected' : '' }}>Not Paid</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <select name="delivery_status" id="delivery_status" class="form-control">
                                                    <option value="done" {{ $itemorder->Cart->delivery_status == 'done' ? 'selected' : '' }}>Done</option>
                                                    <option value="notdone" {{ $itemorder->Cart->delivery_status == 'notdone' ? 'selected' : '' }}>Not done</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Tombol Submit di bawah -->
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection