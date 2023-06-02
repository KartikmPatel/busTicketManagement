@extends('Layouts.main')

@section('main-content')

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title> Manage Route </title>
</head>

<body onload="myFunction()">    
<div class="ml-4 mt-3">
        {{-- @if (Session()->has('success'))
         <div class="alert alert-success alert-dismissible successAlert" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session()->get('success') }}
        </div>
        @endif --}}

        {{-- <div class="alert col-md-6 ml-5">

        </div> --}}

         {{-- @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Error !</strong> {{ session('error') }}
        </div>
        @endif --}}
        <h2> Routes </h2>
        {{-- <button class="btn btn-outline-dark"> Add Bus</button> --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-dark btn-lg" data-toggle="modal" data-target="#modelId">
            Add Route
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Route</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group">
                                <label> Bus Number : </label>
                                <select id="busno" name="busno" class="form-control">
                                    <option value="">--Select Bus Number--</option>
                                    @foreach ($buses as $bus)
                                        <option value="{{ $bus->busNo }}">{{ $bus->busNo }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="busno-error">
                                </span>
                            </div>
                            <div class="form-group">
                                <label> Starting Station : </label>
                                <select id="startStation" name="startStation" class="form-control">
                                    <option value="">--Select Starting Station--</option>
                                    @foreach ($stations as $station)
                                        <option value="{{ $station->stationID }}">{{ $station->stationName }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="startStation-error">
                                </span>
                            </div>
                            <div class="form-group">
                                <label> Ending Station : </label>
                                <select id="endStation" name="endStation" class="form-control">
                                    <option value="">--Select Ending Station--</option>
                                    @foreach ($stations as $station)
                                        <option value="{{ $station->stationID }}">{{ $station->stationName }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="endStation-error">
                                </span>
                            </div>
                            <div class="form-group">
                                <label> Departure Time : </label>
                                <input type="time" class="form-control" name="dtime" id="dtime">
                                <span class="text-danger" id="dtime-error">
                                </span>
                            </div>
                            <div class="form-group">
                                <label> Fare : </label>
                                <input type="text" class="form-control" name="fare" id="fare" placeholder="fare">
                                <span class="text-danger" id="fare-error">
                                </span>
                            </div>
                            <button type="button" class="btn btn-success mt-1" onclick="storeData();"> AddRoute </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <table class="table col-md-10 mt-2 bg-secondary table-hover text-white" id="tblData">
            <thead class="thead-dark">
                <tr>
                    <th> Route ID </th>
                    <th> Bus No </th>
                    <th> Starting Station </th>
                    <th> Ending Station </th>
                    <th> Departure Time </th>
                    <th>Fare</th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $r)
                <tr>
                    <td class="rID col-md-1">
                        {{$r->routeID}}
                    </td>
                    <td class="bno">
                        {{ $r->busNo }}
                        {{-- <select name='busno' class='form-control txtbno'>
                            @foreach($buses as $b)
                            @if ($r->busNo == $b->busNo)
                            <option value='{{ $b->busNo }}' selected>{{$b->busNo}}</option>
                            @else
                            <option value='{{ $b->busNo }}'>{{$b->busNo}}</option>
                            @endif
                            @endforeach
                        </select> --}}
                    </td>
                    <td class="ssID">
                        @foreach ($stations as $s)
                        @if($r->startingStationID == $s->stationID)
                        {{ $s->stationName }}
                        @endif
                        @endforeach
                    </td>
                    <td class="esID">
                        @foreach ($stations as $s)
                        @if($r->endingStationID == $s->stationID)
                        {{ $s->stationName }}
                        @endif
                        @endforeach
                    </td>
                    <td class="dtime">
                        {{ $r->departureTime}}
                    </td>
                    <td class="fare col-md-1">
                        {{ $r->fare }}
                    </td>
                    <td class="tdAction">
                        <button class='btn btn-success btn-sm btn-edit' ><i class="fa fa-edit text-white"></i></button>
                        <a href="{{ url('/deleteRoute') }}/{{ $r->routeID }}" class='btn btn-danger btn-sm'> <i class="fa fa-trash-can text-white"></i> </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table> -->

        <div>
            <form action="" class="form-inline" style="margin-left:32%;">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" value="{{ $search }}" aria-label="Search">
                <button class="btn btn-info my-2 my-sm-0">Search</button>
                <button type="button" class="btn btn-danger my-2 my-sm-0 ml-4" onclick="window.location.href='{{ url('/manageRoute') }}'">All Routes</button>
            </form>
        </div>

        <div class="viewTable">
            <table class="content1-table1 col-md-7" id="tblData" style="margin-top:30px;">
                <thead>
                    <tr>
                        <th></th>
                        <th> Route ID </th>
                        <th> Bus No </th>
                        <th> Starting Station </th>
                        <th> Ending Station </th>
                        <th> Departure Time </th>
                        <th>Fare</th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($routes as $r)
                    <tr>
                    <td>
                        <img src="./images/route1.png" width="70px" height="50px" alt=""/>
                    </td>
                    <td class="rID col-md-1">
                        {{$r->routeID}}
                    </td>
                    <td class="bno">
                        {{ $r->busNo }}
                        {{-- <select name='busno' class='form-control txtbno'>
                            @foreach($buses as $b)
                            @if ($r->busNo == $b->busNo)
                            <option value='{{ $b->busNo }}' selected>{{$b->busNo}}</option>
                            @else
                            <option value='{{ $b->busNo }}'>{{$b->busNo}}</option>
                            @endif
                            @endforeach
                        </select> --}}
                    </td>
                    <td class="ssID">
                        @foreach ($stations as $s)
                        @if($r->startingStationID == $s->stationID)
                        {{ $s->stationName }}
                        @endif
                        @endforeach
                    </td>
                    <td class="esID">
                        @foreach ($stations as $s)
                        @if($r->endingStationID == $s->stationID)
                        {{ $s->stationName }}
                        @endif
                        @endforeach
                    </td>
                    <td class="dtime">
                        {{ $r->departureTime}}
                    </td>
                    <td class="fare col-md-1">
                        {{ $r->fare }}
                    </td>
                    <td class="tdAction">
                        <button class='btn btn-success btn-sm btn-edit' ><i class="fa fa-edit text-white"></i></button>
                        <a href="{{ url('/deleteRoute') }}/{{ $r->routeID }}" class='btn btn-danger btn-sm'> <i class="fa fa-trash-can text-white"></i> </a>
                    </td>
                </tr>
            @endforeach
  </tbody>
</table>
    </div>

    <br>
<div style="margin-left:37%;">
    {{ $routes->links() }}
</div>

    </div>
        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
            });

            function storeData() {
            var busno = $('#busno').val();
            var startStation = $('#startStation').val();
            var endStation = $('#endStation').val();
            var dtime = $('#dtime').val();
            var fare = $('#fare').val();

            $('#busno-error').addClass('d-none');
            $('#startStation-error').addClass('d-none');
            $('#endStation-error').addClass('d-none');
            $('#dtime-error').addClass('d-none');
            $('#fare-error').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{ url('addRoute') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    busno: busno,
                    startStation: startStation,
                    endStation: endStation,
                    dtime: dtime,
                    fare: fare
                },
                success: function(data) {
                    // setTimeout(function() {
                    //     location.reload();
                    // },50);
                    if(data == "busError")
                    {
                        alert('Bus route Already Exists');
                    }
                    if(data == "stationError")
                    {
                        alert('You can not Select Same Station');
                    }

                        if(data == "routeDone")
                        {
                         alert('Route Insert SuccessFully');
                         window.location.replace('/manageRoute');
                        }
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    if ($.isEmptyObject(errors) == false) {
                        $.each(errors.errors, function(key, value) {
                            var ErrorID = '#' + key + '-error';
                            $(ErrorID).removeClass('d-none');
                            $(ErrorID).text(value);
                        })
                    }
                }
            })
        }

        var rowUpdateButtons ="<a onclick='updateRoute();'><button class='btn btn-success btn-sm btn-save' > Update </button></a>";

               $('#tblData').on('click', '.btn-edit', function () {
                const rID =$(this).parent().parent().find(".rID").html();
                // var no = $(this).parent().parent().find(".bno").html();
                $(this).parent().parent().find(".rID").html("<input type='text' value='"+rID.trim()+"' class='form-control txtrID' readonly/>");


                const bno =$(this).parent().parent().find(".bno").html();
                $(this).parent().parent().find(".bno").html(`
                <select name='busno' class='form-control txtbno'>
                    <option value='`+bno.trim()+`' selected>`+bno.trim()+`</option>
                            @foreach($buses as $b)
                            @if(`+bno.trim()+` != $b->busNo)
                            <option value='{{ $b->busNo }}'>{{$b->busNo}}</option>
                            @endif
                            @endforeach
                        </select>
                `);



                const ssID =$(this).parent().parent().find(".ssID").html();

                $(this).parent().parent().find(".ssID").html(`
                <select name='ssID' class='form-control txtssID'>
                    <option value='`+ssID.trim()+`'>`+ssID.trim()+`</option>
                    @foreach($stations as $s)
                    @if(`+ssID.trim()+` != $s->stationID)
                    <option value='{{ $s->stationName }}'>{{$s->stationName}}</option>
                    @endif
                    @endforeach
                    </select>
                    `);

                const esID =$(this).parent().parent().find(".esID").html();

                $(this).parent().parent().find(".esID").html(`
                <select name='ssID' class='form-control txtesID'>
                    <option value='`+esID.trim()+`'>`+esID.trim()+`</option>
                    @foreach($stations as $s)
                    @if(`+esID.trim()+` != $s->stationID)
                    <option value='{{ $s->stationName }}'>{{$s->stationName}}</option>
                    @endif
                    @endforeach
                    </select>
                `);

                const dtime =$(this).parent().parent().find(".dtime").html();
                $(this).parent().parent().find(".dtime").html(" <input type='time' class='form-control txttime' id='time' value='"+dtime.trim()+"'>");

                const fare =$(this).parent().parent().find(".fare").html();

                $(this).parent().parent().find(".fare").html("<input type='text' value='"+fare.trim()+"' class='form-control txtbfare' />");

                $(this).parent().parent().find(".tdAction").html(rowUpdateButtons);

            });

            function updateRoute() {
                var rID = $('.txtrID').val();
                var busno =$('.txtbno').val();
                var ssID = $('.txtssID').val();
                var esID = $('.txtesID').val();
                var dtime = $('.txttime').val();
                var fare = $('.txtbfare').val();

                $.ajax({
                    type:'POST',
                    url:"{{ url('updateRoute') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        rID: rID,
                        busno: busno,
                        ssID: ssID,
                        esID: esID,
                        dtime: dtime,
                        fare: fare
                    },
                    success : function(data)
                    {
                        // setTimeout(function() {
                        //     location.reload();
                        // },10);

                        if(data == "updateRoute")
                        {
                            alert('Update Route SuccessFully');
                            window.location.replace('/manageRoute');
                        }
                    }
                })
            }
        </script>
</body>
    @endsection