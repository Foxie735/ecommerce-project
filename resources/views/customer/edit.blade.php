@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-3 col-md-3"></div>
        <div class="col col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Customer</h3>
                    <div class="card-tools">
                        <a href="{{ route('customer.index') }}" class="btn btn-danger btn-sm">
                            Close
                        </a>
                    </div>
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
                    <form action="{{ route('customer.update', $itemcustomer->id_user) }}" method="POST">
                        @csrf
                        @method('put')
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $itemcustomer->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $itemcustomer->email }}</td>
                                </tr>
                                <tr>
                                    <td>Telephone</td>
                                    <td>{{ $itemcustomer->telephone }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $itemcustomer->address }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <form action="#" class="form-inline">
                                            <div class="form-group mr-2">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="active" {{ $itemcustomer->status === 'active' ? 'selected' : '' }}>Active</option>
                                                    <option value="inactive" {{ $itemcustomer->status === 'inactive' ? 'selected' : '' }}>Non Active</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="col col-lg-3 col-md-3"></div>
    </div>
</div>
@endsection