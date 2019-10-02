@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Order Specification</h4></div>
                <div class="card-body">
                    <form method="POST" action="#">
                        <input type="hidden" name="_token" value="MkNsEsO5LxFesvPQ68JBUZgm2dSUfhyvz3vRBQU3">
                        <label for="Processor" class="col-md-4 col-form-label text-md-right"></label>

                        <div class="form-group row">
                            <label for="Company" class="col-md-4 col-form-label text-md-right">Select Processor</label>
                            <div class="col-md-3">
                                <select name="Company" id="Company" class="custom-select">
                                    <option value="">---Select---</option>
                                    <option value="Intell">Intell</option>
                                    <option value="AMD">AMD</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label for="Type" class="col-md-3 col-form-label text-md-right">Type</label>
                                <select name="Type" id="Type" class="custom-select" style="width: 60%">
                                    <option value="">---Select---</option>
                                    <option value="Intel i7">Intel i7</option>
                                    <option value="Intel i5">Intel i5</option>
                                    <option value="Intel i3">Intel i3</option>
                                    <option value="AMD ZEON">AMD ZEON</option>
                                    <option value="AMD Rx1.5">AMD Rx1.5</option>
                                    <option value="AMD Rx1.2">AMD Rx1.2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Company" class="col-md-4 col-form-label text-md-right">Select Graphics Card</label>
                            <div class="col-md-3">
                                <select name="Company" id="Company" class="custom-select">
                                    <option value="">---Select---</option>
                                    <option value="Intell">Nvidia</option>
                                    <option value="AMD">AMD Radion</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label for="Type" class="col-md-3 col-form-label text-md-right">Type</label>
                                <select name="Type" id="Type" class="custom-select" style="width: 60%">
                                    <option value="">---Select---</option>
                                    <option value="Nvidia GTX 1080">Nvidia GTX 1080</option>
                                    <option value="Nvidia GTX 2010">Nvidia GTX 2010</option>
                                    <option value="Nvidia GT 820M">Nvidia GT 820M</option>
                                    <option value="">AMD Radion G 2.1v</option>
                                    <option value="">AMD Radion GT 8v</option>
                                    <option value="">AMD Radion RM 7.3v</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="RAM" class="col-md-4 col-form-label text-md-right">RAM</label>
                            <div class="col-md-3">
                                <select name="RAM" id="RAM" class="custom-select">

                                    <option value="">---Select---</option>
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="8">8</option>
                                    <option value="16">16</option>
                                    <option value="32">32</option>
                                    <option value="64">64</option>
                                    <option value="128">128</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Drive" class="col-md-4 col-form-label text-md-right">Select Hard Drive</label>
                            <div class="col-md-3">
                                <select name="Drive" id="Drive" class="custom-select">
                                    <option value="">---Select---</option>
                                    <option value="Hard Disk Drive (HDD)">Hard Disk Drive (HDD)</option>
                                    <option value="Solid State Drive (SDD)">Solid State Drive (SDD)</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label for="Storage" class="col-md-3 col-form-label text-md-right">Space</label>
                                <select name="Storage" id="Storage" class="custom-select" style="width: 60%">
                                    <option value="">---Select---</option>
                                    <option value="250 GB">250 GB</option>
                                    <option value="500 GB">500 GB</option>
                                    <option value="1 TB">1 TB</option>
                                    <option value="2 TB">2 TB</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="MonitorType" class="col-md-4 col-form-label text-md-right">Monitor Type</label>
                            <div class="col-md-3">
                                <select name="MonitorType" id="MonitorType" class="custom-select">
                                    <option value="">---Select---</option>
                                    <option value="TFT">TFT</option>
                                    <option value="LED">LED</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label for="MonitorSize" class="col-md-3 col-form-label text-md-right">Size</label>
                                <select name="MonitorSize" id="MonitorSize" class="custom-select" style="width: 60%">
                                    <option value="">---Select---</option>
                                    <option value="18">18 Inches</option>
                                    <option value="15.6">15.6 Inches</option>
                                    <option value="14.5">14.5 Inches</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="OS" class="col-md-4 col-form-label text-md-right">OS</label>
                            <div class="col-md-3">
                                <select name="OS" id="OS" class="custom-select">
                                    <option value="">---Select---</option>
                                    <option value="MS Windows">MS Windows</option>
                                    <option value="Linux">Linux</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label for="OSType" class="col-md-3 col-form-label text-md-right">Type</label>
                                <select name="OSType" id="OSType" class="custom-select" style="width: 60%">
                                    <option value="">---Select---</option>
                                    <option value="Linux Mint">Linux Mint</option>
                                    <option value="Ubuntu">Ubuntu</option>
                                    <option value="Windows 8">Windows 8</option>
                                    <option value="Windows 10">Windows 10</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="KeyboardMouse" class="col-md-4 col-form-label text-md-right">Keyboard Mouse</label>
                            <div class="col-md-7">
                                <select name="Type" id="KeyboardMouse" class="custom-select">
                                    <option value="">---Select---</option>
                                    <option value="Media Support Keyboard">Media Support Keyboard & Mouse</option>
                                    <option value="Back light Media Support Keyboard">Back light Media Support Keyboard & Mouse</option>
                                    <option value="Non-Media Support Keyboard">Non-Media Support Keyboard & Mouse</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-dark">Place Order</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
