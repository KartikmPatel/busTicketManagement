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
                    <h2>Welcome to our Website</h2>
                    <p>this is a about-us</p>
                    <button class="cta-button">Learn More</button>
                </div>
                <div class="hero-image">
                    <img src="about.jpg" id="ig">
                </div>
            </div>
        </section>
        
    </body>
</html>
@endsection