@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Transaction Data
                        </h3>
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
                        <form action="{{ route('transaction.find') }}" method="GET">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="key" id="key" class="form-control" 
                                    placeholder="search by sender name, sent name, and payment status or delivery status">
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Sub Total</th>
                                        <th>Shipping Cost</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($itemorder as $order)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $order->no_invoice }}</td>
                                        <td>{{ number_format($order->subtotal, 2) }}</td>
                                        <td>{{ number_format($order->shipping_cost, 2) }}</td>
                                        <td>{{ number_format($order->total + $order->shipping_cost, 2) }}</td>
                                        <td>
                                            @if($order->payment_status === 'notpaid')
                                                Not paid
                                            @else
                                                Paid
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->delivery_status === 'notdone')
                                                Not done
                                            @else
                                                Done
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('transaction.show', $order->id_order) }}" class="btn btn-sm btn-info">Detail</a>
                                            <a href="{{ route('transaction.edit', $order->id_order) }}" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection