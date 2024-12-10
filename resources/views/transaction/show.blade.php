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
                                    <tr>
                                        <td>1</td>
                                        <td>KATE-1</td>
                                        <td>Kimbab</td>
                                        <td class="text-right">15.000</td>
                                        <td class="text-right">2</td>
                                        <td class="text-right">30.000</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>KATE-2</td>
                                        <td>Kimbab</td>
                                        <td class="text-right">35.000</td>
                                        <td class="text-right">2</td>
                                        <td class="text-right">70.000</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>KATE-3</td>
                                        <td>Kimbab</td>
                                        <td class="text-right">25.000</td>
                                        <td class="text-right">2</td>
                                        <td class="text-right">50.000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <b>Total</b>
                                        </td>
                                        <td class="text-right">
                                            <b>150.000</b>
                                        </td>
                                    </tr>
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
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Total</td>
                                    <td>127.000</td>
                                </tr>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>150.000</td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Shipping Cost</td>
                                    <td>27.000</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>JNE</td>
                                </tr>
                                <tr>
                                    <td>No. Receipt</td>
                                    <td>123456789012</td>
                                </tr>
                                <tr>
                                    <td>Payment Status</td>
                                    <td>Paid</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>In Delivery</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection