@extends('layouts.app')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session()->get('message') }}</strong>
    </div>
@endif
    <div class="content mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Order Specification</h4></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('home') }}">
                            @csrf
                            <label for="Processor" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="form-group row">
                                <label for="Company" class="col-md-4 col-form-label text-md-right">Select Processor</label>
                                <div class="col-md-3">
                                    <select name="processor" class="custom-select" onchange="print_processor_type('processor_type', this.selectedIndex);" id="processors" required>
{{--                                        <option value="">---Select---</option>--}}
{{--                                        <option value="Intell">Intell</option>--}}
{{--                                        <option value="AMD">AMD</option>--}}
                                    </select>
                                    @error('processor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-5">
                                    <label for="Type" class="col-md-3 col-form-label text-md-right">Type</label>
                                    <select name="processor_type" id="processor_type" class="custom-select" style="width: 60%" required>
                                        <option value="">---Select---</option>
{{--                                        <option value="Intel i7">Intel i7</option>--}}
{{--                                        <option value="Intel i5">Intel i5</option>--}}
{{--                                        <option value="Intel i3">Intel i3</option>--}}
{{--                                        <option value="AMD ZEON">AMD ZEON</option>--}}
{{--                                        <option value="AMD Rx1.5">AMD Rx1.5</option>--}}
{{--                                        <option value="AMD Rx1.2">AMD Rx1.2</option>--}}
                                    </select>
                                    @error('processor_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <script language="javascript">print_processor("processors");</script>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Company" class="col-md-4 col-form-label text-md-right">Select Graphics Card</label>
                                <div class="col-md-3">
                                    <select name="gpu" id="gpu" class="custom-select" required>
                                        <option value="">---Select---</option>
                                        <option value="None">None</option>
                                        <option value="Intell">Intel</option>
                                        <option value="Intell">Nvidia</option>
                                        <option value="AMD">AMD Radion</option>
                                    </select>
                                    @error('gpu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="col-md-5">
                                    <label for="gpu_type" class="col-md-3 col-form-label text-md-right">Memory</label>
                                    <select name="gpu_type" id="gpu_type" class="custom-select" style="width: 60%" required>
                                        <option value="">---Select---</option>
                                        <option value="None">None</option>
                                        <option value="500 MB">500 MB</option>
                                        <option value="1 GB">1 GB</option>
                                        <option value="2 GB">2 GB</option>
                                        <option value="8 GB">8 GB</option>
                                        <option value="16 GB">16 GB</option>
                                        <option value="32 GB">32 GB</option>
                                    </select>
                                    @error('gpu_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="RAM" class="col-md-4 col-form-label text-md-right">RAM</label>
                                <div class="col-md-3">
                                    <select name="RAM" id="RAM" class="custom-select" required>
                                        <option value="">---Select---</option>
                                        <option value="2 GB">2 GB</option>
                                        <option value="4 GB">4 GB</option>
                                        <option value="8 GB">8 GB</option>
                                        <option value="16 GB">16 GB</option>
                                        <option value="32 GB">32 GB</option>
                                        <option value="64 GB">64 GB</option>
                                        <option value="128 GB">128 GB</option>
                                    </select>
                                    @error('RAM')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="storage" class="col-md-4 col-form-label text-md-right">Select Hard Drive</label>
                                <div class="col-md-3">
                                    <select name="storage" id="storage" class="custom-select" required>
                                        <option value="">---Select---</option>
                                        <option value="Hard Disk Drive (HDD)">Hard Disk Drive (HDD)</option>
                                        <option value="Solid State Drive (SDD)">Solid State Drive (SDD)</option>
                                    </select>
                                    @error('storage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-5">
                                    <label for="storage_space" class="col-md-3 col-form-label text-md-right">Space</label>
                                    <select name="storage_space" id="storage_space" class="custom-select" style="width: 60%" required>
                                        <option value="">---Select---</option>
                                        <option value="250 GB">250 GB</option>
                                        <option value="500 GB">500 GB</option>
                                        <option value="1 TB">1 TB</option>
                                        <option value="2 TB">2 TB</option>
                                    </select>
                                    @error('storage_space')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MonitorType" class="col-md-4 col-form-label text-md-right">Monitor Type</label>
                                <div class="col-md-3">
                                    <select name="MonitorType" id="MonitorType" class="custom-select" required>
                                        <option value="">---Select---</option>
                                        <option value="TFT">TFT</option>
                                        <option value="LED">LED</option>
                                    </select>
                                    @error('MonitorType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-5">
                                    <label for="MonitorSize" class="col-md-3 col-form-label text-md-right">Size</label>
                                    <select name="MonitorSize" id="MonitorSize" class="custom-select" style="width: 60%" required>
                                        <option value="">---Select---</option>
                                        <option value="18">18 Inches</option>
                                        <option value="15.6">15.6 Inches</option>
                                        <option value="14.5">14.5 Inches</option>
                                    </select>
                                    @error('MonitorSize')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="OS" class="col-md-4 col-form-label text-md-right">OS</label>
                                <div class="col-md-3">
                                    <select name="OS" id="OS" class="custom-select" onchange="print_os_type('OSType', this.selectedIndex);" required>
                                        <option value="">---Select---</option>
{{--                                        <option value="MS Windows">MS Windows</option>--}}
{{--                                        <option value="Linux">Linux</option>--}}
                                    </select>
                                    @error('OS')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-5">
                                    <label for="OSType" class="col-md-3 col-form-label text-md-right">Type</label>
                                    <select name="OSType" id="OSType" class="custom-select" style="width: 60%" required>
                                        <option value="">---Select---</option>
{{--                                        <option value="Linux Mint">Linux Mint</option>--}}
{{--                                        <option value="Ubuntu">Ubuntu</option>--}}
{{--                                        <option value="Windows 8">Windows 8</option>--}}
{{--                                        <option value="Windows 10">Windows 10</option>--}}
                                    </select>
                                    @error('OSType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <script language="javascript">print_os("OS");</script>

                            </div>

                            <div class="form-group row">
                                <label for="KeyboardMouse" class="col-md-4 col-form-label text-md-right">Keyboard Mouse</label>
                                <div class="col-md-7">
                                    <select name="KeyboardMouse" id="KeyboardMouse" class="custom-select" required>
                                        <option value="">---Select---</option>
                                        <option value="Media Support Keyboard">Media Support Keyboard & Mouse</option>
                                        <option value="Back light Media Support Keyboard">Back light Media Support Keyboard & Mouse</option>
                                        <option value="Non-Media Support Keyboard">Non-Media Support Keyboard & Mouse</option>
                                    </select>
                                    @error('KeyboardMouse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
