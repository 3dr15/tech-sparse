<html>
<head>
        <title>About Us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        hr.new5 {
            border: 3px solid rgb(48, 47, 47);
            border-radius: 5px;
            width: 860px;
        }
        p.ex1 {
            font-size: 13px;
        }
        p.ex2 {
            font-size: 13px;
            padding-left: 350px;
        }
        b.set{
            padding: 350px;
            font-size: 20px;
        }
        b.set1{
            padding: 1000px;
            font-size: 20px;
        }
        .box{
            background-color: lightgrey;
            width: 900px;
            height: 30px;

            font-size: 20px;
        }
    </style>

</head>
<body>
<div>
    <h1><b><font size = "11"><center><font color="white"></font><img src="{{ asset("image/2.svg") }}" height="70px" width="70px" />Tech Sparse </font> <font size = "4">(Business Venture Solution)</font></center></b></h1>
    <hr class="new5">
    <p class="ex1">
    <center><table width="800">
            <tr>
                <td bgcolor="lightgray"><b>DATE : </b></td>
                <td><input type="label" id="lbl1" value="{{ $quotation->created_at }}" /></td>
                <td bgcolor="lightgray"><b>Customer ID : </b></td>
                <td><input type="label" id="lbl1" value="{{ $quotation->orderrequest->user->id }}" /></td>
            </tr>
            <tr>
                <td bgcolor="lightgray"><b>Quotation No.</b></td>
                <td><input type="label" id="lbl2" value="{{ $quotation->id }}" /></td>
                <td bgcolor="lightgray"><b>Customer Name : </b></td>
                <td><input type="label" id="lbl2" value="{{ App\User::find($quotation->orderrequest->user->id)->name }}" /></td>
            </tr>
        </table></center>
    </p>
    <b class = "set">Company Details : </b>
    <p class="ex2">
    @php
        $orderRequest=json_decode($quotation->orderrequest->specifications);
        $orderRequest=$orderRequest[0];
        $quotationDetails=json_decode($quotation->quotationDetail);
    @endphp
    <table width="350">
        <tr>
            <td bgcolor="lightgray"><b>Company Name :</b></td>
            <td>{{ $quotation->user->vendor->shopName }}</td>
        </tr>
        <tr>
            <td bgcolor="lightgray"><b>Name :</b></td>
            <td>{{ $quotation->user->name }}</td>
        </tr>
        <tr>
            <td bgcolor="lightgray"><b>Address :</b></td>
            <td>{{ $quotation->user->vendor->address }}</td>
        </tr>
        <tr>
            <td bgcolor="lightgray"><b>Email :</b></td>
            <td>{{ $quotation->user->email }}</td>
        </tr>
        <tr>
            <td bgcolor="lightgray"><b>Phone No. :</b></td>
            <td>{{ $quotation->user->contact }}</td>
        </tr>
    </table>
    </p>
    <center><table width = "800" border="black">
            <th bgcolor="darkgray"><b>Sq No.</b></th>
            <th bgcolor="darkgray"><b>Item Name</b></th>

            <th bgcolor="darkgray"><b>Price</b></th>
            <th bgcolor="darkgray"><b>Total</b></th>
            <tr>
                <td>1</td>

                <td>Processor {{ $orderRequest->processor."--".$orderRequest->processor_type }}</td>
                <td>Rs. {{ $quotationDetails->processor_price }}</td>
                <td>Rs. {{ $quotationDetails->processor_price }}</td>

            </tr>
            <tr>
                <td bgcolor="lightgray">2</td>
                <td bgcolor="lightgray">Graphics {{ $orderRequest->gpu."--".$orderRequest->gpu_type }}</td>
                <td bgcolor="lightgray">Rs. {{ $quotationDetails->gpu_price }}</td>
                <td bgcolor="lightgray">Rs. {{ $quotationDetails->gpu_price }}</td>

            </tr>
            <tr>
                <td>3</td>
                <td>RAM {{ $orderRequest->RAM }}</td>
                <td>Rs. {{ $quotationDetails->RAM_price }}</td>
                <td>Rs. {{ $quotationDetails->RAM_price }}</td>

            </tr>
            <tr>
                <td bgcolor="lightgray">4</td>
                <td bgcolor="lightgray">Storage {{ $orderRequest->storage."--".$orderRequest->storage_space }}</td>
                <td bgcolor="lightgray">Rs. {{ $quotationDetails->storage_price }}</td>
                <td bgcolor="lightgray">Rs. {{ $quotationDetails->storage_price }}</td>

            </tr>
            <tr>
                <td >5</td>
                <td >Monitor {{ $orderRequest->MonitorType."--".$orderRequest->MonitorSize }}</td>
                <td >Rs. {{ $quotationDetails->monitor_price }}</td>
                <td >Rs. {{ $quotationDetails->monitor_price }}</td>

            </tr>
            <tr>
                <td bgcolor="lightgray">6</td>
                <td bgcolor="lightgray">OS {{ $orderRequest->OS."--".$orderRequest->OSType }}</td>
                <td bgcolor="lightgray">Rs. {{ $quotationDetails->OS_price }}</td>
                <td bgcolor="lightgray">Rs. {{ $quotationDetails->OS_price }}</td>

            </tr>
            <tr>
                <td>7</td>
                <td>Keyboard Mouse--{{ $orderRequest->KeyboardMouse }}</td>
                <td>Rs. {{ $quotationDetails->keyboardMouse_price }}</td>
                <td>Rs. {{ $quotationDetails->keyboardMouse_price }}</td>

            </tr>
            <tr>
                <td colspan="2" rowspan="3"><b>Note: <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "red">*</font>Only COD is Available. <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "red">*</font>No negotiation can be done after given amount.<b></td>
                <td bgcolor="darkgray">Total :</td>
                <td>Rs. {{ $quotationDetails->Total }}</td>
            </tr>
            <tr>
                <td bgcolor="darkgray">Discount :</td>
                <td>{{ $quotationDetails->discountRate }}%</td>
            </tr>
            <tr>
                <td bgcolor="darkgray">Grand Total :</td>
                <td>Rs. {{ $quotationDetails->grandTotal }}</td>
            </tr>
            <tr class="box"><td colspan="4" ><center>Thanks For Enquiry..!</center></td></tr>
        </table>
        <br><br>
        <button onclick="printPage()" class="btn btn-outline-dark" style=" ">Print</button></center>
    </div>
<script>
    function printPage(){
        window.print();
    }
</script>
</body>
</html>
