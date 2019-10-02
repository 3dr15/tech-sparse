@extends('layouts.app')

@section('content')

    <div class="container">
        @php
            $count=0;
            //$newRequests=(object)array_reverse((array)$newRequests);
            $counter=0;
        @endphp
        @if($newRequests->count()==0 || $newRequests->count()==null)
            <div class="row justify-content-center mb-5">
                <div class="col-md-8">
                    <h3><center>{{ "No Order Request Found!" }}</center></h3>
                </div>
            </div>

        @endif
        @foreach($newRequests as $req)
            @php
                //$req=$req[$counter++];
                $specs=json_decode($req->specifications);
                $specs=$specs[0];

                /*echo '<pre>';
                print_r($req);
                print_r($specs);
                echo '</pre>';*/
            @endphp
            @php
                $userflag=false;
            @endphp
            @foreach($req->quotation as $quotation)
                @php
                    $userflag=false;
                        if ($quotation->user->id == Auth::user()->id){
                            $userflag=true;
                            break;
                        }else{
                            $userflag=false;
                        }
                @endphp
            @endforeach
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Order Request from : {{ $req->user->customer->address }}</strong>
                    </div>
                    <div class="card-body">
                        <h4>Order Specifications</h4>
                            <hr>
                            <div class="container">
                                <form method="post" action="{{ route('home.vendor') }}">
                                    @csrf
                                    <input type="hidden" name="request_by" value="{{ $req->id }}">
                                    <div class="row">
                                    <div class="col-md-4">
                                        <b>Processor</b>
                                    </div>
                                    <div class="div col-md-4">

                                        <p>{{ $specs->processor ." ".$specs->processor_type }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        @if(!$userflag)
                                        <input class="form-control processor_price" onkeyup="calc({{ $count }})" id="processor_price" name="processor_price" placeholder="Enter Price" type="text" required>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <b>Graphics</b>
                                    </div>
                                    <div class="div col-md-4">
                                        <p>{{ $specs->gpu ." ". $specs->gpu_type }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        @if(!$userflag)
                                        <input class="form-control gpu_price" onkeyup="calc({{ $count }})" id="gpu_price" name="gpu_price" placeholder="Enter Price" type="text" required>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <b>Hard Drive</b>
                                    </div>
                                    <div class="div col-md-4">
                                        <p>{{ $specs->storage ." ". $specs->storage_space }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        @if(!$userflag)
                                        <input class="form-control storage_price" onkeyup="calc({{ $count }})" id="storage_price" name="storage_price" placeholder="Enter Price" type="text" required>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <b>RAM</b>
                                    </div>
                                    <div class="div col-md-4">
                                        <p>{{ $specs->RAM }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        @if(!$userflag)
                                        <input class="form-control RAM_price" onkeyup="calc({{ $count }})" name="RAM_price" id="RAM_price" placeholder="Enter Price" type="text" required>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <b>Monitor</b>
                                    </div>
                                    <div class="div col-md-4">
                                        <p>{{ $specs->MonitorType ." ". $specs->MonitorSize }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        @if(!$userflag)
                                        <input class="form-control monitor_price" onkeyup="calc({{ $count }})" id="monitor_price" name="monitor_price" placeholder="Enter Price" type="text" required>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <b>KeyBoard Mouse</b>
                                    </div>
                                    <div class="div col-md-4">
                                        <p>{{ $specs->KeyboardMouse }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        @if(!$userflag)
                                        <input class="form-control keyboardMouse_price" onkeyup="calc({{ $count }})" id="keyboardMouse_price" name="keyboardMouse_price" placeholder="Enter Price" type="text" required>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <b>Operating System</b>
                                    </div>
                                    <div class="div col-md-4">
                                        <p>{{ $specs->OS ."-". $specs->OSType }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        @if(!$userflag)
                                        <input class="form-control OS_price" onkeyup="calc({{ $count }})" id="OS_price" name="OS_price" placeholder="Enter Price" type="text" required>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <b>Total Amount</b>
                                    </div>
                                    <div class="div col-md-4">
                                        <p>
                                            @if(!$userflag)
                                            <b>Rs. </b><span id="Total" class="Total"></span>
                                            <input type="hidden" class="TotalInput" name="Total" value="">
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <b>Discount Rate</b>
                                    </div>
                                    <div class="div col-md-4">
                                        @if(!$userflag)
                                        <p><b>Rs. </b>-<span id="discountAmount" class="discountAmount"></span></p>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        @if(!$userflag)
                                        <input class="form-control discountRate" onkeyup="calc({{ $count }})" id="discountRate" name="discountRate" placeholder="Enter Discount Percentage" type="text" required>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <b>Grand Total</b>
                                    </div>
                                    <div class="div col-md-4">
                                        <p>
                                            @if(!$userflag)
                                            <b>Rs. </b><span id="grandTotal" class="grandTotal"></span>
                                            <input type="hidden" class="grandTotalInput" name="grandTotal" value="">
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-4"></div>





                                        @if(!$userflag)
                                            @php
                                                $count++;
                                            @endphp
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-outline-dark">Send Quotation</button>
                                    </div>
                                            @else
                                            <div class="col-md-4">
                                                <a class="btn btn-outline-dark" target="_blank" href="@if($userflag){{ route('generateQuotation',['quotationId'=>$quotation->id]) }}@endif">Generate Quotation PDF</a>
                                            </div>
                                        @endif

                                </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

            <script>
                var processor_price=document.getElementsByClassName('processor_price');
                var gpu_price=document.getElementsByClassName('gpu_price');
                var storage_price=document.getElementsByClassName('storage_price');
                var RAM_price=document.getElementsByClassName('RAM_price');
                var monitor_price=document.getElementsByClassName('monitor_price');
                var keyboardMouse_price=document.getElementsByClassName('keyboardMouse_price');
                var OS_price=document.getElementsByClassName('OS_price');
                var discountRate=document.getElementsByClassName('discountRate');
                var discountAmount=document.getElementsByClassName('discountAmount');
                var grandTotal=document.getElementsByClassName('grandTotal');
                var Total=document.getElementsByClassName('Total');
                var TotalInput=document.getElementsByClassName('TotalInput');
                var grandTotalInput=document.getElementsByClassName('grandTotalInput');
                function calc(ele){
                    var total=0;
                    var grand_total=0;
                    var discount=0;
                    var v1=(processor_price[ele].value.length==0)? 0 : parseInt(processor_price[ele].value);
                    var v2=(gpu_price[ele].value.length==0)? 0 : parseInt(gpu_price[ele].value);
                    var v3=(storage_price[ele].value.length==0)? 0 : parseInt(storage_price[ele].value);
                    var v4=(RAM_price[ele].value.length==0)? 0 : parseInt(RAM_price[ele].value);
                    var v5=(monitor_price[ele].value.length==0)? 0 : parseInt(monitor_price[ele].value);
                    var v6=(keyboardMouse_price[ele].value.length==0)? 0 : parseInt(keyboardMouse_price[ele].value);
                    var v7=(OS_price[ele].value.length==0)? 0 : parseInt(OS_price[ele].value);
                    var discount=(discountRate[ele].value.length==0)? 0 : parseInt(discountRate[ele].value);

                    total=v1+v2+v3+v4+v5+v6+v7;
                    Total[ele].innerHTML=total;
                    TotalInput[ele].value=total;

                    discount=total-((total*discount)/100)
                    grandTotal[ele].innerHTML=discount;
                    //discountAmount.innerHTML=discount;

                    grand_total=total-discount;
                    discountAmount[ele].innerHTML=grand_total;
                    grandTotalInput[ele].value=discount;
                }
            </script>

@endsection
