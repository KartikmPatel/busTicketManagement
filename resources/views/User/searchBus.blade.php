@extends('Layouts.main')

@section('Usermain-content')
<body class="bg-white">

    <div class="viewBus">
    <table class="content-table col-md-7">
  <thead>
    <tr>
        <th></th>
      <th> Bus Number </th>
      <th> Type </th>
      <th> Departure Time </th>
      <th> Fare </th>
      <th>viewSeat<th>
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
                            <input type="hidden" name="date" id="date" value="{{$route->date}}"/>
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
