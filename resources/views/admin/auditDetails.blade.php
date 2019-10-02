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
                            <th>Audit ID</th>
                            <th>Paid By</th>
                            <th>Paid To</th>
                            <th>Order Amount</th>
                            <th>Transaction Date & Time</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Audits as $Audit)
                            @php
                                if(Auth::user()->user_role_id==App\User::find($Audit->user_paidTo_id)->user_role_id || Auth::user()->user_role_id==App\User::find($Audit->user_paidBy_id)->user_role_id || Auth::user()->user_role_id==1){
                            @endphp
                            <tr>
                                <td>{{ $Audit->id }}</td>
                                <td>{{ $Audit->user_paidBy_id .") ". App\User::find($Audit->user_paidBy_id)->name  }}</td>
                                <td>{{ $Audit->user_paidTo_id. ") ". App\User::find($Audit->user_paidTo_id)->name }}</td>
                                <td>{{ $Audit->amount }}</td>
                                <td>{{ $Audit->created_at }}</td>

                            </tr>
                            @php
                                }
                            @endphp
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
