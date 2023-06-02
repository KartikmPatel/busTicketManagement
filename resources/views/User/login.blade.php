@extends('Layouts.main')
@section('Usermain-content')
<head>
    <title> Login </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
  <body class="bg-dark" onload="myFunction()">
    <div class="signupSection">
        <div class="info">
          <h2>Globel Travels</h2>
          <i class="fa fa-bus loginIcon" aria-hidden="true"></i>
          <p>The Future Is Here</p>
        </div>
        <div class="loginForm" name="loginform">
          <h2>Login</h2>
          <ul class="noBullet">
            <span class="error"></span>
            <li>
              <label for="username"></label>
              <input type="text" class="inputFields" id="loginu" name="username" placeholder="Username" required/><br>
              <span class="text-danger" id="loginu-error">
            </li>
            <li>
              <label for="password"></label>
              <input type="password" class="inputFields" id="loginp" name="password" placeholder="Password" required/><br>
              <span class="text-danger" id="loginp-error">
            </li>
            <li id="center-btn">
              <button id="join-btn" class="logInbtn" name="join" alt="Join">Login </button>
            </li>
          </ul>
        </div>
      </div>

      <script>
        $('.logInbtn').on('click',function(){
            var loginu = $('#loginu').val();
            var loginp = $('#loginp').val();
            // var size = $('#size').val();
            $('#loginu-error').addClass('d-none');
            $('#loginp-error').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{ url('login') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    loginu: loginu,
                    loginp: loginp
                },
                success: function(data) {
                    // setTimeout(function() {
                    //     location.reload();
                    // },50);

                    if(data == "adminLogin")
                    {
                        window.location.replace('/adminHome');
                    }

                    if(data == "userLogin")
                    {
                        window.location.replace('/');
                    }

                    if(data == "errorLogin")
                    {
                        $('.error').html('Invalid UserName Or Password');
                    }
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    if ($.isEmptyObject(errors) == false) {
                        $.each(errors.errors, function(key, value) {
                            var ErrorID = '#' + key + '-error';
                            $(ErrorID).removeClass('d-none');
                            $(ErrorID).text(value);
                        })
                    }
                }
            })
        })
        </script>
  </body>
@endsection
