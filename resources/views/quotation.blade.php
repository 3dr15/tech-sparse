@extends('layouts.app')

@section('content')

<div class="container">
    @php
    use Illuminate\Support\Carbon;
        //$quotations=(object)array_reverse((array)$quotations);
        $counter=0;

    //dd($quotations);
    @endphp
    @if($quotations->count()==0 || $quotations->count()==null)
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h3><center>{{ "Quotations are not arrived yet!" }}</center></h3>
            </div>
        </div>

    @endif
    @foreach($quotations as $quotation)
    @php
    //echo '<pre>';
    //print_r($quotation);
    //echo '</pre>';
    //dd($quotation);
        //$quotation=$quotation[0];
        $quotationDetail=json_decode($quotation->quotationDetail);


            //$date1=date('Y-m-d h:i:s',$quotation->order->created_at);
            //$d=$quotation->order->created_at;
            //copy((string)$quotation->order->created_at->toDateString(),$d);
            //$d=json_decode($quotation->order->created_at);
            //$d=(string)$d->toDateString();
            //var_dump($d);
            //dd($d);
            //$d1=$d['date'];
            //$date1=date_create($d);

            //print_r($quotation->order->created_at);
            //$date2=date_create(date("Y-m-d h:i:s"));

            //$diff=date_diff($d,$date2);
            //$orderTracking1=$diff->format("%R%a");


        @endphp
    <div class="row justify-content-center mb-5">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Quotation From : {{ $quotation->user->name }} : Shop Name : {{ $quotation->user->vendor->shopName }}</strong>
                </div>
                <div class="card-body">
                    <h4>Quotation</h4>
                    <hr>
                    <div class="container">

                        <div class="row">
                            <div class="col-md-4">
                                <b>Total Amount</b>
                            </div>
                            <div class="div col-md-8">
                                <p>{{ $quotationDetail->Total }}</p>
                            </div>
                            <div class="col-md-4">
                                <b>Discount</b>
                            </div>
                            <div class="div col-md-8">
                                <p>{{ $quotationDetail->discountRate }} %</p>
                            </div>
                            <div class="col-md-4">
                                <b>Pay Amount</b>
                            </div>
                            <div class="div col-md-8">
                                <p>{{ $quotationDetail->grandTotal }}</p>
                            </div>

                            @php
                                //dd($date1);
                            @endphp
                            @if($quotation->order==null)

                                <div class="col-md-4">
                                    <form method="post" action="{{ route('home.quotations',['quotation_id'=>$quotation->id]) }}">
                                        @csrf
                                    <button type="submit" value="Place Order" class="btn btn-primary">Place Order</button>
                                    </form>
                                </div>

                            @else

                                <div class="col-md-4">
                                    <form method="post" action="{{ route('home.quotations.cancel',['quotation_id'=>$quotation->id]) }}">
                                        @csrf
                                    <button type="submit" value="Cancel Order" class="btn btn-outline-dark">Cancel Order</button>
                                    </form>
                                </div>

                                <div class="col-md-4">
                                    <kbd>Order is in Process</kbd>
                                </div>
                            @endif

                                <div class="col-md-4">
                                    <a class="btn btn-outline-dark" href="{{ route('generateQuotation',['quotationId'=>$quotation->id]) }}" target="_blank">See Details</a>
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

