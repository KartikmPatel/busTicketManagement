@extends('Layouts.main')

@section('main-content')

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <title> </title>
    </head>
    <div class="ml-4 mt-3">
        <h2> {{ $bus->busNo }} Seats </h2>

        <div>
            @foreach ($busSeats as $seat)
                @for ($i = 1; $i <= $bus->size; $i++)
                    @if ($i == $seat->seatNo)
                        <div class="text-danger">{{ $i }}</div>
                        @continue
                    @endif
                    <div class="text-dark">{{ $i }}</div>
                @endfor
            @endforeach
        </div>
    </div>
@endsection
