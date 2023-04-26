@extends('Layouts.main')

@section('main-content')

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <title> </title>
    </head>
    <div class="ml-4 mt-3">
        <h2> {{ $bus->busNo }} Seats </h2>
        
        <div>
            $j;
            <!-- in_array ( $value, $array_name ,$mode ) -->
            @for ($i = 1; $i <= $bus->size; $i++)
            $j = false;
        @foreach($busSeats as $seat)
            @if($i == $seat->seatNo)
            <div class="text-danger">{{ $i }}</div>
            $j = true;
            @endif
        @endforeach
        @if($j == false)
            <div class="text-dark">{{ $i }}</div>
        @endif
        @endfor

        </div>
    </div>
@endsection
