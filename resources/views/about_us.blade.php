@extends('layouts.app')

@section('content')
<style>
    .cards {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .TitleS {
        color: grey;
        font-size: 18px;
    }

    button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }

    .links {
        text-decoration: none;
        font-size: 22px;
        color: black;
    }

    button:hover,
    .links:hover {
        opacity: 0.7;
    }

    .text-center {
        text-align: center;
    }

    .quote-card {
        background: #fff;
        color: #222222;
        padding: 20px;
        padding-left: 50px;
        box-sizing: border-box;
        box-shadow: 0 2px 4px rgba(34, 34, 34, 0.12);
        position: relative;
        overflow: hidden;
        min-height: 120px;
    }

    .quote-card p {
        font-size: 22px;
        line-height: 1.5;
        margin: 0;
        max-width: 80%;
    }

    .quote-card cite {
        font-size: 16px;
        margin-top: 10px;
        display: block;
        font-weight: 200;
        opacity: 0.8;
    }

    .quote-card:before {
        font-family: Georgia, serif;
        content: "“";
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 5em;
        color: rgba(238, 238, 238, 0.8);
        font-weight: normal;
    }

    .quote-card:after {
        font-family: Georgia, serif;
        content: "”";
        position: absolute;
        bottom: -110px;
        line-height: 100px;
        right: -32px;
        font-size: 25em;
        color: rgba(238, 238, 238, 0.8);
        font-weight: normal;
    }

    @media (max-width: 640px) {
        .quote-card:after {
            font-size: 22em;
            right: -25px;
        }
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mb-3">
            <blockquote class="quote-card" style="background: #d6dde1">
                <p><i>
                        We don't just Sell, though we create connections amoung the Businesses.
                         Our aim is to give you best out of market service with ease,
                         we make your infrastucture delivered and mantained at your doorstep.
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
                    <a class="links" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="links" href="#"><i class="fa fa-linkedin"></i></a>
                    <a class="links" href="#"><i class="fa fa-facebook"></i></a>
                </div>
                <p><button>Contact</button></p>
            </div>

        </div>
        <div class="col-md-9">
            <blockquote class="quote-card">
                <p><i>
                        The enthusiast person of the team always ready to take new challenges.
                        Heightly professional believes in spending productive time.
                        His Love to learning emerging technologies is limitless.
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
                        The man of desired perfection. Always wants things in appropreate manner.
                        Believes in building Team Spirit and holds the team together. Always filled with crazy ideas.
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
                <h3>Hashwardhan Patidar</h3>
                <p class="TitleS">Project Manager, PHP Developer</p>
                <p>Parul University</p>
                <div style="margin: 24px 0;">
                    <a class="links" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="links" href="#"><i class="fa fa-linkedin"></i></a>
                    <a class="links" href="#"><i class="fa fa-facebook"></i></a>
                </div>
                <p><button>Contact</button></p>
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
                    <a class="links" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="links" href="#"><i class="fa fa-linkedin"></i></a>
                    <a class="links" href="#"><i class="fa fa-facebook"></i></a>
                </div>
                <p><button>Contact</button></p>
            </div>

        </div>
        <div class="col-md-9">
            <blockquote class="quote-card">
                <p>
                    <i>
                        The silent observer and deep thinker.
                        A great adviser, his advise is always beneficial and thoughtfull.
                        Spends his time in writing Inspirational Quotes and Loves to Code.
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
                        Its next to imposible to resist his pitch in marketing and sales (Comunications).
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
                <img src="image/edris.jpg" alt="Jobin" style="width:100%">
                <h3>Jobin Joy</h3>
                <p class="TitleS">Chief Marketing Officer, Android Developer</p>
                <p>Parul University</p>
                <div style="margin: 24px 0;">
                    <a class="links" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="links" href="#"><i class="fa fa-linkedin"></i></a>
                    <a class="links" href="#"><i class="fa fa-facebook"></i></a>
                </div>
                <p><button>Contact</button></p>
            </div>

        </div>

    </div>

</div>
<footer class="">
    <p><i><center>All rights reserved copyright &copy 2019 Designed and Developed by TechSparse</center></i></p>
</footer>
@endsection
