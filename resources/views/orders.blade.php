@extends('layouts.app')

@section('content')
<div class="container">
    @if($selectedOrders==null)
        <div class="container">
            <div class="row">
                <div class="col-sm-12"><h3><center>No orders right now !</center></h3></div>
            </div>
        </div>
    @endif
@foreach($selectedOrders as $selectedOrder)
        @php
            $specs=json_decode($selectedOrder->quotation->orderrequest->specifications);
            $specs=$specs[0];
            $quotation=json_decode($selectedOrder->quotation->quotationDetail);
        @endphp
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Order Request from : {{ $selectedOrder->quotation->orderrequest->user->customer->address }}</strong>
                </div>
                <div class="card-body">
                    <h4>Order Specifications</h4>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <b>Processor</b>
                            </div>
                            <div class="div col-md-4">
                                <p>{{ $specs->processor." ".$specs->processor_type }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>{{ $quotation->processor_price }}</p>
                            </div>
                            <div class="col-md-4">
                                <b>Graphics</b>
                            </div>
                            <div class="div col-md-4">
                                <p>{{ $specs->gpu ." ". $specs->gpu_type }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>{{ $quotation->gpu_price }}</p>
                            </div>
                            <div class="col-md-4">
                                <b>Storage</b>
                            </div>
                            <div class="div col-md-4">
                                <p>{{ $specs->storage ." ". $specs->storage_space }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>{{ $quotation->storage_price }}</p>
                            </div>
                            <div class="col-md-4">
                                <b>RAM</b>
                            </div>
                            <div class="div col-md-4">
                                <p>{{ $specs->RAM }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>{{ $quotation->RAM_price }}</p>
                            </div>
                            <div class="col-md-4">
                                <b>Monitor</b>
                            </div>
                            <div class="div col-md-4">
                                <p>{{ $specs->MonitorType ." ". $specs->MonitorSize }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>{{ $quotation->monitor_price }}</p>
                            </div>
                            <div class="col-md-4">
                                <b>KeyBoard Mouse</b>
                            </div>
                            <div class="div col-md-4">
                                <p>{{ $specs->KeyboardMouse }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>{{ $quotation->keyboardMouse_price }}</p>
                            </div>
                            <div class="col-md-4">
                                <b>Operating System</b>
                            </div>
                            <div class="div col-md-4">
                                <p>{{ $specs->OS ."-". $specs->OSType }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>{{ $quotation->OS_price }}</p>
                            </div>
                            <div class="col-md-4"><b>Total - {{ $quotation->Total }}</b></div>
                            <div class="col-md-4"><b>Discount - {{ $quotation->discountRate }}%</b></div>
                            <div class="col-md-4"><b>Grand Total - {{ $quotation->grandTotal }}</b></div>

                            <div class="col-md-4">

                                <form action="{{ route('home.vendor.orderDone') }}" method="post">
                                @csrf
                                    <input type="hidden" name="paidBy" value="{{ $selectedOrder->quotation->orderrequest->user->id }}">
                                    <input type="hidden" name="amount" value="{{ $quotation->grandTotal }}">
                                    <input type="submit" value="Done" class="btn btn-outline-dark">

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection
