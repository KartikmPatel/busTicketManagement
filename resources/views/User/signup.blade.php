@extends('Layouts.main')
@section('Usermain-content')
<head>
    <title> SignUp </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
  <body class="bg-dark" onload="myFunction()">
    <div class="signupSection">
        <div class="info">
          <h2>Globel Travels</h2>
          <i class="fa fa-bus loginIcon" aria-hidden="true"></i>
          <p>The Future Is Here</p>
        </div>
        <div class="signupForm" name="signupform">
          <h2>SignUp</h2>
          <span class="text-danger" id="allsign-error">
          <ul class="noBullet">
            <li>
              <label for="username"></label>
              <input type="text" class="inputFields" id="signu" name="username" placeholder="Username" oninput="validsignu()" Required/><br>
              <span class="text-danger" id="signu-error">
            </li>
            <li>
              <label for="password"></label>
              <input type="password" class="inputFields" id="signp" name="password" placeholder="Password" oninput="validsignp()"><br>
              <span class="text-danger" id="signp-error">
            </li>
            <li>
              <label for="cpassword"></label>
              <input type="password" class="inputFields" id="signcp" name="password" placeholder="Confirm Password" oninput="validsigncp()"><br>
              <span class="text-danger" id="signcp-error">
            </li>
            <li id="center-btn">
              <button type="submit" id="join-btn" class="signUpbtn" name="join" alt="Join" onclick="checkValidate1()"> SignUp </button>
            </li>
          </ul>
        </div>
      </div>

      <script>
         function validsignu()
    {
        var username = document.getElementById("signu");
            let p = /^\D+$/;
            if(!p.test(username.value))
            {
                // document.getElementById("username-error").innerHTML="Please Enter Only character";
                document.getElementById("signu-error").innerHTML="{{__('home.usernameError')}}";
        		document.getElementById("signu-error").style.color="red";
        		document.getElementById("signu-error").style.fontSize="15px";
        		username.focus();
        		return false;
            }
            else
            {
                document.getElementById("signu-error").innerHTML="";
        		document.getElementById("signu-error").style.color="";
        		document.getElementById("signu-error").style.fontSize="";
            }
            return true;
    }
    function validsignp()
    {
        var password = document.getElementById("signp");
            let p = /^\D+[0-9]{4}$/;
            if(!p.test(password.value))
            {
                // document.getElementById("password-error").innerHTML="Please Enter Valid Password (patel@4040)";
            document.getElementById("signp-error").innerHTML="{{__('home.passwordError')}}";
        		document.getElementById("signp-error").style.color="red";
        		document.getElementById("signp-error").style.fontSize="15px";
        		password.focus();
        		return false;
            }
            else
            {
                document.getElementById("signp-error").innerHTML="";
        		document.getElementById("signp-error").style.color="";
        		document.getElementById("signp-error").style.fontSize="";
            }
            return true;
    }
    function validsigncp()
    {
        var password = document.getElementById("signp");
        var cpassword = document.getElementById("signcp");
        if(password.value != cpassword.value)
        {

            // document.getElementById("cpassword-error").innerHTML="Passwords Must be Same";
            document.getElementById("signcp-error").innerHTML="{{__('home.cpasswordError')}}";
            document.getElementById("signcp-error").style.color="red";
            document.getElementById("signcp-error").style.fontSize="15px";
            return false;
        }
        else
        {
            document.getElementById("signcp-error").innerHTML="";
            document.getElementById("signcp-error").style.color="";
            document.getElementById("signcp-error").style.fontSize="";
        }
            return true;
    }
    function checkValidate1()
        {
        //   var username = document.getElementById("signu");
        //   var password = document.getElementById("signp");
        //   var cpassword = document.getElementById("signcp");
        // if(username.value.length == "" || password.value.length == "" || cpassword.value.length == "")
        // {
        //     // document.getElementById("all-error").innerHTML="Please fill up the empty field";
        //     document.getElementById("allsign-error").innerHTML="{{__('home.allError')}}";
        //     document.getElementById("allsign-error").style.color="red";
        //     document.getElementById("allsign-error").style.fontSize="15px";
        // }
        // else
        // {
        //     document.getElementById("allsign-error").innerHTML="";
        //     document.getElementById("allsign-error").style.color="";
        //     document.getElementById("allsign-error").style.fontSize="";
            if(validsignu() && validsignp() && validsigncp())
            {
                storedata()
            }
        // }
    }
         function storedata(){
            var signu = $('#signu').val();
            var signp = $('#signp').val();
            // var size = $('#size').val();
            var signcp = $('#signcp').val();
            // $('#signu-error').addClass('d-none');
            // $('#signp-error').addClass('d-none');
            // $('#signcp-error').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{ url('signUp') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    signu: signu,
                    signp: signp,
                    // size: size,
                    signcp: signcp
                },
                success: function(data) {
                    // setTimeout(function() {
                    //     location.reload();
                    // },50);

                    if(data == "signupError")
                    {
                        alert('Username or Password already Exits!');
                    }

                    if(data == "signupDone")
                    {
                        window.location.replace('/loginView');
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
        }
        </script>
  </body>
@endsection
