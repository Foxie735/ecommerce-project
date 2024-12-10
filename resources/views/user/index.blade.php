@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-4 col-md-4">
                <div class="card card-primary card-outline">
                    <div class="text-center">
                        <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="profil" class="profile-user-img img-responsive img-circle">
                    </div>
                    <h3 class="profile-username text-center">Axel Savero</h3>
                    <p class="text-muted text-center">Member Since : 07 March 2020</p>
                    <hr>
                    <div class="mx-4">
                        <strong>
                            <i class="fas fa-map-marker mr-2"></i>
                            Address
                        </strong>
                        <p class="text-muted">
                            Jl. Penggilingan No.12
                        </p>
                        <strong>
                            <i class="fas fa-envelope mr-2"></i>
                            Email
                        </strong>
                        <p class="text-muted">
                            axelsavero@gmail.com
                        </p>
                        <strong>
                            <i class="fas fa-phone mr-2"></i>
                            Telephone
                        </strong>
                        <p class="text-muted">
                            123456789012
                        </p>
                        <hr>
                        <a href="{{ route('profile.setting') }}" class="btn btn-primary btn-block mb-4">Setting</a>
                    </div>
                </div>
            </div>
            <div class="col col-lg-8 col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Transaction History</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Invoice</th>
                                        <th>Sub Total</th>
                                        <th>Discount</th>
                                        <th>Shipping Cost</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>INV-01</td>
                                        <td>200.000</td>
                                        <td>0</td>
                                        <td>7.000</td>
                                        <td>227.000</td>
                                        <td>Not Paid</td>
                                        <td>Checkout</td>
                                        <td>
                                            <a href="{{ route('transaction.show', 1) }}" class="btn btn-sm btn-info mb-2">Detail</a>
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