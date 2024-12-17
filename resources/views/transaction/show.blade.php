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
                                        <td>{{ $detail->Product->code_product }}</td>
                                        <td>{{ $detail->Product->name_product }}</td>
                                        <td class="text-right">{{ number_format($detail->price, 2) }}</td>
                                        <td class="text-right">{{ $detail->quantity }}</td>
                                        <td class="text-right">{{ number_format($detail->subtotal, 2) }}</td>
                                    </tr>
                                    @endforeach 
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
                        <h3 class="card-title">Summary</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Total</td>
                                        <td>{{ number_format($itemorder->Cart->total, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>{{ number_format($itemorder->Cart->subtotal, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Cost</td>
                                        <td>{{ number_format($itemorder->Cart->shipping_cost, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Expedition</td>
                                        <td>{{ $itemorder->Cart->expedition }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Receipt</td>
                                        <td>{{ number_format($itemorder->Cart->no_receipt) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Status</td>
                                        <td>
                                            @if($itemorder->Cart->payment_status === 'notpaid')
                                                Not paid
                                            @else
                                                Paid
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            @if($itemorder->Cart->delivery_status === 'notdone')
                                                Not done
                                            @else
                                                Done
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection