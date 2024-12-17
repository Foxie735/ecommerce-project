@extends('layouts.template')

@section('content')
    <div class="container">
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
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($itemorder->Cart->CartDetail as $detail)
                                        <tr>
                                            <td>
                                                {{ $no++ }}
                                            </td>
                                            <td>
                                                {{ $detail->Product->code_product }}
                                            </td>
                                            <td>
                                                {{ $detail->Product->name_product }}
                                            </td>
                                            <td>
                                                {{ number_format($detail->price, 2) }}
                                            </td>
                                            <td>
                                                {{ $detail->quantity }}
                                            </td>
                                            <td>
                                                {{ number_format($detail->subtotal, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5">
                                            <b>Total</b>
                                        </td>
                                        <td class="text-right">
                                            <b>
                                                {{ number_format($itemorder->Cart->total, 2) }}
                                            </b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('usertransaction.index') }}" class="btn btn-sm btn-danger">Close</a>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Payment Method</h3>
                    </div>
                    <div class="card-body">
                        <style>
                            @media (min-width: 768px) {
                                .metode {
                                    margin-top: -30vh;
                                }
                            }

                            @media (min-width: 992px) {
                                .metode {
                                    margin-top: -10vh
                                }
                            }

                            @media (min-width: 1200px) {
                                .metode {
                                    margin-top: 0vh;
                                }
                            }
                        </style>
                        <div class="metode">
                            <style>
                                .payment {
                                    background: #f9f9f9;
                                    border: 1px solid #eaeaea;
                                    box-sizing: border-box;
                                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                                    height: 180px; /* Tetapkan tinggi yang seragam */
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: center;
                                    align-items: center;
                                    text-align: center;
                                    padding: 10px;
                                }

                                .payment img {
                                    max-width: 60%; /* Semua gambar seragam */
                                    height: auto;
                                    margin-bottom: 10px; /* Beri jarak ke teks */
                                }

                                .payment p {
                                    font-size: 0.9em;
                                    margin: 0; /* Hilangkan margin default */
                                }

                                @media (mid-width: 992px) {
                                    .payment {
                                        height: 20vh;
                                    }
                                }
                            </style>
                            <div class="kotak">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="card border-4 payment p-3">
                                            <img src="{{ asset('assets/images/bri.png') }}" alt="BRI">
                                            <p>
                                                BRI - 7200195757 <br> a/n Axel Savero
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="card border-4 payment p-3">
                                            <img src="{{ asset('assets/images/dana.png') }}" alt="DANA">
                                            <p>
                                                DANA - 092384923840 <br> a/n Axel Savero
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="card border-4 payment p-3">
                                            <img src="{{ asset('assets/images/gopay.png') }}" alt="Gopay">
                                            <p>
                                                Gopay - 092384923840 <br> a/n Axel Savero
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="card border-4 payment p-3">
                                            <img src="{{ asset('assets/images/bca.png') }}" alt="BCA">
                                            <p>
                                                BCA - 7200195757 <br> a/n Axel Savero
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="card border-4 payment p-3">
                                            <img src="{{ asset('assets/images/linkaja.png') }}" alt="LinkAja">
                                            <p>
                                                LinkAja - 081381721708 <br> a/n Axel Savero
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="card border-4 payment p-3">
                                            <img src="{{ asset('assets/images/jago.png') }}" alt="Jago">
                                            <p>
                                                Jago - 081381721708 <br> a/n Axel Savero
                                            </p>
                                        </div>
                                    </div>                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-4 col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Shipping Address</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Name Customer</td>
                                        <td class="text-right">
                                            {{ $itemorder->nama_penerima }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td class="text-right">
                                            {{ $itemorder->address }}<br/>
                                            {{ $itemorder->ward }},
                                            {{ $itemorder->subdistrict }}<br/>
                                            {{ $itemorder->city }},
                                            {{ $itemorder->province }} -
                                            {{ $itemorder->postal_code }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Telephone Number</td>
                                        <td class="text-right">
                                            {{ $itemorder->telephone }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
                                        <td class="text-right">
                                            {{ number_format($itemorder->Cart->total + $itemorder->Cart->shipping_cost, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-right">
                                            {{ number_format($itemorder->Cart->subtotal, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Cost</td>
                                        <td class="text-right">
                                            {{ number_format($itemorder->Cart->shipping_cost, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Expedition</td>
                                        <td class="text-right">
                                            {{ $itemorder->Cart->expedition }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Receipt Number</td>
                                        <td class="text-right">
                                            {{ number_format($itemorder->Cart->no_receipt, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Payment Status</td>
                                        <td class="text-right">
                                            @if($itemorder->Cart->payment_status === 'notpaid')
                                                Not paid
                                            @else
                                                Paid
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Delivery Status</td>
                                        <td class="text-right">
                                            @if($itemorder->Cart->delivery_status === 'notdone')
                                                Not done
                                            @else
                                                Done
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <a href="https://api.whatsapp.com/send?phone=6281381721708" class="btn btn-success">
                                                Confirm Order
                                            </a>
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