@extends('Layouts.main')

@section('Usermain-content')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title> Seats </title>
</head>
<body class="bg-white" onload="myFunction()">
<div class="ml-4 mt-3">
    {{-- <h2> {{ $bus->busNo }} Seats </h2> --}}

    {{-- <div>
        <!-- in_array ( $value, $array_name ,$mode ) -->
        @for ($i = 1; $i <= $bus->size; $i++)
        {{$j = false}}
    @foreach ($busSeats as $seat)
        @if ($i == $seat->seatNo)
        <div class="text-danger">{{ $i }}</div>
        {{$j = true}}
        @endif
        @endforeach
        @if ($j == false)
            <div class="text-dark">{{ $i }}</div>
        @endif
    @endfor

    </div> --}}

    @if($bus->type == "Seater")
    @php
        $j = false;
    @endphp

    <div class="theatre mt-5">
        <a class="btn btn-outline-dark ml-3" href="{{url('/')}}"><i class="ml-1 fa fa-arrow-left backarraow text-danger"></i></a>
        <div class="screen-side">
            {{-- <div class="screen">Screen</div> --}}
            <h3 class="select-text">{{ $bus->busNo }}</h3>
        </div>
        <div class="exit exit--front">
        </div>
        <ol class="cabin">
            <li class="row row--1">
                <ol class="seats" type="A">
                    @foreach ($busSeats as $seat)
                        @if (1 == $seat->seatNo)
                            <li class="seat">
                                <input type="checkbox" disabled id="1" />
                                <label for="1">1</label>
                            </li>
                            @php
                                $j = true;
                            @endphp
                        @break

                    @else
                        @php
                            $j = false;
                        @endphp
                    @endif
                @endforeach
                @if ($j == false)
                    <li class="seat">
                        <input type="checkbox" name="Seaterseat" value="1" id="1" />
                        <label for="1">1</label>
                    </li>
                @endif
                @foreach ($busSeats as $seat)
                    @if (2 == $seat->seatNo)
                        <li class="seat">
                            <input type="checkbox" disabled id="2" />
                            <label for="2">2</label>
                        </li>
                        @php
                            $j = true;
                        @endphp
                    @break

                @else
                    @php
                        $j = false;
                    @endphp
                @endif
            @endforeach
            @if ($j == false)
                <li class="seat">
                    <input type="checkbox" name="Seaterseat" value="2" id="2" />
                    <label for="2">2</label>
                </li>
            @endif
            @foreach ($busSeats as $seat)
                @if (3 == $seat->seatNo)
                    <li class="seat">
                        <input type="checkbox" disabled id="3" />
                        <label for="3">3</label>
                    </li>
                    @php
                        $j = true;
                    @endphp
                @break

            @else
                @php
                    $j = false;
                @endphp
            @endif
        @endforeach
        @if ($j == false)
            <li class="seat">
                <input type="checkbox" name="Seaterseat" value="3" id="3" />
                <label for="3">3</label>
            </li>
        @endif
        @foreach ($busSeats as $seat)
            @if (4 == $seat->seatNo)
                <li class="seat">
                    <input type="checkbox" disabled id="4" />
                    <label for="4">4</label>
                </li>
                @php
                    $j = true;
                @endphp
                @break

            @else
                @php
                    $j = false;
                @endphp
            @endif
        @endforeach
        @if ($j == false)
            <li class="seat">
                <input type="checkbox" name="Seaterseat" value="4" id="4" />
                <label for="4">4</label>
            </li>
        @endif
        @foreach ($busSeats as $seat)
            @if (5 == $seat->seatNo)
                <li class="seat">
                    <input type="checkbox" disabled id="5" />
                    <label for="5">5</label>
                </li>
                @php
                    $j = true;
                @endphp
            @break

        @else
            @php
                $j = false;
            @endphp
        @endif
    @endforeach
    @if ($j == false)
        <li class="seat">
            <input type="checkbox" name="Seaterseat" value="5" id="5" />
            <label for="5">5</label>
        </li>
    @endif
    @foreach ($busSeats as $seat)
        @if (6 == $seat->seatNo)
            <li class="seat">
                <input type="checkbox" disabled id="6" />
                <label for="6">6</label>
            </li>
            @php
                $j = true;
            @endphp
        @break

    @else
        @php
            $j = false;
        @endphp
    @endif
