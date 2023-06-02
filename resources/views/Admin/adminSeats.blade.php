@extends('Layouts.main')

@section('main-content')

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <title> Manage Bus </title>
    </head>
    <body onload="myFunction()">
        
    <div class="ml-4 mt-3">
        <h2> Seats </h2>

        <form action="{{ url('searchSeats') }}" method="POST">
            @csrf
            <label> Bus Number : </label>
            <div class="form-group">
                <select id="busno" name="busno" class="form-control col-md-4">
                    @foreach ($buses as $bus)
                        <option value="{{ $bus->busNo }}">{{ $bus->busNo }}</option>
                    @endforeach
                </select>


                <label> Date : </label>
                <input type="date" class="form-control col-md-4 mb-2" name="date" id="date">

                <button type="submit" class="btn btn-primary ml-1"> Search
                </button>
            </div>
        </form>

        {{-- <div class="seats">
                @foreach ($busSeats as $seat)

                @endforeach
            </div> --}}
    </div>

    <script>
        $(document).ready(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10) {
                month = '0' + month.toString();
            }
            if (day < 10) {
                day = '0' + day.toString();
            }

            var maxDate = year + '-' + month + '-' + day;

            $('#date').attr('min', maxDate);
        })
        // function search()
        // {
        //     var busno = $('#busno').val();


        //     $.ajax({
        //         type:'POST',
        //         url:"{{ url('searchSeats') }}",
        //         data: {
        //             _token: '{{ csrf_token() }}',
        //             busno: busno
        //         },
        //         success : function(data)
        //         {

        //         }
        //     })
        // }
    </script>
    </body>
@endsection
