@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/star.css') }}">
@if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{ $message }}
    </div>
@endif
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Rating & Feedback</strong>
                </div>
                <div class="card-body">
                    <h4>Thaks For Your Feedback</h4>
                    <hr>
                    <div class="container">
                        <form action="{{ route('ratingNfeedback') }}" method="POST">
                            @csrf
                        <div class="row">


                                <div class="col-md-4">
                                    <b>Email</b>
                                </div>
                                <div class="div col-md-8">
                                    <input class="form-control" name="email" type="email" value="{{ Auth::user()->email }}" required disabled>
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <b>Rating</b>
                                </div>
                                <div class="div col-md-8">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    @error('rate')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <b>Feedback</b>
                                </div>
                                <div class="div col-md-8">
                                    <textarea name="feedback" rows="8" class="form-control" placeholder="Your Feedback is valueable to us!" required></textarea>
                                    @error('feedback')
                                    {{ $message }}
                                    @enderror
                                </div>


                                <div class="col-md-4"><button class="btn btn-outline-dark" type="submit">Send Feedback</button></div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
