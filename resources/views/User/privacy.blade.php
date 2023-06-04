@extends('Layouts.main')

@section('Usermain-content')

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <title>Terms Of Service</title> --}}
        <title>Privacy Policy</title>
        <link rel="stylesheet" href="{{asset('layoutstyle/privacy.css')}}">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
    </head>
    <body onload="myFunction()" class="bg-white">
        <div class="co">
        <div class="terms-box">
            <div class="terms-text">
                {{-- <h2>Term Of Service</h2> --}}
                <h2>Privacy Policy</h2>
                <p>Last Edit: 05/06/2023</p>
                <p>Greetings Users,</p>
                <p>GlobalTravels India Private Limited recognizes the importance of privacy of its users and also of maintaining confidentiality of the information provided by its users as a responsible data controller and data processor.</p>
                <p>This Privacy Policy provides for the practices for handling and securing user's Personal Information by GlobalTravels and its subsidiaries and affiliates.</p>
                <p>For the purpose of this Privacy Policy, wherever the context so requires "you" or "your" shall mean User and the term "we", "us", "our" shall mean GlobalTravels. For the purpose of this Privacy Policy, Website means the website(s), mobile site(s) and mobile app(s).</p>
                <p>By using or accessing the Website or other Sales Channels, the User hereby agrees with the terms of this Privacy Policy and the contents herein. If you disagree with this Privacy Policy please do not use or access our Website or other Sales Channels.</p>
            </div>
            <h4>I Agree to the <span>Terms of Service</span> and I read the Privacy Notice.</h4>
            <div class="buttons">
                <a href="{{url('/')}}"><button class="bton red-btn" onclick="policy()">Accept</button></a>
                {{-- <button class="bton gray-btn">Decline</button> --}}
            </div>
        </div>
        </div>
        <script>
            function policy()
            {
                alert("Thanks for supporting");
            }
        </script>
    </body>
</html>

@endsection