@endforeach
@if ($j == false)
    <li class="seat">
        <input type="checkbox" name="Seaterseat" value="6" id="6" />
        <label for="6">6</label>
    </li>
@endif
</ol>
</li>
<li class="row row--2">
<ol class="seats" type="A">
@foreach ($busSeats as $seat)
    @if (7 == $seat->seatNo)
        <li class="seat">
            <input type="checkbox" disabled id="7" />
            <label for="7">7</label>
        </li>
        @php
            $j = true;
        @endphp
    @break

@else
    @php
        $j = false;
    @endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
    <input type="checkbox" name="Seaterseat" value="7" id="7" />
    <label for="7">7</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (8 == $seat->seatNo)
    <li class="seat">
        <input type="checkbox" disabled id="8" />
        <label for="8">8</label>
    </li>
    @php
        $j = true;
    @endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="8" id="8" />
<label for="8">8</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (9 == $seat->seatNo)
<li class="seat">
    <input type="checkbox" disabled id="9" />
    <label for="9">9</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="9" id="9" />
<label for="9">9</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (10 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="10" />
<label for="10">10</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="10" id="10" />
<label for="10">10</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (11 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="11" />
<label for="11">11</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="11" id="11" />
<label for="11">11</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (12 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="12" />
<label for="12">12</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="12" id="12" />
<label for="12">12</label>
</li>
@endif
</ol>
</li>
<li class="row row--3">
<ol class="seats" type="A">
@foreach ($busSeats as $seat)
@if (13 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="13" />
<label for="13">13</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="13" id="13" />
<label for="13">13</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (14 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="14" />
<label for="14">14</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="14" id="14" />
<label for="14">14</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (15 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="15" />
<label for="15">15</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="15" id="15" />
<label for="15">15</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (16 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="16" />
<label for="16">16</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="16" id="16" />
<label for="16">16</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (17 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="17" />
<label for="17">17</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="17" id="17" />
<label for="17">17</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (18 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="18" />
<label for="18">18</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="18" id="18" />
<label for="18">18</label>
</li>
@endif
</ol>
</li>
<li class="row row--4">
<ol class="seats" type="A">
@foreach ($busSeats as $seat)
@if (19 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="19" />
<label for="19">19</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="19" id="19" />
<label for="19">19</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (20 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="20" />
<label for="20">20</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="20" id="20" />
<label for="20">20</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (21 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="21" />
<label for="21">21</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="21" id="21" />
<label for="21">21</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (22 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="22" />
<label for="22">22</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="22" id="22" />
<label for="22">22</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (23 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="23" />
<label for="23">23</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="23" id="23" />
<label for="23">23</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (24 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="24" />
<label for="24">24</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="24" id="24" />
<label for="24">24</label>
</li>
@endif
</ol>
</li>

<li class="row row--4">
<ol class="seats" type="A">
@foreach ($busSeats as $seat)
@if (25 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="25" />
<label for="25">25</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="25" id="25" />
<label for="25">25</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (26 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="26" />
<label for="26">26</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="26" id="26" />
<label for="26">26</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (27 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="27" />
<label for="27">27</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="27" id="27" />
<label for="27">27</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (28 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="28" />
<label for="28">28</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="28" id="28" />
<label for="28">28</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (29 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="29" />
<label for="29">29</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="29" id="29" />
<label for="29">29</label>
</li>
@endif
@foreach ($busSeats as $seat)
@if (30 == $seat->seatNo)
<li class="seat">
<input type="checkbox" disabled id="30" />
<label for="30">30</label>
</li>
@php
    $j = true;
@endphp
@break

@else
@php
    $j = false;
@endphp
@endif
@endforeach
@if ($j == false)
<li class="seat">
<input type="checkbox" name="Seaterseat" value="30" id="30"/>
<label for="30">30</label>
</li>
@endif
</ol>
</li>
</ol>

{{-- <div class="exit exit--back"> --}}
{{--
    <form action="{{url('payment')}}" method="post">
        @csrf --}}
    <button type="button" class="btn btn-success ml-3" onclick="display1()" data-toggle="modal" data-target="#modelId">{{__('home.book')}}</button>
    {{-- </form> --}}

</div>
{{-- <button class="btn btn-dark" onclick="display1()">click</button> --}}
<!-- Button trigger modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('home.payment')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('booking')}}" method="post" onsubmit="return validate1()">
                            @csrf
                            @if(session('username'))
                                <label> {{__('home.username')}} :- </label>
                                <input type="text" class="form-control" name="uname" id="uname" readonly value="{{session('username')}}">
                            @else
                                <span class="text-danger">Please First LoggedIn</span><br>
                                <label> {{__('home.username')}} :- </label>
                                <input type="text" class="form-control" name="uname" id="uname" readonly value="{{session('username')}}">
                            @endif

                            <label> {{__('home.sNo')}} :- </label>
                            <input type="text" name="display" id="display" class="form-control" readonly/>
                            <span id="seatError" class="text-danger" style="font-weight:bold;"></span><br>
                            <label> {{__('home.fare')}} :- </label>
                            <input type="text" class="form-control" name="fare" id="fare" readonly value="{{$fare}}">

                            <input type="hidden" name="rid" id="rid" value="{{$rid}}"/>
                            <input type="hidden" name="bno" id="bno" value="{{$bus->busNo}}"/>
                            <input type="hidden" name="from" id="from" value="{{$from}}"/>
                            <input type="hidden" name="to" id="to" value="{{$to}}"/>
                            <input type="hidden" name="date" id="date" value="{{$date}}"/>
                            <input type="hidden" name="time" id="time" value="{{$time}}"/>
                            <input type="hidden" name="fare" id="fare" value="{{$fare}}"/>
                            <input type="hidden" name="count" id="count" />
                            <button type="submit" class="btn btn-success mt-3" onclick="validate1()">{{__('home.payment')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

{{-- <h1 id="display"> </h1> --}}

<script>

    //   $(document).ready(function()
    //   {
    //       $('input').on('change',function(){
    //           $('input').not(this).prop('checked',false);
    //       });
    //   });

      function validate1()
      {
        var seat5 = document.getElementById('display');
        if(seat5.value.length == "")
        {
            document.getElementById("seatError").innerHTML = "Please Select the Seat";
            document.getElementById("seatError").style.fontSize = "15px";
            return false;
        }
        else
        {
            return true;
        }
      }

    function display1()
    {
    var checkboxes = document.getElementsByName('Seaterseat');
    var count = 0;
    var result = "";
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            result += checkboxes[i].value + ",";
            count++;
        }
    }
    document.getElementById('display').value = result;
    document.getElementById('fare').value={{ $fare }} * count;
    document.getElementById('count').value=count;
    }

    </script>

@elseif($bus->type == "Sleeper")
@php
        $j = false;
@endphp

<div class="theatre1 mt-5">
            <a class="btn btn-outline-dark ml-3" href="{{url('/')}}"><i class="ml-1 fa fa-arrow-left backarraow text-danger"></i></a>
            <div class="screen-side">
                {{-- <div class="screen">Screen</div> --}}
                <h3 class="select-text">{{ $bus->busNo }}</h3>
            </div>
            <div class="exit exit--front">
            </div>

            <div class="row">
                <div id="lower">Lower</div>
                <div id="upper">Upper</div>
            </div>

            <ol class="Cabin1">
                <!-- <li class="row row--1">
                    <ol class="seats" type="A"> -->
                        @foreach ($busSeats as $seat)
                            @if (1 == $seat->seatNo)
                                <li class="seat" id="seat1">
                                    <input type="checkbox" disabled id="1" />
                                    <label for="1" id="s1">1</label>
                                </li>
                                @php
                                    $j = true;
                                @endphp
                            @break

                        @else
                            @php
                                $j = false;
                            @endphp
                        @endif
                    @endforeach
                    @if ($j == false)
                        <li class="seat" id="seat1">
                            <input type="checkbox" name="Sleeperseat" value="1" id="1" />
                            <label for="1" id="s1">1</label>
                        </li>
                    @endif
                    @foreach ($busSeats as $seat)
                        @if (2 == $seat->seatNo)
                            <li class="seat" id="seat1">
                                <input type="checkbox" disabled id="2" />
                                <label for="2">2</label>
                            </li>
                            @php
                                $j = true;
                            @endphp
                        @break

                    @else
                        @php
                            $j = false;
                        @endphp
                    @endif
                @endforeach
                @if ($j == false)
                    <li class="seat" id="seat1">
                        <input type="checkbox" name="Sleeperseat" value="2" id="2" />
                        <label for="2" id="s1">2</label>
                    </li>
                @endif
                @foreach ($busSeats as $seat)
                    @if (3 == $seat->seatNo)
                        <li class="seat" id="seat1">
                            <input type="checkbox" disabled id="3" />
                            <label for="3" id="s1">3</label>
                        </li>
                        @php
                            $j = true;
                        @endphp
                    @break

                @else
                    @php
                        $j = false;
                    @endphp
                @endif
            @endforeach
            @if ($j == false)
                <li class="seat" id="seat1">
                    <input type="checkbox" name="Sleeperseat" value="3" id="3" />
                    <label for="3" id="s1">3</label>
                </li>
            @endif
            @foreach ($busSeats as $seat)
                @if (4 == $seat->seatNo)
                    <li class="seat" id="seat1">
                        <input type="checkbox" disabled id="4" />
                        <label for="4" id="s1">4</label>
                    </li>
                    @php
                        $j = true;
                    @endphp
                    @break

                @else
                    @php
                        $j = false;
                    @endphp
                @endif
            @endforeach
            @if ($j == false)
                <li class="seat" id="seat1">
                    <input type="checkbox" name="Sleeperseat" value="4" id="4" />
                    <label for="4" id="s1">4</label>
                </li>
            @endif
            @foreach ($busSeats as $seat)
                @if (5 == $seat->seatNo)
                    <li class="seat" id="seat1">
                        <input type="checkbox" disabled id="5" />
                        <label for="5" id="s1">5</label>
                    </li>
                    @php
                        $j = true;
                    @endphp
                @break

            @else
                @php
                    $j = false;
                @endphp
            @endif
        @endforeach
        @if ($j == false)
            <li class="seat" id="seat1">
                <input type="checkbox" name="Sleeperseat" value="5" id="5" />
                <label for="5" id="s1">5</label>
            </li>
        @endif
    <!-- </ol>
    </li> -->
        </ol>

        <ol class="Cabin2">
                <!-- <li class="row row--1">
                    <ol class="seats" type="A"> -->
                        @foreach ($busSeats as $seat)
                            @if (6 == $seat->seatNo)
                                <li class="seat" id="seat1">
                                    <input type="checkbox" disabled id="6" />
                                    <label for="6" id="s1">6</label>
                                </li>
                                @php
                                    $j = true;
                                @endphp
                            @break

                        @else
                            @php
                                $j = false;
                            @endphp
                        @endif
                    @endforeach
                    @if ($j == false)
                        <li class="seat" id="seat1">
                            <input type="checkbox" name="Sleeperseat" value="6" id="6" />
                            <label for="6" id="s1">6</label>
                        </li>
                    @endif
                    @foreach ($busSeats as $seat)
                        @if (7 == $seat->seatNo)
                            <li class="seat" id="seat1">
                                <input type="checkbox" disabled id="7" />
                                <label for="7" id="s1">7</label>
                            </li>
                            @php
                                $j = true;
                            @endphp
                        @break

                    @else
                        @php
                            $j = false;
                        @endphp
                    @endif
                @endforeach
                @if ($j == false)
                    <li class="seat" id="seat1">
                        <input type="checkbox" name="Sleeperseat" value="7" id="7" />
                        <label for="7" id="s1">7</label>
                    </li>
                @endif
                @foreach ($busSeats as $seat)
                    @if (8 == $seat->seatNo)
                        <li class="seat" id="seat1">
                            <input type="checkbox" disabled id="8" />
                            <label for="8" id="s1">8</label>
                        </li>
                        @php
                            $j = true;
                        @endphp
                    @break

                @else
                    @php
                        $j = false;
                    @endphp
                @endif
            @endforeach
            @if ($j == false)
                <li class="seat" id="seat1">
                    <input type="checkbox" name="Sleeperseat" value="8" id="8" />
                    <label for="8" id="s1">8</label>
                </li>
            @endif
            @foreach ($busSeats as $seat)
                @if (9 == $seat->seatNo)
                    <li class="seat" id="seat1">
                        <input type="checkbox" disabled id="9" />
                        <label for="9" id="s1">9</label>
                    </li>
                    @php
                        $j = true;
                    @endphp
                    @break

                @else
                    @php
                        $j = false;
                    @endphp
                @endif
            @endforeach
            @if ($j == false)
                <li class="seat" id="seat1">
                    <input type="checkbox" name="Sleeperseat" value="9" id="9" />
                    <label for="9" id="s1">9</label>
                </li>
            @endif
            @foreach ($busSeats as $seat)
                @if (10 == $seat->seatNo)
                    <li class="seat" id="seat1">
                        <input type="checkbox" disabled id="10" />
                        <label for="10" id="s1">10</label>
                    </li>
                    @php
                        $j = true;
                    @endphp
                @break

            @else
                @php
                    $j = false;
                @endphp
            @endif
        @endforeach
        @if ($j == false)
            <li class="seat" id="seat1">
                <input type="checkbox" name="Sleeperseat" value="10" id="10" />
                <label for="10" id="s1">10</label>
            </li>
        @endif

    <!-- </ol>
    </li> -->
        </ol>

        <ol class="Cabin3">
                <!-- <li class="row row--1">
                    <ol class="seats" type="A"> -->
                        @foreach ($busSeats as $seat)
                            @if (11 == $seat->seatNo)
                                <li class="seat" id="seat1">
                                    <input type="checkbox" disabled id="11" />
                                    <label for="11" id="s1">11</label>
                                </li>
                                @php
                                    $j = true;
                                @endphp
                            @break

                        @else
                            @php
                                $j = false;
                            @endphp
                        @endif
                    @endforeach
                    @if ($j == false)
                        <li class="seat" id="seat1">
                            <input type="checkbox" name="Sleeperseat" value="11" id="11" />
                            <label for="11" id="s1">11</label>
                        </li>
                    @endif
                    @foreach ($busSeats as $seat)
                        @if (12 == $seat->seatNo)
                            <li class="seat" id="seat1">
                                <input type="checkbox" disabled id="12" />
                                <label for="12">12</label>
                            </li>
                            @php
                                $j = true;
                            @endphp
                        @break

                    @else
                        @php
                            $j = false;
                        @endphp
                    @endif
                @endforeach
                @if ($j == false)
                    <li class="seat" id="seat1">
                        <input type="checkbox" name="Sleeperseat" value="12" id="12" />
                        <label for="12" id="s1">12</label>
                    </li>
                @endif
                @foreach ($busSeats as $seat)
                    @if (13 == $seat->seatNo)
                        <li class="seat" id="seat1">
                            <input type="checkbox" disabled id="13" />
                            <label for="13" id="s1">13</label>
                        </li>
                        @php
                            $j = true;
                        @endphp
                    @break

                @else
                    @php
                        $j = false;
                    @endphp
                @endif
            @endforeach
            @if ($j == false)
                <li class="seat" id="seat1">
                    <input type="checkbox" name="Sleeperseat" value="13" id="13" />
                    <label for="13" id="s1">13</label>
                </li>
            @endif
            @foreach ($busSeats as $seat)
                @if (14 == $seat->seatNo)
                    <li class="seat" id="seat1">
                        <input type="checkbox" disabled id="14" />
                        <label for="14" id="s1">14</label>
                    </li>
                    @php
                        $j = true;
                    @endphp
                    @break

                @else
                    @php
                        $j = false;
                    @endphp
                @endif
            @endforeach
            @if ($j == false)
                <li class="seat" id="seat1">
                    <input type="checkbox" name="Sleeperseat" value="14" id="14" />
                    <label for="14" id="s1">14</label>
                </li>
            @endif
            @foreach ($busSeats as $seat)
                @if (15 == $seat->seatNo)
                    <li class="seat" id="seat1">
                        <input type="checkbox" disabled id="15" />
                        <label for="15" id="s1">15</label>
                    </li>
                    @php
                        $j = true;
                    @endphp
                @break

            @else
                @php
                    $j = false;
                @endphp
            @endif
        @endforeach
        @if ($j == false)
            <li class="seat" id="seat1">
                <input type="checkbox" name="Sleeperseat" value="15" id="15" />
                <label for="15" id="s1">15</label>
            </li>
        @endif
    <!-- </ol>
    </li> -->
        </ol>

        <ol class="Cabin4">
                <!-- <li class="row row--1">
                    <ol class="seats" type="A"> -->
                        @foreach ($busSeats as $seat)
                            @if (16 == $seat->seatNo)
                                <li class="seat" id="seat1">
                                    <input type="checkbox" disabled id="16" />
                                    <label for="16" id="s1">16</label>
                                </li>
                                @php
                                    $j = true;
                                @endphp
                            @break

                        @else
                            @php
                                $j = false;
                            @endphp
                        @endif
                    @endforeach
                    @if ($j == false)
                        <li class="seat" id="seat1">
                            <input type="checkbox" name="Sleeperseat" value="16" id="16" />
                            <label for="16" id="s1">16</label>
                        </li>
                    @endif
                    @foreach ($busSeats as $seat)
                        @if (17 == $seat->seatNo)
                            <li class="seat" id="seat1">
                                <input type="checkbox" disabled id="17" />
                                <label for="17">17</label>
                            </li>
                            @php
                                $j = true;
                            @endphp
                        @break

                    @else
                        @php
                            $j = false;
                        @endphp
                    @endif
                @endforeach
                @if ($j == false)
                    <li class="seat" id="seat1">
                        <input type="checkbox" name="Sleeperseat" value="17" id="17" />
                        <label for="17" id="s1">17</label>
                    </li>
                @endif
                @foreach ($busSeats as $seat)
                    @if (18 == $seat->seatNo)
                        <li class="seat" id="seat1">
                            <input type="checkbox" disabled id="18" />
                            <label for="18" id="s1">18</label>
                        </li>
                        @php
                            $j = true;
                        @endphp
                    @break

                @else
                    @php
                        $j = false;
                    @endphp
                @endif
            @endforeach
            @if ($j == false)
                <li class="seat" id="seat1">
                    <input type="checkbox" name="Sleeperseat" value="18" id="18" />
                    <label for="18" id="s1">18</label>
                </li>
            @endif
            @foreach ($busSeats as $seat)
                @if (19 == $seat->seatNo)
                    <li class="seat" id="seat1">
                        <input type="checkbox" disabled id="19" />
                        <label for="19" id="s1">19</label>
                    </li>
                    @php
                        $j = true;
                    @endphp
                    @break

                @else
                    @php
                        $j = false;
                    @endphp
                @endif
            @endforeach
            @if ($j == false)
                <li class="seat" id="seat1">
                    <input type="checkbox" name="Sleeperseat" value="19" id="19" />
                    <label for="19" id="s1">19</label>
                </li>
            @endif
            @foreach ($busSeats as $seat)
                @if (20 == $seat->seatNo)
                    <li class="seat" id="seat1">
                        <input type="checkbox" disabled id="20" />
                        <label for="20" id="s1">20</label>
                    </li>
                    @php
                        $j = true;
                    @endphp
                @break

            @else
                @php
                    $j = false;
                @endphp
            @endif
        @endforeach
        @if ($j == false)
            <li class="seat" id="seat1">
                <input type="checkbox" name="Sleeperseat" value="20" id="20" />
                <label for="20" id="s1">20</label>
            </li>
        @endif
    <!-- </ol>
    </li> -->
        </ol>


    {{-- <div class="exit exit--back"> --}}
    {{--
    <form action="{{url('payment')}}" method="post">
        @csrf --}}

    <button type="button" class="btn btn-success ml-2" onclick="display2()" id="b1" data-toggle="modal" data-target="#modelId">{{__('home.book')}}</button>
    {{-- </form> --}}

</div>

{{-- <button class="btn btn-dark" onclick="display1()">click</button> --}}
<!-- Button trigger modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('home.payment')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('booking')}}" method="post" onsubmit="return validate()">
                            @csrf
                            @if(session('username'))
                                <label> {{__('home.username')}} :- </label>
                                <input type="text" class="form-control" name="uname" id="uname" readonly value="{{session('username')}}">
                            @else
                                <span class="text-danger">Please First LoggedIn</span><br>
                                <label> {{__('home.username')}} :- </label>
                                <input type="text" class="form-control" name="uname" id="uname" readonly value="{{session('username')}}">
                            @endif

                            <label> {{__('home.sNo')}} :- </label>
                            <input type="text" name="display" id="display" class="form-control" readonly/>
                            <span id="seatError" class="text-danger" style="font-weight:bold;"></span><br>
                            <label> {{__('home.fare')}} :- </label>
                            <input type="text" class="form-control" name="fare" id="fare" readonly value="{{$fare}}">

                            <input type="hidden" name="rid" id="rid" value="{{$rid}}"/>
                            <input type="hidden" name="bno" id="bno" value="{{$bus->busNo}}"/>
                            <input type="hidden" name="from" id="from" value="{{$from}}"/>
                            <input type="hidden" name="to" id="to" value="{{$to}}"/>
                            <input type="hidden" name="date" id="date" value="{{$date}}"/>
                            <input type="hidden" name="time" id="time" value="{{$time}}"/>
                            <input type="hidden" name="fare" id="fare" value="{{$fare}}"/>
                            <input type="hidden" name="count" id="count"/>
                            <button type="submit" class="btn btn-success mt-3" onclick="validate()">{{__('home.payment')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

{{-- <h1 id="display"> </h1> --}}

<script>

    //   $(document).ready(function()
    //   {
    //       $('input').on('change',function(){
    //           $('input').not(this).prop('checked',false);
    //       });
    //   });

      function validate()
      {
        var seat5 = document.getElementById('display');
        if(seat5.value.length == "")
        {
            document.getElementById("seatError").innerHTML = "Please Select the Seat";
            document.getElementById("seatError").style.fontSize = "15px";
            return false;
        }
        else
        {
            return true;
        }
      }

    function display2()
    {
        var checkboxes = document.getElementsByName('Sleeperseat');
    var count = 0;
    var result = "";
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            result += checkboxes[i].value + ",";
            count++;
        }
    }
    // console.log(result);
    // console.log(count);
    document.getElementById('display').value = result;
    document.getElementById('fare').value={{ $fare }} * count;
    document.getElementById('count').value=count;
    }

    </script>

    @endif
</div>
</body>
@endsection
