@extends('Layouts.main')

@section('Usermain-content')
<body class="bg-white" onload="myFunction()">
    <div class="viewBus">
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
</body>
@endsection
