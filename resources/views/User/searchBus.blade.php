@extends('Layouts.main')

@section('Usermain-content')
<head>
    <title>
        Buses
    </title>
</head>
<body class="bg-white" onload="myFunction()">
    {{-- <div class="row next">
    <i class="fa-solid fa-angle-left" id="n1"></i>
    <span id="date1"></span>
    <i class="fa-solid fa-angle-right" id="n1" onclick="nextDate()"></i>
    </div> --}}
    <div class="viewBus" style="margin-left: 20%">
    <table class="content-table col-md-7">
  <thead>
    <tr>
        <th></th>
        <th> {{__('home.bno')}} </th>
      <th> {{__('home.type')}} </th>
      <th> {{__('home.dTime')}} </th>
      <th> {{__('home.fare')}} </th>
      <th> {{__('home.vSeat')}} <th>
          </tr>
        </thead>
        <tbody>
            @foreach ($routes as $route)
            <tr>
                <td>
                    <img src="./images1/bus13.jpg" width="70px" height="50px" alt=""/>
                    </td>
                    <td class="bno">
                        {{ $route->busNo }}
                    </td>
                    <td class="btype">
                    @foreach ($buses as $bus)
                    @if ($bus->busNo == $route->busNo)
                        {{ $bus->type }}
                        @endif
                        @endforeach
                    </td>
                    <td class="departureTime col-md-3">
                        {{ $route->departureTime }}
                    </td>
                    <td class="fare">
                        {{ $route->fare }}
                    </td>
                    <td class="tdAction">
                        <form action="{{ url('/viewSeat') }}" method="POST">
                            @csrf
                            <input type="hidden" name="rid" id="rid" value="{{$route->routeID}}"/>
                            <input type="hidden" name="from" id="from" value="{{$route->startingStationID}}"/>
                            <input type="hidden" name="to" id="to" value="{{$route->endingStationID}}"/>
                            <input type="hidden" name="date" id="date" value="{{$date}}"/>
                            <input type="hidden" name="time" id="time" value="{{$route->departureTime}}"/>
                            <input type="hidden" name="fare" id="fare" value="{{$route->fare}}"/>

                            <input type="hidden" name="bno" id="bno" value="{{$route->busNo}}"/>
                            <button class='btn btn-warning btn-sm'><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
</table>
    </div>

    <script>
        var date = document.getElementById("date").value;
        document.getElementById("date1").innerHTML = date;
    </script>
</body>
@endsection
