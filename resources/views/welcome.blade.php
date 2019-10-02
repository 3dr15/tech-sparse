<!DOCTYPE html>
<html lang="">
    <head>
        <title>About Us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <li class="nav-item">
                            @guest
                                @else
                            @php
                                $userRole=Auth::user()->user_role_id;
                            @endphp
                            @if($userRole==1)<a class="nav-link" href="{{ route('home.admin') }}">{{ __('Admin') }}</a>@endif
                            @if($userRole==2)<a class="nav-link" href="{{ route('home.vendor') }}">{{ __('Vendor') }}</a>@endif
                            @if($userRole==3)<a class="nav-link" href="{{ route('home') }}">{{ __('Customer') }}</a>@endif
                                @endguest
                        </li>
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
                                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07" data-toggle="dropdown"
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
    <style>
        .cards {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); !important;
            max-width: 300px; !important;
            margin: auto; !important;
            text-align: center; !important;
            font-family: arial; !important;
        }

        .TitleS {
            color: grey; !important;
            font-size: 18px; !important;
        }

        button {
            border: none; !important;
            outline: 0; !important;
            display: inline-block; !important;
            padding: 8px; !important;
            color: white; !important;
            background-color: #000; !important;
            text-align: center; !important;
            cursor: pointer; !important;
            width: 100%; !important;
            font-size: 18px; !important;
        }

        .links {
            text-decoration: none; !important;
            font-size: 22px; !important;
            color: black; !important;
        }

        button:hover,
        .links:hover {
            opacity: 0.7; !important;
        }

        .text-center {
            text-align: center; !important;
        }

        .quote-card {
            background: #fff; !important;
            color: #222222; !important;
            padding: 20px; !important;
            padding-left: 50px; !important;
            box-sizing: border-box; !important;
            box-shadow: 0 2px 4px rgba(34, 34, 34, 0.12); !important;
            position: relative; !important;
            overflow: hidden; !important;
            min-height: 120px; !important;
        }

        .quote-card p {
            font-size: 22px; !important;
            line-height: 1.5; !important;
            margin: 0; !important;
            max-width: 80%; !important;
        }

        .quote-card cite {
            font-size: 16px; !important;
            margin-top: 10px; !important;
            display: block; !important;
            font-weight: 200; !important;
            opacity: 0.8; !important;
        }

        .quote-card:before {
            font-family: Georgia, serif; !important;
            content: "“"; !important;
            position: absolute; !important;
            top: 10px; !important;
            left: 10px; !important;
            font-size: 5em; !important;
            color: rgba(238, 238, 238, 0.8); !important;
            font-weight: normal; !important;
        }

        .quote-card:after {
            font-family: Georgia, serif; !important;
            content: "”"; !important;
            position: absolute; !important;
            bottom: -110px; !important;
            line-height: 100px; !important;
            right: -32px; !important;
            font-size: 25em; !important;
            color: rgba(238, 238, 238, 0.8); !important;
            font-weight: normal; !important;
        }

        @media (max-width: 640px) {
            .quote-card:after {
                font-size: 22em; !important;
                right: -25px; !important;
            }
        }
        a, .links-email:hover{
            text-decoration: none;
            color: white;
        }

    </style>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mb-3">
                <blockquote class="quote-card" style="background: #d6dde1">
                    <p><i>
                            We don't just sell, we create connections among Businesses.
                            We aim to give  the best out of market service with ease,
                            Customer satisfaction is our main motto.
                            We suggest what is right for you.
                        </i>
                    </p>

                    <cite>
                        TechSparse Team
                    </cite>
                </blockquote>
            </div>
            <div class="col-md-3">
                <div class="cards">
                    <img src="image/edris.jpg" alt="Edris" style="width:100%">
                    <h3>Edris Chhawniwala</h3>
                    <p class="TitleS">Director of Operation, PHP Developer</p>
                    <p>Parul University</p>
                    <div style="margin: 24px 0;">
                        <a class="links" href="https://twitter.com/edris7861"><i class="fa fa-twitter"></i></a>
                        <a class="links" href="https://in.linkedin.com/in/edris-chhawniwala-836424119"><i class="fa fa-linkedin"></i></a>
                        <a class="links" href="https://www.instagram.com/edris_chhawniwala/?hl=en"><i class="fa fa-instagram"></i></a>
                    </div>
                    <p><button><a class="links-email" href="mailto:edrisitprofessional@gmail.com" >Contact</a></button></p>
                </div>

            </div>
            <div class="col-md-9">
                <blockquote class="quote-card">
                    <p><i>
                            The enthusiastic person of the team always ready to take new challenges.
                            Highly professional, believes in spending productive time.
                            His Love for learning emerging technologies is limitless.
                            Always a helping hand for everyone.
                        </i>
                    </p>

                    <cite>
                        TechSparse Team
                    </cite>
                </blockquote>
            </div>
        </div>
        <div class="row">

            <div class="col-md-9">
                <blockquote class="quote-card">
                    <p>
                        <i>
                            The man of desired perfection. Always want things in appropriate manner.
                            Believes in building team spirit and holds the team together. Always filled with crazy ideas.
                            Likes to experiment with different food combinations.
                        </i>
                    </p>

                    <cite>
                        TechSparse Team
                    </cite>
                </blockquote>
            </div>
            <div class="col-md-3">

                <div class="cards">
                    <img src="image/harsh.jpg" alt="Harsh" style="width:100%">
                    <h3>Hashvardhan Patidar</h3>
                    <p class="TitleS">Project Manager, PHP Developer</p>
                    <p>Parul University</p>
                    <div style="margin: 24px 0;">
                        <a class="links" href="https://twitter.com/hv3patidar"><i class="fa fa-twitter"></i></a>
                        <a class="links" href="https://in.linkedin.com/in/harshvardhan-patidar-a09967166"><i class="fa fa-linkedin"></i></a>
                        <a class="links" href="https://www.instagram.com/devharshpatidar/?hl=en"><i class="fa fa-instagram"></i></a>
                    </div>
                    <p><button><a class="links-email" href="mailto:h3patidar@gmail.com" >Contact</a></button></p>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3">

                <div class="cards">
                    <img src="image/chirag.jpg" alt="Chirag" style="width:100%">
                    <h3>Chirag Dhori</h3>
                    <p class="TitleS">Technical Lead, Android Developer</p>
                    <p>Parul University</p>
                    <div style="margin: 24px 0;">
                        <a class="links" href="https://twitter.com/chirag_7781"><i class="fa fa-twitter"></i></a>
                        <a class="links" href="https://in.linkedin.com/in/chirag-dhori-24aa64175"><i class="fa fa-linkedin"></i></a>
                        <a class="links" href="https://www.instagram.com/chirag_7781/?hl=en"><i class="fa fa-instagram"></i></a>
                    </div>
                    <p><button><a class="links-email" href="mailto:chiragpatel.pc777@gmail.com" >Contact</a></button></p>
                </div>

            </div>
            <div class="col-md-9">
                <blockquote class="quote-card">
                    <p>
                        <i>
                            The silent observer and deep thinker.
                            A great adviser, his advise is always beneficial and thoughtful.
                            Spends his time in writing inspirational quotes and loves to code.
                        </i>
                    </p>

                    <cite>
                        TechSparse Team
                    </cite>
                </blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <blockquote class="quote-card">
                    <p>
                        <i>
                            The sole of the team lies in him. The master planner and day dreamer.
                            Holds a positive aura around him. Calm and compose deals with situations politely.
                            Its next to impossible to resist his pitch in marketing and sales (Communications).
                            Wants to explore the world.
                        </i>
                    </p>

                    <cite>
                        TechSparse Team
                    </cite>
                </blockquote>
            </div>
            <div class="col-md-3">

                <div class="cards">
                    <img src="image/Jobin.png" alt="Jobin" style="width:100%">
                    <h3>Jobin Joy</h3>
                    <p class="TitleS">Chief Marketing Officer, Android Developer</p>
                    <p>Parul University</p>
                    <div style="margin: 24px 0;">
                        <a class="links" href="https://twitter.com/jobinjoy13"><i class="fa fa-twitter"></i></a>
                        <a class="links" href="https://in.linkedin.com/in/jobin-joy-b48190162"><i class="fa fa-linkedin"></i></a>
                        <a class="links" href="https://www.instagram.com/jobinjoy__/?hl=en"><i class="fa fa-instagram"></i></a>
                    </div>
                    <p><button><a class="links-email" href="mailto:jobinjoy1942597@gmail.com" >Contact</a></button></p>
                </div>

            </div>

        </div>

    </div>
    <footer class="">
        <p><i><center>All rights reserved copyright &copy 2019 Designed and Developed by TechSparse</center></i></p>
    </footer>
    </div>
    </body>
</html>
