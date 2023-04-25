@extends('Layouts.main')

@section('main-content')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title> Manage Bus </title>
    </head>
        <div class="ml-4 mt-3">
            <h2> Seats </h2>

            <form action="{{ url('searchSeats') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label> Bus Number : </label>
                    <select id="busno" name="busno" class="form-control" >
                        @foreach ($buses as $bus)
                            <option value="{{ $bus->busNo }}">{{ $bus->busNo }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary"> Search
                    </button>
                </div>
            </form>

            {{-- <div class="seats">
                @foreach ($busSeats as $seat)

                @endforeach
            </div> --}}
        </div>

        <script>
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
@endsection
