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
            <div class="row">
                <div class="service">
                    <i class="fa-solid fa-laptop"></i>
                    <h2>Web Design</h2>
                    <p>1st Paragraph of Web Design</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-laptop"></i>
                    <h2>Marketing</h2>
                    <p>2nd Paragraph of Marketing</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-laptop"></i>
                    <h2>Graphics</h2>
                    <p>3rd Paragraph of Graphics</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-laptop"></i>
                    <h2>Data Analysis</h2>
                    <p>4th Paragraph of Data Analysis</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-laptop"></i>
                    <h2>App Development</h2>
                    <p>5th Paragraph of App Development</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-laptop"></i>
                    <h2>Accounting</h2>
                    <p>6th Paragraph of Accounting</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-laptop"></i>
                    <h2>Payroll</h2>
                    <p>7th Paragraph of Payroll</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-laptop"></i>
                    <h2>Networking</h2>
                    <p>8th Paragraph of Networking</p>
                </div>
            </div>
        </div>

    </body>
</html>
@endsection