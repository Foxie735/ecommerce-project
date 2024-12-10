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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Axel</td>
                                        <td>axelsavero@gmail.com</td>
                                        <td>123456789012</td>
                                        <td>Jl. Penggilingan No. 12</td>
                                        <td>Active</td>
                                        <td>
                                            <a href="{{ route('customer.edit', 1) }}" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Axel</td>
                                        <td>axelsavero@gmail.com</td>
                                        <td>123456789012</td>
                                        <td>Jl. Penggilingan No. 12</td>
                                        <td>Active</td>
                                        <td>
                                            <a href="{{ route('customer.edit', 1) }}" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Axel</td>
                                        <td>axelsavero@gmail.com</td>
                                        <td>123456789012</td>
                                        <td>Jl. Penggilingan No. 12</td>
                                        <td>Active</td>
                                        <td>
                                            <a href="{{ route('customer.edit', 1) }}" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Axel</td>
                                        <td>axelsavero@gmail.com</td>
                                        <td>123456789012</td>
                                        <td>Jl. Penggilingan No. 12</td>
                                        <td>Active</td>
                                        <td>
                                            <a href="{{ route('customer.edit', 1) }}" class="btn btn-sm btn-primary">Edit</a>
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