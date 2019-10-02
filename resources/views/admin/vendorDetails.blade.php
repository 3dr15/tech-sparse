@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Vendor Details</strong>
                </div>
                <div class="card-body">
                    <h4><button class="btn btn-outline-dark" onclick="ExportExcel('TBL','VendorDetails')">Export Excel</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-dark" onclick="ExportPDF()">Export PDF</button></h4>
                    <hr>
                    <table class="table table-dark table-hover" id="TBL">
                        <thead>
                        <tr>
                            <th>Vendor ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Shop Name</th>

                            <th>Address</th>
                            <th>Document Proof</th>
                            <th>Selling Capacity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vendors as $vendor)
                            <tr>
                                <td>{{ $vendor->id }}</td>
                                <td>{{ $vendor->name }}</td>
                                <td>{{ $vendor->contact }}</td>
                                <td><a class="text-light" href = "mailto:{{ $vendor->email }}">{{ $vendor->email }}</a></td>
                                <td>{{ $vendor->vendor->shopName }}</td>
                                <td>{{ $vendor->vendor->address }}</td>
                                <td>{{ $vendor->vendor->documentProof }}</td>
                                <td>{{ $vendor->vendor->sellingCapacity }}</td>
                                <td><a href="{{ route('home.admin.vendor.del',['id'=>$vendor->id]) }}" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
