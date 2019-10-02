@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 py-2">
                                <a href="{{ route('home.admin.customer') }}">
                                    <div class="card bg-success text-white h-100">
                                        <div class="card-body bg-success">
                                            <div class="rotate">
                                                <i class="fa fa-user fa-4x"></i>
                                            </div>
                                            <h6 class="text-uppercase">Customers</h6>
                                            <h1 class="display-4">{{ $customerCount }}</h1>
                                        </div>
                                    </div>
                                </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 py-2">
                                <a href="{{ route('home.admin.vendor') }}">
                                    <div class="card text-white bg-danger h-100">
                                        <div class="card-body bg-danger">
                                            <div class="rotate">
                                                <i class="fa fa-list fa-4x"></i>
                                            </div>
                                            <h6 class="text-uppercase">Vendors</h6>
                                            <h1 class="display-4">{{ $vendorCount }}</h1>
                                        </div>
                                    </div>
                                </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 py-2">
                                <a href="{{ route('home.admin.order') }}">
                                    <div class="card text-white bg-info h-100">
                                        <div class="card-body bg-info">
                                            <div class="rotate">
                                                <i class="fa fa-twitter fa-4x"></i>
                                            </div>
                                            <h6 class="text-uppercase">Orders</h6>
                                            <h1 class="display-4">{{ $orderCount }}</h1>
                                        </div>
                                    </div>
                                </a>
                                </div>

                                <div class="col-xl-3 col-sm-6 py-2">
                                    <a href="{{ route('home.admin.audit') }}">
                                    <div class="card text-white bg-dark h-100">
                                        <div class="card-body">
                                            <div class="rotate">
                                                <i class="fa fa-share fa-4x"></i>
                                            </div>
                                            <h6 class="text-uppercase">Payments</h6>
                                            <h1 class="display-4">{{ $auditCount }}</h1>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>

                        </div>

                            You are logged in as Administrator!
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
