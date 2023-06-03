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
                <p>Last Edit: 04/20/2023</p>
                <p>Greetings Users,</p>
                <p>Use this p tag for more paragraph</p>
                <p>this are random paragraph</p>
                <p>Generating random paragraphs can be an excellent way for writers to get their creative flow going at the beginning of the day. The writer has no idea what topic the random paragraph will be about when it appears. This forces the writer to use creativity to complete one of three common writing challenges. The writer can use the paragraph as the first one of a short story and build upon it. A second option is to use the random paragraph somewhere in a short story they create. The third option is to have the random paragraph be the ending paragraph in a short story. No matter which of these challenges is undertaken, the writer is forced to use creativity to incorporate the paragraph into their writing.</p>
                <p>A random paragraph can also be an excellent way for a writer to tackle writers' block. Writing block can often happen due to being stuck with a current project that the writer is trying to complete. By inserting a completely random paragraph from which to begin, it can take down some of the issues that may have been causing the writers' block in the first place.</p>
            </div>
            <h4>I Agree to the <span>Terms of Service</span> and I read the Privacy Notice.</h4>
            <div class="buttons">
                <button class="bton red-btn">Accept</button>
                <button class="bton gray-btn">Decline</button>
            </div>
        </div>
        </div>
    </body>
</html>

@endsection