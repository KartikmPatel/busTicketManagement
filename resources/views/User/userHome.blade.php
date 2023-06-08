@extends('Layouts.main')

@section('Usermain-content')
<head>
    <title>
        Home
    </title>
    <style>
	  
        #event img{
        transition: 0.7s;
        }
        #event img:hover{
        transform: scale(1.1);
        cursor: pointer;
        }
        
      h6:hover{
      font-size: 25px !important;
      }
  
      /*.navbars{
          transition: 1s;
      } 
      .navbars.scroll{
           background: #3498db;
       }*/
      </style>
      <link rel="stylesheet" href="{{asset('layoutstyle/galary.css')}}">
</head>
<body class="bg-white" onload="myFunction()">
    {{-- @if (Session()->has('success'))
         <div class="alert alert-success alert-dismissible successAlert" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session()->get('success') }}
        </div>
    @endif --}}
{{-- <script>
    let a1=new Array("bus1.jpg","bus3.jpg","bus2.jpg","bus4.jpg");
            var c=0;
            setInterval(click1,2000);
            image.src="images1/"+a1[c];
		function click1()
		{
             c++;
             if(c==a1.length)
             c=0;
              image.src="images1/"+a1[c];
		}
</script> --}}

{{-- <img src="./images1/bus1.jpg" id="image" width="100%" height="600px">
<form action="{{url('searchBus')}}" method="post">
    @csrf
    <div class="form-group">
        <label> From : </label>
        <select id="from" name="from" class="form-control col-md-6">
            <option value="">--Select Station--</option>
            @foreach ($stations as $station)
                <option value="{{ $station->stationID }}">{{ $station->stationName }}</option>
            @endforeach
        </select>
        <span class="text-danger" id="from-error">
        </span><br>
        <label> To : </label>
        <select id="to" name="to" class="form-control col-md-6">
            <option value="">--Select Station--</option>
            @foreach ($stations as $station)
                <option value="{{ $station->stationID }}">{{ $station->stationName }}</option>
            @endforeach
        </select>
        <span class="text-danger" id="to-error">
        </span><br>
            <label> Date : </label>
            <input type="date" class="form-control col-md-5" name="date" id="date">
            <span class="text-danger" id="date-error">
            </span><br>
            <button type="submit" class="btn btn-success mt-1" > Search </button>
    </div>
</form> --}}
<!-- style="margin-left:auto;margin-right:auto;display:block;" -->



