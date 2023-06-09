@extends('Layouts.main')

@section('Usermain-content')

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <title>Terms Of Service</title> --}}
        <title>Our Service</title>
        <link rel="stylesheet" href="{{asset('layoutstyle/service.css')}}">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
    </head>
    <body onload="myFunction()" class="bg-white">
        <div class="serve">
            <h1>Our Services</h1>
            <div class="row" id="rw">
                <div class="service">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <h2>User Freindly</h2>
                    <p>The quality of being <br>easy for people who are <br>not experts to understand.</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-bus"></i>
                    <h2>Real-Time Booking</h2>
                    <p>Allow them to see your<br> availability at any time of<br> the day or night they decide<br> to visit your website.</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-clock"></i>
                    <h2>24x7 Availibity</h2>
                    <p>Service that is available at<br> any time and usually, every day.</p>
                </div>
                <div class="service">
                    <i class="fa fa-ticket" aria-hidden="true"></i>
                    <h2>Online Ticket</h2>
                    <p>A paperless electronic document<br> used for ticketing purposes</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-shield-halved"></i>
                    <h2>Data Security</h2>
                    <p>Protection from, or resilience<br> against, potential harm</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-calendar-days"></i>
                    <h2>Advance Booking</h2>
                    <p>A booking made before<br> you arrive at a Bus Station.</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-copy"></i>
                    <h2>Booking History</h2>
                    <p>It stores the user's booking history</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-rectangle-xmark"></i>
                    <h2>Cancellation</h2>
                    <p>User can cancel their booking<br> at any time from any where.</p>
                </div>
            </div>
        </div>

    </body>
</html>
@endsection
