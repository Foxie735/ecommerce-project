@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Customer Data
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.find') }}" method="GET">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="key" id="key" class="form-control" placeholder="Find Customer name, telephone, status, or email">
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($itemcustomer as $customer)
                                    @if($customer->role != 'admin')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->telephone }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->status }}</td>
                                        <td>
                                            <a href="{{ route('customer.edit', $customer->id_user) }}" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    @endif
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