<div class="containerSearch">
    <img src="./images1/bus1.jpg" id="image" class="slideshow">
    <div class="form-content">
        <form action="{{url('searchBus')}}" method="post" onsubmit="return validateSearch()">
            @csrf
            <div class="form-group">
                <h1 class="ml-5"> {{__('home.sBus')}} </h1>
                <span class="text-danger ml-5" id="same-error">
        </span><br>
                <label class="ml-5"> {{__('home.from')}} : </label>
                <select id="from" name="from" class="form-control col-md-9 ml-5" oninput="validateStartStation()">
                    <option value="">{{__('home.selectstation')}}</option>
                    @foreach ($stations as $station)
                        <option value="{{ $station->stationID }}">{{ $station->stationName }}</option>
                    @endforeach
                </select>
                <span class="pl-5" id="from-error">
                </span><br>

                <i class="fa-solid fa-retweet bg-dark" style="margin-left:45%;cursor:pointer;font-size:20px;border:3px solid black;border-radius:20%;background-color:black;color:#ffffff;" onclick="swipeStation()"></i><br>

                <label class="ml-5"> {{__('home.to')}} : </label>
                <select id="to" name="to" class="form-control col-md-9 ml-5" oninput="validateEndStation()">
                    <option value="">{{__('home.selectstation')}}</option>
                    @foreach ($stations as $station)
                        <option value="{{ $station->stationID }}">{{ $station->stationName }}</option>
                    @endforeach
                </select>
                <span class="pl-5" id="to-error">
                </span><br>
                    <label class="ml-5"> {{__('home.date')}} : </label>
                    <input type="date" class="form-control col-md-9 ml-5" name="date" id="date" oninput="validateDate()">
                    <span class="pl-5" id="date-error">
                    </span><br>
                    <button type="submit" class="btn btn-warning mt-1 ml-5 col-md-9" onclick="validateSearch()"> {{__('home.search')}} </button>
            </div>
        </form>
    </div>
  </div>
  <div class="row">
    <div class="offset-sm-1 col-sm-4"  id="event" style="margin-top: 50px; margin-left: 160px">
        <img src="images1/about.jpg" class="img-fluid"  alt="">
        <div class="event-content">
            <h4 style="font-weight: bold;font-style: italic;font-size: 25px;margin-bottom: 5px;">Wadding Event</h4>
            <span style="font-style: italic;font-size: 20px;">
                Love Event
            </span><br>
            <a href="wedding.php" style="text-decoration: none;font-weight: bold;text-transform: uppercase;margin-top: 10px;">Join</a>
        </div>
        </div>
    
        <div class="offset-sm-1 col-sm-4"  id="event" style="margin-top: 50px">
            <img src="images1/contact.jpg" class="img-fluid"  alt="">
            <div class="event-content">
                <h4 style="font-weight: bold;font-style: italic;font-size: 25px;margin-bottom: 5px;">Wadding Event</h4>
                <span style="font-style: italic;font-size: 20px;">
                    Love Event
                </span><br>
                <a href="wedding.php" style="text-decoration: none;font-weight: bold;text-transform: uppercase;margin-top: 10px;">Join</a>
            </div>
            </div>
  </div>

  <div class="row" style="margin-bottom: -100px">
    <div class="offset-sm-1 col-sm-4"  id="event" style="margin-top: 70px; margin-left: 160px">
        <img src="images1/feedback.jpg" class="img-fluid"  alt="">
        <div class="event-content">
            <h4 style="font-weight: bold;font-style: italic;font-size: 25px;margin-bottom: 5px;">Wadding Event</h4>
            <span style="font-style: italic;font-size: 20px;">
                Love Event
            </span><br>
            <a href="wedding.php" style="text-decoration: none;font-weight: bold;text-transform: uppercase;margin-top: 10px;">Join</a>
        </div>
        </div>
    
        <div class="offset-sm-1 col-sm-4"  id="event" style="margin-top: 70px;">
            <img src="images1/privacy.jpg" class="img-fluid"  alt="">
            <div class="event-content">
                <h4 style="font-weight: bold;font-style: italic;font-size: 25px;margin-bottom: 5px;">Wadding Event</h4>
                <span style="font-style: italic;font-size: 20px;">
                    Love Event
                </span><br>
                <a href="wedding.php" style="text-decoration: none;font-weight: bold;text-transform: uppercase;margin-top: 10px;">Join</a>
            </div>
            </div>
  </div>
