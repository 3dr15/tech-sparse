@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <i style="font-size:24px" class="fa">&#xf2be;</i>{{ __('Vendor Registration') }}
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('v_register') }}">
            @csrf
            <div class="form-group row">
                <label for="Name" class="col-md-4 col-form-label text-md-right">Enter Name</label>
            <div class="col-md-6">
              <input id="v_name" type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                     value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>
          <div class="form-group row"><label for="Email" class="col-md-4 col-form-label text-md-right">Email Address</label>
            <div class="col-md-6">
              <input id="v_email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                     value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>
            <div class="form-group row"><label for="shopName" class="col-md-4 col-form-label text-md-right">Shop Name</label>
            <div class="col-md-6">
              <input id="shopName" type="text" name="shopName" class="form-control @error('shopName') is-invalid @enderror"
                     value="{{ old('shopName') }}" required autocomplete="shopName" placeholder="Enter Shop Name">
                @error('shopName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>
          <div class="form-group row"><label for="Contact" class="col-md-4 col-form-label text-md-right">Enter Mobile
              No.</label>
            <div class="col-md-6">
              <input id="v_num" type="text" name="contact" value="{{ old('contact') }}" required="required" autofocus="autofocus"
                class="form-control @error('contact') is-invalid @enderror" placeholder="Enter Mobile No.">
                @error('contact')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>
          <div class="form-group row"><label for="Telephone" class="col-md-4 col-form-label text-md-right">Enter
              Telephone No.</label>
            <div class="col-md-6">
              <input id="altPhone" type="text" name="altPhone" value="{{ old('altPhone') }}" required="required" autofocus="autofocus"
                class="form-control @error('altPhone') is-invalid @enderror" placeholder="Enter Telephone No.">
                @error('altPhone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>
            <div class="form-group row"><label for="Address" class="col-md-4 col-form-label text-md-right">Enter Address</label>
                <div class="col-md-6">

                    <select class="custom-select" name="state" onchange="print_city('state', this.selectedIndex);" id="sts"  required>
                        {{--                  <option selected disabled="disabled">Select State</option>--}}
                        {{--                  <option value="Gujarat">Gujarat</option>--}}
                        {{--                  <option value="Madhya Pradesh">Madhya Pradesh</option>--}}
                        {{--                  <option value="Kerela">Kerela</option>--}}
                    </select>

                    <select class="custom-select" id ="state" name="City" required>
                        {{--                <option selected disabled="disabled">Select City</option>--}}
                        {{--                <option value="Ahemdabad">Ahemdabad</option>--}}
                        {{--                <option value="Surat">Surat</option>--}}
                        {{--                <option value="Baroda">Baroda</option>--}}
                    </select>
                    <script language="javascript">print_state("sts");</script>
                </div>
            </div>
            <div class="form-group row">
                <label for="Address" class="col-md-4 col-form-label text-md-right"></label>
                <div class="col-md-6">
                    <input id="flatNo" type="text" name="flatNo" value="{{ old('flatNo') }}" required autofocus class="form-control @error('flatNo') is-invalid @enderror" style="width :35%" placeholder="Flat No">
                    @error('flatNo')
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
          <div class="form-group row"><label for="Dropdown" class="col-md-4 col-form-label text-md-right">Select
              Document Proof</label>
            <div class="col-md-6">
                <select class="custom-select" id="docProofType" name="docProofType" required>
                    <option selected disabled="disabled">Select Document</option>
                    <option value="Aadhar Card">Aadhar Card</option>
                    <option value="Shop Licence">Shop Licence</option>
                    <option value="Pan Card">Pan Card</option>
                    <option value="Driving Licence">Driving Licence</option>
{{--                <option value="5">Other</option>--}}
                </select>
            </div>
          </div>
          <div class="form-group row"><label for="proofNumber" class="col-md-4 col-form-label text-md-right">Add Proof ID</label>
            <div class="col-md-6">
{{--              <input id="doc_proff" type="file" name="doc_proff" value="" required autofocus class="form-control">--}}
                <input id="proofNumber" class="form-control @error('proofNumber') is-invalid @enderror" placeholder="Enter ID number"  type="text" name="proofNumber" value="{{ old('proofNumber') }}" required autofocus>
                @error('proofNumber')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>
          <div class="form-group row"><label for="Capacity" class="col-md-4 col-form-label text-md-right">Product
              Selling Capacity</label>
            <div class="col-md-6">
                <select class="custom-select" id="sellingCapacity" name="sellingCapacity" required>
                    <option value="MIN -- Upto 20 PC">MIN -- Upto 20 PC</option>
                    <option value="MID -- Greater Than 21 Lesser 50 PC">MID -- Greater Than 21 Lesser 50 PC</option>
                    <option value="MAX -- Greater Than Or Equal 50 PC">MAX-- Greater Than Or Equal 50 PC</option>
                </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
            <div class="col-md-6">
              <input id="password" type="password" name="password"
                class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" required autocomplete="new-password">
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
              <input id="password-confirm" type="password" name="password_confirmation" required="required"
                autocomplete="new-password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Re-Enter Password">
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
                Register
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
