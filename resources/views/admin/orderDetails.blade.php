@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Order Details</strong>
                </div>
                <div class="card-body">
                    <h4><button class="btn btn-outline-dark" onclick="ExportExcel('TBL','OrderTable')">Export Excel</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-dark" onclick="ExportPDF()">Export PDF</button></h4>
                    <hr>
                    <table class="table table-dark table-hover" id="TBL">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer ID & Name</th>
                            <th>Customer Contact</th>
                            <th>Vendor ID & Name</th>
                            <th>Vendor Contact</th>
                            <th>Order Amount</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td>{{ $orderDetail->id }}</td>
                                <td>{{ $orderDetail->user->id.") ".$orderDetail->user->name }}</td>
                                <td>{{ $orderDetail->user->contact }}</td>
                                <td>{{ $orderDetail->quotation->user->id.") ".$orderDetail->quotation->user->name }}</td>
                                <td>{{ $orderDetail->quotation->user->contact }}</td>
                                @php
                                    $amount=json_decode($orderDetail->quotation->quotationDetail);
                                    $amount=$amount->grandTotal;
                                @endphp
                                <td>{{ $amount }}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
