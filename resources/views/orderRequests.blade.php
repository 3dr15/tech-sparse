@extends('layouts.app')

@section('content')
<div class="container">
    @php
        $count=0;
        //$requests=(object)array_reverse((array)$requests)
    @endphp
    @if($requests->count()==0 || $requests->count()==null)
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h3><center>{{ "No Order Requests Found!" }} </center></h3>
            </div>
        </div>

    @endif
    @foreach($requests as $req)
        @php
            //$req=$req[0];
            $specs=json_decode($req->specifications);
            $specs=$specs[0];

            /*echo '<pre>';
            print_r($req);
            print_r($specs);
            echo '</pre>';*/
        @endphp
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Order Requested at : {{ $req->created_at }} : {{ $req->user->customer->address }}</strong>
                    </div>
                    <div class="card-body">
                        <h4>Specifications</h4>
                        <hr>
                        <div class="container">
                            <form method="post" action="{{ route('home.vendor') }}">
                                @csrf
                                <input type="hidden" name="request_by" value="{{ $req->id }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>Processor</b>
                                    </div>
                                    <div class="div col-md-8">
                                        <p>{{ $specs->processor." ".$specs->processor_type }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Graphics</b>
                                    </div>
                                    <div class="div col-md-8">
                                        <p>{{ $specs->gpu ." ". $specs->gpu_type }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Hard Drive</b>
                                    </div>
                                    <div class="div col-md-8">
                                        <p>{{ $specs->storage ." ". $specs->storage_space }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>RAM</b>
                                    </div>
                                    <div class="div col-md-8">
                                        <p>{{ $specs->RAM }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Monitor</b>
                                    </div>
                                    <div class="div col-md-8">
                                        <p>{{ $specs->MonitorType ." ". $specs->MonitorSize }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>KeyBoard Mouse</b>
                                    </div>
                                    <div class="div col-md-8">
                                        <p>{{ $specs->KeyboardMouse }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Operating System</b>
                                    </div>
                                    <div class="div col-md-8">
                                        <p>{{ $specs->OS ."-". $specs->OSType }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="/home/orderRequest/{{ $req->id }}" class="btn btn-outline-dark">See Quotations</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $count++;
        @endphp
    @endforeach
</div>
@endsection
