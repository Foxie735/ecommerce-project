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
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>Axel</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>axelsavero@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                                <td>123456789012</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>Jl. Penggilingan No.12</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <form action="#" class="form-inline">
                                        <div class="form-group mr-2">
                                            <select name="status" id="status" class="form-control">
                                                <option value="active">Active</option>
                                                <option value="nonactive">Non Active</option>
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
                </div>
            </div>
        </div>
        <div class="col col-lg-3 col-md-3"></div>
    </div>
</div>
@endsection