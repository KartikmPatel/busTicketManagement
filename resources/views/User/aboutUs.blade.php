@extends('Layouts.main')

@section('Usermain-content')

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us</title>
        <link rel="stylesheet" href="{{asset('layoutstyle/about.css')}}">
    </head>
    <body onload="myFunction()" class="bg-white">
        <section class="hero">
            <div class="heading">
                <h1>About Us</h1>
            </div>
            <div class="conn">
                <div class="hero-content">
                    <h2>Welcome to our Website</h2><br>
                    <p>GlobalTravels is India’s largest online bus ticketing platform that has transformed bus travel in the country by bringing ease and convenience to millions of Indians who travel using buses. Founded in 2023, GlobalTravels is part of India’s leading online travel company. By providing widest choice, superior customer service, lowest prices and unmatched benefits, GlobalTravels has served many customers. GlobalTravels has a global presence with operations across India.</p>
                    <button class="cta-button" id="bt">Learn More</button>
                </div>
                <div class="hero-image">
                    <img src="images1/about.jpg" id="ig">
                </div>
            </div>
        </section>
        <section class="hero" id="about">
            <div class="conn">
                <div class="hero-content">
                    <div class="tg">
                        <p>Our bus reservation system is a mobile or web software solution designed to provide customers with a personalized easy-to-utilize user experience for booking and purchasing tickets online. It stores customers personal data records, scheduled routes, frequent trips, drop points, and other information.</p>
                    </div>
                    {{-- <p>GlobalTravels is India’s largest online bus ticketing platform that has transformed bus travel in the country by bringing ease and convenience to millions of Indians who travel using buses. Founded in 2023, GlobalTravels is part of India’s leading online travel company. By providing widest choice, superior customer service, lowest prices and unmatched benefits, GlobalTravels has served many customers. GlobalTravels has a global presence with operations across India.</p> --}}
                </div>
                <div class="hero-image">
                    <img src="images1/about2.jpg" id="ig">
                </div>
            </div>
        </section>
        <script>
            $(document).ready(function(){
                $("#about").hide();
            })
            $(document).ready(function(){
                $("#bt").click(function(){
                    $("#about").toggle();
                })
            })
        </script>        
    </body>
</html>
@endsection