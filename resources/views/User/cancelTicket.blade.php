@extends('Layouts.main')

@section('Usermain-content')

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
</head>
<body class="bg-white" onload="myFunction()">
<div class="mainDiv">
  <div class="cardStyle">
      <img src="images1/bus13.jpg" id="signupLogo"/>

      <h2 class="formTitle">
        Cancel Your Booking
      </h2>

      <span id="empty-error" style="margin-left:70px;font-weight:bold;" class="text-danger"></span>
    <div class="inputDiv">
      <label class="inputLabel" for="ticket">Ticket Id</label>
      <input type="text" id="ticketID" name="ticketID">
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
  function checkValidate()
    {
        var tid = document.getElementById("ticketID");
        if(tid.value.length == "")
        {
            // document.getElementById("all-error").innerHTML="Please fill up the empty field";
            document.getElementById("empty-error").innerHTML="Please enter the Ticket Id";
            document.getElementById("empty-error").style.color="red";
            document.getElementById("empty-error").style.fontSize="15px";
            tid.focus();
        }
        else
        {
            document.getElementById("empty-error").innerHTML="";
            document.getElementById("empty-error").style.color="";
            document.getElementById("empty-error").style.fontSize="";
            storeData();
        }
    }

    function storeData() {
            var ticketID = $('#ticketID').val();

            $.ajax({
                type: 'POST',
                url: "{{ url('ticketCancel') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    ticketID: ticketID
                },
                success: function(data) {
                    // setTimeout(function() {
                    //     location.reload();
                    // },50);

                      if(data == "DoneTicket")
                      {
                        document.getElementById("empty-error").innerHTML = "The booking has been cancelled";
                      }

                      if(data == "notTicket")
                      {
                        document.getElementById("empty-error").innerHTML = "Booking is Not Available";
                      }

                      if(data == "lateTime")
                      {
                        document.getElementById("empty-error").innerHTML = "Sorry, your booking will not be canceled on the day of travel";
                      }
                },
            })
        }
</script>
</body>
@endsection
