<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../../techsparse/css/bootstrap.min.css">
  <script src="../../../../techsparse/js/jquery.min.js"></script>
  <script src="../../../../techsparse/js/popper.min.js"></script>
  <script src="../../../../techsparse/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8"><div class="card">
      <div class="card-header"><i style="font-size:24px" class="fa">&#xf2be;</i>&nbsp;&nbsp;&nbsp;&nbsp;Customer Registration</div>
      <div class="card-body">
        <form method="POST" action="{{ route('c_register') }}">
            @csrf
            <div class="form-group row">
                <label for="Name" class="col-md-4 col-form-label text-md-right">Enter Name</label>
            <div class="col-md-6">
              <input id="c_name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
          <div class="form-group row"><label for="Email" class="col-md-4 col-form-label text-md-right">Enter Email</label>
            <div class="col-md-6">
                <input id="c_email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email"  value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>

          <div class="form-group row"><label for="Contact" class="col-md-4 col-form-label text-md-right">Enter Contact No.</label>
            <div class="col-md-6">
              <input id="contact" type="text" name="contact" value="{{ old('contact') }}" required autofocus class="form-control @error('contact') is-invalid @enderror" placeholder="Enter Contact No." >
                @error('contact')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>



          <div class="form-group row"><label for="Address" class="col-md-4 col-form-label text-md-right">Enter Address</label>
          <div class="col-md-6">

              <select class="custom-select @error('state') is-invalid @enderror" name="state" onchange="print_city('state', this.selectedIndex);" id="sts"  required>
{{--                  <option selected disabled="disabled">Select State</option>--}}
{{--                  <option value="Gujarat">Gujarat</option>--}}
{{--                  <option value="Madhya Pradesh">Madhya Pradesh</option>--}}
{{--                  <option value="Kerela">Kerela</option>--}}
              </select>
              @error('state')
              <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              <select class="custom-select @error('City') is-invalid @enderror" id ="state" name="City" required>
{{--                <option selected disabled="disabled">Select City</option>--}}
{{--                <option value="Ahemdabad">Ahemdabad</option>--}}
{{--                <option value="Surat">Surat</option>--}}
{{--                <option value="Baroda">Baroda</option>--}}
              </select>
              @error('City')
              <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              <script language="javascript">print_state("sts");</script>

          </div>
        </div>
            <div class="form-group row">
                <label for="Address" class="col-md-4 col-form-label text-md-right"></label>
                <div class="col-md-6">
                    <input id="flatNo" type="text" name="flatNo" value="{{ old('flatNo') }}" required autofocus class="form-control @error('flatNo') is-invalid @enderror" style="width :35%" placeholder="Flat No">
                    @error('City')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input id="streetColony" type="text" name="streetColony" value="{{ old('streetColony') }}" required autofocus class="form-control @error('streetColony') is-invalid @enderror" style="width :65%" placeholder="Street/Colony">
                    @error('streetColony')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="landMark" type="text" name="landMark" value="{{ old('landMark') }}" required autofocus class="form-control @error('landMark') is-invalid @enderror" style="width :65%" placeholder="Land Mark">
                    @error('landMark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                    @enderror
                </div>
            </div>


          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password" >
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
            <div class="col-md-6">
              <input id="password-confirm" type="password" name="password_confirmation" required="required" autocomplete="new-password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Re-Enter Password" >
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-outline-dark">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  </div>
@endsection
