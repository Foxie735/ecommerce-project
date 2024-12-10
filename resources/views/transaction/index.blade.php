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
                        <form action="#">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Input Keyword">
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
                                        <th>Discount</th>
                                        <th>Shipping Cost</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Inv-01</td>
                                        <td>200.000</td>
                                        <td>0</td>
                                        <td>227.000</td>
                                        <td>Not Paid</td>
                                        <td>Checkout</td>
                                        <td>
                                            <a href="{{ route('transaction.show', 1) }}" class="btn btn-sm btn-info">Detail</a>
                                            <a href="{{ route('transaction.edit', 1) }}" class="btn btn-sm btn-primary">Edit</a>
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