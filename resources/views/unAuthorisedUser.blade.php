@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>403 | Forbidden</h1>
                <h1>Unauthorised User : {{$user}}</h1>
            </div>
        </div>
    </div>

@endsection
