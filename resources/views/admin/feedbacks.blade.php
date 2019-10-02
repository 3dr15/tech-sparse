@extends('layouts.app')

@section('content')
    @if(Session::has('Success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('Success') }}
        </div>
    @endif
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
                            <th>User ID & Name</th>
                            <th>Email</th>
                            <th>Rating</th>
                            <th>Feedback</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->user_id.") ".App\User::find($feedback->user_id)->name }}</td>
                                <td><a href="mailto:{{ App\User::find($feedback->user_id)->email }}" class="text-light">{{ App\User::find($feedback->user_id)->email }}</a></td>
                                <td>{{ $feedback->rating }}</td>
                                <td>{{ $feedback->feedback }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
