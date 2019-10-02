<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('image/2.svg') }}" type="image/gif" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://kit.fontawesome.com/yourcode.js"></script>
{{--    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">--}}
{{--    <script src="{{ asset('js/jquery.min.js') }}"></script>--}}
{{--    <script src="{{ asset('js/popper.min.js') }}"></script>--}}
{{--    <script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/cities.js') }}"></script>
    <script src="{{ asset('js/processor.js') }}"></script>
    <script src="{{ asset('js/operatingsystem.js') }}"></script>
    <style>
        .navbar-brand, .nav-link:hover{
            color: white !important;
        }
    </style>
</head>
<body>
    <div id="app">


        <div class="jumbotron jumbotron-fluid mb-0">
            <div class="container">
                <h1><img src="{{ asset('image/2.svg') }}" style="width: 7%" alt="">TechSparse</h1>
                <hr>
                <p>The Business Venture Solutions</p>
            </div>
        </div>





        <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{--{{ config('app.name', 'TechSparse') }}--}}
                    <?= "TechSparse"?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest

                        @else
                            @php
                               //use Illuminate\Support\Facades\Auth;
                               $userRole= Auth::user()->user_role_id;

                            @endphp
                        <li class="nav-item">
                            <a class="nav-link" href="@if($userRole==1){{ route('home.admin') }} @elseif($userRole==2) {{ route('home.vendor') }} @else {{ route('home') }}@endif">Home </a>
                        </li>
                        @if($userRole==1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.admin.customer') }}">Customer Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.admin.vendor') }}">Vendor Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.admin.order') }}">Order Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.admin.audit') }}">Audit Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.admin.feedback') }}">Feedbacks</a>
                                </li>

                            @endif

                        @if($userRole==3)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.orderRequests') }}">Order Requests</a>
                            </li>


                            @endif
                        @if($userRole==2 || $userRole==3)
                            <li class="nav-item">
                                <a href="{{ route('home.Audit') }}" class="nav-link">Payments</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('ratingNfeedback') }}" class="nav-link">Rating & Feedback</a>
                            </li>

                        @endif
                        @if($userRole==2)
                        <li class="nav-item">
                            <a href="{{ route('home.vendor.orders') }}" class="nav-link">Orders</a>
                        </li>
                        @endif
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="dropdown07" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">Registration</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown07">
                                        <a class="dropdown-item" href="{{ route('c_register') }}">Customer</a>
                                        <a class="dropdown-item" href="{{ route('v_register') }}">Vendor</a>
                                    </div>
                                </li>


                                {{--<li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>--}}
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
@include('alert-message')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="">
        <p><i><center>All rights reserved copyright &copy 2019 Designed and Developed by TechSparse</center></i></p>
    </footer>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        function ExportPDF() {
            html2canvas(document.getElementById('TBL'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Details.pdf");
                }
            });
        }
    </script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    {{--    <script src="http://127.0.0.1:8000/js/table2excel.js" type="text/javascript"></script>--}}
    <script type="text/javascript">
        function ExportExcel(tableID="TBL", filename = 'Customer'){
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename?filename+'.xlsx':'excel_data.xlsx';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if(navigator.msSaveOrOpenBlob){
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }
    </script>
</body>
</html>
