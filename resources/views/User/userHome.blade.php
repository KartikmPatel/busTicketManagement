@extends('Layouts.main')

@section('Usermain-content')
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

<div class="content10" id="pre">
    <div class="ball red"></div>
    <div class="ball green"></div>
    <div class="ball yellow"></div>
    <div class="ball blue"></div>
    <div class="ball emerald-green"></div>
    <div class="ball pink"></div>
</div>

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
