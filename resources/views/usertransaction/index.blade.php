@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <div class="card border border-info">
                    <div class="card-header bg-info text-light">
                        <h6>Transaction Data</h6>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Sub Total</th>
                                        <th>Shipping Cost</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th>Delivery Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($itemorder as $order)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>
                                                {{ $order->Cart->no_invoice }}
                                            </td>
                                            <td>
                                                {{ number_format($order->Cart->subtotal, 2) }}
                                            </td>
                                            <td>
                                                {{ number_format($order->Cart->shipping_cost, 2) }}
                                            </td>
                                            <td>
                                                {{ number_format($order->Cart->total + $order->Cart->shipping_cost, 2) }}
                                            </td>
                                            <td>
                                                @if($order->Cart->payment_status === 'notpaid')
                                                    Not paid
                                                @else
                                                    Paid
                                                @endif
                                            </td>
                                            <td>
                                                @if($order->Cart->delivery_status === 'notdone')
                                                    Not done
                                                @else
                                                    Done
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('usertransaction.show', $order->id_order) }}" class="btn btn-sm btn-info mb-2">
                                                    Detail
                                                </a>
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