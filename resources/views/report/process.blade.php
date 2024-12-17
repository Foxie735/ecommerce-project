@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Sells Report</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center">Period {{ $month }} {{ $year }}</h3>
                        <div class="row">
                            <div class="col col-lg-4 col-md-4">
                                <h4 class="text-center">Transaction Summary</h4>
                                <table class="table table-bordered">
                                    @php
                                        $total = 0;
                                        foreach ($itemtransaction as $k) {
                                            $total += $k->Cart->total + $k->Cart->shipping_cost;
                                        }
                                    @endphp
                                    <tbody>
                                        <tr>
                                            <td>Total Sales</td>
                                            <td>Rp. {{ number_format($total, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Transaction</td>
                                            <td>{{ count($itemtransaction) }} Transaction</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col col-lg-8 col-md-8">
                                <h4 class="text-center">Detail Transaction</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Subtotal</th>
                                            <th>Shipping Cost</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($itemtransaction as $transaction)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    {{ $transaction->Cart->no_invoice }}
                                                </td>
                                                <td>
                                                    {{ number_format($transaction->Cart->subtotal, 2) }}
                                                </td>
                                                <td>
                                                    {{ number_format($transaction->Cart->shipping_cost, 2) }}
                                                </td>
                                                <td>
                                                    {{ number_format($transaction->Cart->total + $transaction->Cart->shipping_cost, 2) }}
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
    </div>
@endsection