<script>

    $(document).ready(function(){
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();

        if(month < 10)
        {
            month = '0' + month.toString();
        }
        if(day < 10)
        {
            day = '0'+day.toString();
        }

        var maxDate = year + '-' + month + '-' + day;

        $('#date').attr('min',maxDate);
    })

    let a1=new Array("bus13.jpg","bus15.jpg","bus14.jpg","bus12.jpg");
            var c=0;
            setInterval(click1,2000);
            image.src="images1/"+a1[c];
		function click1()
		{
             c++;
             if(c==a1.length)
             c=0;
              image.src="images1/"+a1[c];
		}

        function validateStartStation()
        {
            var from = document.getElementById("from");
            if(from.value.length == "")
            {
                document.getElementById("from-error").innerHTML="{{__('home.st1Error')}}";
        		document.getElementById("from-error").style.color="red";
        		document.getElementById("from-error").style.fontSize="15px";
        		from.focus();
        		return false;
            }
            else
            {
                document.getElementById("from-error").innerHTML="";
        		document.getElementById("from-error").style.color="";
        		document.getElementById("from-error").style.fontSize="";
            }
            return true;
        }
        function validateEndStation()
        {
            var to = document.getElementById("to");
            if(to.value.length == "")
            {
                document.getElementById("to-error").innerHTML="{{__('home.st2Error')}}";
        		document.getElementById("to-error").style.color="red";
        		document.getElementById("to-error").style.fontSize="15px";
        		to.focus();
        		return false;
            }
            else
            {
                document.getElementById("to-error").innerHTML="";
        		document.getElementById("to-error").style.color="";
        		document.getElementById("to-error").style.fontSize="";
            }
            return true;
        }
        function validateDate()
        {
            var date = document.getElementById("date");
            if(date.value.length == "")
            {
                document.getElementById("date-error").innerHTML="{{__('home.dateError')}}";
        		document.getElementById("date-error").style.color="red";
        		document.getElementById("date-error").style.fontSize="15px";
        		date.focus();
        		return false;
            }
            else
            {
                document.getElementById("date-error").innerHTML="";
        		document.getElementById("date-error").style.color="";
        		document.getElementById("date-error").style.fontSize="";
            }
            return true;
        }

        function swipeStation()
        {
            var value1 = $('#from').val();
            var value2 = $('#to').val();

            $('#from').val(value2);
            $('#to').val(value1);
        }

        function sameCity()
        {
            var from = document.getElementById("from");
            var to = document.getElementById("to");
            if(from.value == to.value)
            {
                document.getElementById("same-error").innerHTML="Playas enter source and destination different";
        		document.getElementById("same-error").style.color="red";
        		document.getElementById("same-error").style.fontSize="15px";
                return false;
            }
            else
            {
                document.getElementById("same-error").innerHTML="";
        		document.getElementById("same-error").style.color="";
        		document.getElementById("same-error").style.fontSize="";
                return true;
            }
        }

        function validateSearch()
        {
            if(validateStartStation() && validateEndStation() && validateDate() && sameCity())
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        // function checkValidate()
        // {
        //     var from = document.getElementById("from");
        //     var to = document.getElementById("to");
        //     var date = document.getElementById("date");
        //     // var size = document.getElementById("size");
        //     if(from.value.length == "" || to.value.length == "" || date.value.length == "")
        //     {
        //         document.getElementById("all-error").innerHTML="Please fill up the empty field";
        // 		document.getElementById("all-error").style.color="red";
        // 		document.getElementById("all-error").style.fontSize="15px";
        //         return false;
        //     }
        //     else{
        //         document.getElementById("all-error").innerHTML="";
        // 		document.getElementById("all-error").style.color="";
        // 		document.getElementById("all-error").style.fontSize="";
        //     }
        //     return true;
        // }

    // function searchBus() {
    //     var from = $('#from').val();
    //     var to = $('#to').val();
    //     var date = $('#date').val();

    //     $('#from-error').addClass('d-none');
    //     $('#to-error').addClass('d-none');
    //     $('#date-error').addClass('d-none');

    //         $.ajax({
    //             type: 'POST',
    //             url: "{{ url('searchBus') }}",
    //             data: {
    //                 _token: '{{ csrf_token() }}',
    //                 from: from,
    //                 to: to,
    //                 date: date
    //             },
    //             success: function(data) {
    //                 // setTimeout(function() {
    //                 //     location.reload();
    //                 // },50);
    //                 // if(data.error == "dateError")
    //                 // {
    //                 //     $('.alert').text("Do not Take Same Date For Single Bus")
    //                 // }
    //             },
    //             error: function(data) {
    //                 var errors = data.responseJSON;
    //                 if ($.isEmptyObject(errors) == false) {
    //                     $.each(errors.errors, function(key, value) {
    //                         var ErrorID = '#' + key + '-error';
    //                         $(ErrorID).removeClass('d-none');
    //                         $(ErrorID).text(value);
    //                     })
    //                 }
    //             }
    //         })
    //     }
</script>
</body>
@endsection
