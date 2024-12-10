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
                        <h3 class="text-center">Period March 2024</h3>
                        <div class="row">
                            <div class="col col-lg-4 col-md-4">
                                <h4 class="text-center">Transaction Summary</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Total Sales</td>
                                            <td>Rp. 15.000.000</td>
                                        </tr>
                                        <tr>
                                            <td>Total Transaction</td>
                                            <td>200 Transaction</td>
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
                                            <th>Discount</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Inv-01</td>
                                            <td>100.000</td>
                                            <td>27.000</td>
                                            <td>0</td>
                                            <td>127.000</td>
                                        </tr>
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