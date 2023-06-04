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
                    <p>This is a paragraph</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-bus"></i>
                    <h2>Real-Time Booking</h2>
                    <p>This is a paragraph</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-clock"></i>
                    <h2>24x7 Availibity</h2>
                    <p>This is a paragraph</p>
                </div>
                <div class="service">
                    <i class="fa fa-ticket" aria-hidden="true"></i>
                    <h2>Online Ticket</h2>
                    <p>This is a paragraph</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-shield-halved"></i>
                    <h2>Data Security</h2>
                    <p>This is a paragraph</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-calendar-days"></i>
                    <h2>Advance Booking</h2>
                    <p>This is a paragraph</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-copy"></i>
                    <h2>Booking History</h2>
                    <p>This is a paragraph</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-rectangle-xmark"></i>
                    <h2>Cancellation</h2>
                    <p>This is a paragraph</p>
                </div>
            </div>
        </div>

    </body>
</html>
@endsection