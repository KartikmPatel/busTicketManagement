@extends('Layouts.main')

@if(session('username') == "Admin")
@section('main-content')
@else
@section('Usermain-content')
@endif
<head>
  <style>
    .mainDiv {
    display: flex;
    min-height: 100%;
    align-items: center;
    justify-content: center;
    background-color: #f9f9f9;
    font-family: 'Open Sans', sans-serif;
}
.cardStyle {
    width: 500px;
    /* height:600px; */
    border-color: white;
    background: #fff;
    padding-top: 0;
    padding-bottom: 36px;
    border-radius: 4px;
    margin: 30px 0;
    box-shadow: 4px 4px 0 0 rgba(0,0,0,0.25);
  }
#signupLogo {
  max-height: 130px;
  width:120px;
  margin: auto;
  display: flex;
  flex-direction: column;
}
.formTitle{
  font-weight: 600;
  margin-top: 10px;
  color: #2F2D3B;
  text-align: center;
}
.inputLabel {
  font-size: 12px;
  color: #555;
  margin-bottom: 6px;
  margin-top: 24px;
}
  .inputDiv {
    width: 70%;
    display: flex;
    flex-direction: column;
    margin: auto;
  }
input {
  height: 40px;
  font-size: 16px;
  border-radius: 4px;
  border: none;
  border: solid 1px #ccc;
  padding: 0 11px;
}
input:disabled {
  cursor: not-allowed;
  border: solid 1px #eee;
}
.buttonWrapper {
  margin-top: 25px;
}
  .submitButton {
    width: 70%;
    height: 40px;
    margin: auto;
    display: block;
    color: #fff;
    background-color: #065492;
    border-color: #065492;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
    box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
  }
.submitButton:disabled,
button[disabled] {
  border: 1px solid #cccccc;
  background-color: #cccccc;
  color: #666666;
}

#loader {
  position: absolute;
  z-index: 1;
  margin: -2px 0 0 10px;
  border: 4px solid #f3f3f3;
  border-radius: 50%;
  border-top: 4px solid #666666;
  width: 14px;
  height: 14px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
  </style>
  <title>
    Change Password
  </title>
</head>
<body class="bg-white" onload="myFunction()">
<div class="mainDiv">
  <div class="cardStyle">
      <img src="images1/password1.jpg" id="signupLogo"/>

      <h2 class="formTitle">
        Change Your Password
      </h2>

      <span id="empty-error" style="margin-left:70px;font-weight:bold;" class="text-danger"></span>
      <!-- <span id="empty-success" style="margin-left:70px;font-weight:bold;" class="text-success"></span> -->
    <div class="inputDiv">
      <label class="inputLabel" for="password">Old Password</label>
      <input type="password" id="oldPassword" name="oldPassword">
    </div>

    <div class="inputDiv">
      <label class="inputLabel" for="confirmPassword">New Password</label>
      <input type="password" id="newPassword" name="newPassword" oninput="validNewPassword()">
      <span id="newPassword-error"></span>
    </div>

    <div class="inputDiv">
      <label class="inputLabel" for="confirmPassword">Confirm New Password</label>
      <input type="password" id="confirmPassword" name="confirmPassword" oninput="validCPassword()">
      <span id="confirmpassword-error"></span>
    </div>

    <div class="buttonWrapper">
      <button type="submit" id="submitButton" onclick="checkValidate()" class="submitButton pure-button pure-button-primary">
        <span>Continue</span>
        <span id="loader"></span>
    </button>
    </div>

  </div>
</div>

<script>
function validNewPassword()
    {
        var newPassword = document.getElementById("newPassword");
        let p = /^\D+[0-9]{4}$/;
        if(!p.test(newPassword.value))
        {
          document.getElementById("newPassword-error").innerHTML="Please Enter Valid Password (patel@4040)";
          document.getElementById("newPassword-error").style.color="red";
          document.getElementById("newPassword-error").style.fontSize="15px";
          newPassword.focus();
          return false;
        }
            else
            {
            document.getElementById("newPassword-error").innerHTML="";
        		document.getElementById("newPassword-error").style.color="";
        		document.getElementById("newPassword-error").style.fontSize="";
            }
            return true;
    }
    function validCPassword()
    {
        var newPassword = document.getElementById("newPassword");
        var cpassword = document.getElementById("confirmPassword");
        if(newPassword.value != cpassword.value)
        {
            document.getElementById("confirmpassword-error").innerHTML="Passwords must be same";
            document.getElementById("confirmpassword-error").style.color="red";
            document.getElementById("confirmpassword-error").style.fontSize="15px";
            cpassword.focus();
            return false;
        }
        else
        {
            document.getElementById("confirmpassword-error").innerHTML="";
            document.getElementById("confirmpassword-error").style.color="";
            document.getElementById("confirmpassword-error").style.fontSize="";
        }
        return true;
    }

    function checkValidate()
    {
        var opassword = document.getElementById("oldPassword");
        var npassword = document.getElementById("newPassword");
        var cpassword = document.getElementById("confirmPassword");
        if(opassword.value.length == "" || npassword.value.length == "" || cpassword.value.length == "")
        {
            // document.getElementById("all-error").innerHTML="Please fill up the empty field";
            document.getElementById("empty-error").innerHTML="Please fill up the empty fields";
            document.getElementById("empty-error").style.color="red";
            document.getElementById("empty-error").style.fontSize="20px";
        }
        else
        {
            document.getElementById("empty-error").innerHTML="";
            document.getElementById("empty-error").style.color="";
            document.getElementById("empty-error").style.fontSize="";
            if(validNewPassword() && validCPassword())
            {
              storeData();
            }
        }
    }

    function storeData() {
            var oldPassword = $('#oldPassword').val();
            var newPassword = $('#newPassword').val();

            $.ajax({
                type: 'POST',
                url: "{{ url('passwordChange') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    oldPassword: oldPassword,
                    newPassword: newPassword,
                },
                success: function(data) {
                    // setTimeout(function() {
                    //     location.reload();
                    // },50);

                    if(data == "passwordError")
                    {
                        // alert('Old Password is Incorrect');
                        document.getElementById("empty-error").innerHTML = "Old Password is Incorrect";
                      }
                      if(data == "passwordDone")
                      {
                        // alert('Your Password has been reset');
                        // document.getElementById("empty-success").innerHTML = "Your Password has been reset";
                        @if(session('username') == "Admin")
                          alert('Your Password has been reset');
                          window.location.replace('/adminHome');
                        @else
                          alert('Your Password has been reset');
                          window.location.replace('/');
                        @endif
                    }
                },
            })
        }
</script>
</body>
@endsection
