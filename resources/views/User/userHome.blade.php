@extends('Layouts.main')

@section('Usermain-content')

<body class="bg-white">
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

<img src="./images1/bus1.jpg" id="image" width="100%" height="600px">
<form action="{{url('searchBus')}}" method="post">
    @csrf
    {{-- <div class="form-group">
      <label for=""></label>
      <input type=""
        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div> --}}
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
</form>
<!-- style="margin-left:auto;margin-right:auto;display:block;" -->
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
