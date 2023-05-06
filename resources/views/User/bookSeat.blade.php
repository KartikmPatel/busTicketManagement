@extends('Layouts.main')

@section('Usermain-content')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title> </title>
</head>
<body class="bg-white">
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
        <a class="btn btn-outline-dark ml-3" href="{{url('adminSeats')}}"><i class="ml-1 fa fa-arrow-left backarraow text-danger"></i></a>
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
                        <input type="checkbox" id="1" />
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
                    <input type="checkbox" id="2" />
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
                <input type="checkbox" id="3" />
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
                <input type="checkbox" id="4" />
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
            <input type="checkbox" id="5" />
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
        <input type="checkbox" id="6" />
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
    <input type="checkbox" id="7" />
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
<input type="checkbox" id="8" />
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
<input type="checkbox" id="9" />
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
<input type="checkbox" id="10" />
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
<input type="checkbox" id="11" />
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
<input type="checkbox" id="12" />
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
<input type="checkbox" id="13" />
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
<input type="checkbox" id="14" />
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
<input type="checkbox" id="15" />
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
<input type="checkbox" id="16" />
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
<input type="checkbox" id="17" />
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
<input type="checkbox" id="18" />
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
<input type="checkbox" id="19" />
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
<input type="checkbox" id="20" />
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
<input type="checkbox" id="21" />
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
<input type="checkbox" id="22" />
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
<input type="checkbox" id="23" />
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
<input type="checkbox" id="24" />
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
<input type="checkbox" id="25" />
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
<input type="checkbox" id="26" />
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
<input type="checkbox" id="27" />
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
<input type="checkbox" id="28" onselect="display1()"/>
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
<input type="checkbox" id="29" onselect="display1()"/>
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
<input type="checkbox" id="30" onselect="display1()"/>
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
                        <form action="{{url('booking')}}" method="post">
                            @csrf
                            <label> {{__('home.username')}} :- </label>
                            <input type="text" class="form-control" name="uname" id="uname" readonly value="{{session('username')}}">
                            <label> {{__('home.sNo')}} :- </label>
                            <input type="text" name="display" id="display" class="form-control" readonly/>
                            <label> {{__('home.fare')}} :- </label>
                            <input type="text" class="form-control" name="fare" id="fare" readonly value="{{$fare}}">

                            <input type="hidden" name="rid" id="rid" value="{{$rid}}"/>
                            <input type="hidden" name="bno" id="bno" value="{{$bus->busNo}}"/>
                            <input type="hidden" name="from" id="from" value="{{$from}}"/>
                            <input type="hidden" name="to" id="to" value="{{$to}}"/>
                            <input type="hidden" name="date" id="date" value="{{$date}}"/>
                            <input type="hidden" name="time" id="time" value="{{$time}}"/>
                            <input type="hidden" name="fare" id="fare" value="{{$fare}}"/>
                            <button type="submit" class="btn btn-success mt-3">{{__('home.payment')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

{{-- <h1 id="display"> </h1> --}}

<script>

      $(document).ready(function()
      {
          $('input').on('change',function(){
              $('input').not(this).prop('checked',false);
          });
      });


    function display1()
    {
        var s1 = document.getElementById('1');
        var s2 = document.getElementById('2');
        var s3 = document.getElementById('3');
        var s4 = document.getElementById('4');
        var s5 = document.getElementById('5');
        var s6 = document.getElementById('6');
        var s7 = document.getElementById('7');
        var s8 = document.getElementById('8');
        var s9 = document.getElementById('9');
        var s10 = document.getElementById('10');
        var s11 = document.getElementById('11');
        var s12 = document.getElementById('12');
        var s13 = document.getElementById('13');
        var s14 = document.getElementById('14');
        var s15 = document.getElementById('15');
        var s16 = document.getElementById('16');
        var s17 = document.getElementById('17');
        var s18 = document.getElementById('18');
        var s19 = document.getElementById('19');
        var s20 = document.getElementById('20');
        var s21 = document.getElementById('21');
        var s22 = document.getElementById('22');
        var s23 = document.getElementById('23');
        var s24 = document.getElementById('24');
        var s25 = document.getElementById('25');
        var s26 = document.getElementById('26');
        var s27 = document.getElementById('27');
        var s28 = document.getElementById('28');
        var s29 = document.getElementById('29');
        var s30 = document.getElementById('30');

        if(s1.checked == true)
        {
          document.getElementById('display').value="1";
        }

        if(s2.checked == true)
        {
            document.getElementById('display').value="2";
        }
        if(s3.checked == true)
        {
            document.getElementById('display').value="3";
        }
        if(s4.checked == true)
        {
            document.getElementById('display').value="4";
        }
        if(s5.checked == true)
        {
            document.getElementById('display').value="5";
        }

        if(s6.checked == true)
        {
          document.getElementById('display').value="6";
        }

        if(s7.checked == true)
        {
            document.getElementById('display').value="7";
        }
        if(s8.checked == true)
        {
            document.getElementById('display').value="8";
        }
        if(s9.checked == true)
        {
            document.getElementById('display').value="9";
        }
        if(s10.checked == true)
        {
            document.getElementById('display').value="10";
        }

        if(s11.checked == true)
        {
          document.getElementById('display').value="11";
        }

        if(s12.checked == true)
        {
            document.getElementById('display').value="12";
        }
        if(s13.checked == true)
        {
            document.getElementById('display').value="13";
        }
        if(s14.checked == true)
        {
            document.getElementById('display').value="14";
        }
        if(s15.checked == true)
        {
            document.getElementById('display').value="15";
        }

        if(s16.checked == true)
        {
          document.getElementById('display').value="16";
        }

        if(s17.checked == true)
        {
            document.getElementById('display').value="17";
        }
        if(s18.checked == true)
        {
            document.getElementById('display').value="18";
        }
        if(s19.checked == true)
        {
            document.getElementById('display').value="19";
        }
        if(s20.checked == true)
        {
            document.getElementById('display').value="20";
        }
        if(s21.checked == true)
        {
          document.getElementById('display').value="21";
        }

        if(s22.checked == true)
        {
            document.getElementById('display').value="22";
        }
        if(s23.checked == true)
        {
            document.getElementById('display').value="23";
        }
        if(s24.checked == true)
        {
            document.getElementById('display').value="24";
        }
        if(s25.checked == true)
        {
            document.getElementById('display').value="25";
        }

        if(s26.checked == true)
        {
          document.getElementById('display').value="26";
        }

        if(s27.checked == true)
        {
            document.getElementById('display').value="27";
        }
        if(s28.checked == true)
        {
            document.getElementById('display').value="28";
        }
        if(s29.checked == true)
        {
            document.getElementById('display').value="29";
        }
        if(s30.checked == true)
        {
            document.getElementById('display').value="30";
        }


        // var i;
        // for(i=1;i<=30;i++)
        // {
        //     if('s'+i.checked == true)
        //     {
        //         document.getElementById('display').value=i;
        //     }
        // }
    }



    </script>

@elseif($bus->type == "Sleeper")
@php
        $j = false;
@endphp


    <div class="theatre mt-5">
        <a class="btn btn-outline-dark ml-3" href="{{url('adminSeats')}}"><i class="ml-1 fa fa-arrow-left backarraow text-danger"></i></a>
        <div class="screen-side">
            {{-- <div class="screen">Screen</div> --}}
            <h3 class="select-text">{{ $bus->busNo }}</h3>
        </div>
        <div class="exit exit--front">
        </div>
        <ol class="Cabin">
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
                        <input type="checkbox" id="1" />
                        <label for="">1</label>
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
                    <input type="checkbox" id="2" />
                    <label for="">2</label>
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
                <input type="checkbox" id="3" />
                <label for="">3</label>
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
                <input type="checkbox" id="4" />
                <label for="">4</label>
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
            <input type="checkbox" id="5" />
            <label for="">5</label>
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
        <input type="checkbox" id="6" />
        <label for="">6</label>
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
    <input type="checkbox" id="7" />
    <label for="">7</label>
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
<input type="checkbox" id="8" />
<label for="">8</label>
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
<input type="checkbox" id="9" />
<label for="">9</label>
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
<input type="checkbox" id="10" />
<label for="">10</label>
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
<input type="checkbox" id="11" />
<label for="">11</label>
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
<input type="checkbox" id="12" />
<label for="">12</label>
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
<input type="checkbox" id="13" />
<label for="">13</label>
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
<input type="checkbox" id="14" />
<label for="">14</label>
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
<input type="checkbox" id="15" />
<label for="">15</label>
</li>
@endif
{{-- @foreach ($busSeats as $seat)
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
<input type="checkbox" id="16" />
<label for="">16</label>
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
<input type="checkbox" id="17" />
<label for="">17</label>
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
<input type="checkbox" id="18" />
<label for="">18</label>
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
<input type="checkbox" id="19" />
<label for="">19</label>
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
<input type="checkbox" id="20" />
<label for="">20</label>
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
<input type="checkbox" id="21" />
<label for="">21</label>
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
<input type="checkbox" id="22" />
<label for="">22</label>
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
<input type="checkbox" id="23" />
<label for="">23</label>
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
<input type="checkbox" id="24" />
<label for="">24</label>
</li>
@endif
</ol>
</li>
</ol> --}}
{{-- <div class="exit exit--back"> --}}

<button class="btn btn-success">Payment</button>
</div>
@endif
</div>


</body>
@endsection
