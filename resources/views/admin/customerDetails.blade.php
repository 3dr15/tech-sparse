@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Customer Details</strong>
                </div>
                <div class="card-body">
                    <h4><button class="btn btn-outline-dark" onclick="ExportExcel()">Export Excel</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-dark" onclick="ExportPDF()">Export PDF</button></h4>
                    <hr>
                    <table class="table table-dark table-hover" id="TBL">
                        <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Order Requests</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td><center>{{ $customer->id }}</center></td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->contact }}</td>
                            <td><a href="mailto:{{ $customer->email }}" class="text-light">{{ $customer->email }}</a></td>
                            <td>{{ $customer->customer->address }}</td>
                            <td><center>{{ $customer->orderrequest->count() }}</center></td>
                            <td><a href="{{ route('home.admin.customer.del',[ 'id' => $customer->id ]) }}" class="btn btn-outline-danger">Delete</a></td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
