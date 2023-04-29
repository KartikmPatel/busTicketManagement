@extends('Layouts.main')

@section('Usermain-content')
<body class="bg-white">
    <table class="table col-md-6 bg-secondary table-hover text-white" id="tblData">
        <thead class="thead-dark">
            <tr>
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
                        <a href="{{ url('/viewSeat') }}/{{ $route->busNo }}" class='btn btn-warning btn-sm'><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection
