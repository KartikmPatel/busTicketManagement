@extends('Layouts.main')

@section('main-content')

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <title> Manage Route </title>
    </head>

    <div class="ml-4 mt-3">
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
        <table class="table col-md-9 mt-2 bg-secondary table-hover text-white" id="tblData">
            <thead class="thead-dark">
                <tr>
                    <th> Route ID </th>
                    <th> Bus No </th>
                    <th> Starting Station </th>
                    <th> Ending Station </th>
                    <th>Fare</th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $r)
                <tr>
                    <td class="rID">
                        {{ $r->routeID }}
                    </td>
                    <td class="bno">
                        {{ $r->busNo }}
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
                    <td class="fare col-md-2">
                        {{ $r->fare }}
                    </td>
                    <td class="tdAction">
                    {{-- <!-- href="{{url('editBus')}}/{{ $b->busNo }}"
                        <a class="btn btn-outline-warning"><i
                            class="fa fa-edit text-white" id="a1"></i></a>
                            <a href="{{ url('/deleteBus') }}/{{ $b->busNo }}" class="btn btn-outline-danger"><i
                                class="fa fa-trash-can text-white"></i></a> --> --}}
                        <button class='btn btn-success btn-sm btn-edit' ><i class="fa fa-edit text-white"></i></button>
                        <a href="{{ url('/deleteRoute') }}/{{ $r->routeID }}" class='btn btn-danger btn-sm'> <i class="fa fa-trash-can text-white"></i> </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
            var fare = $('#fare').val();

            $('#busno-error').addClass('d-none');
            $('#startStation-error').addClass('d-none');
            $('#endStation-error').addClass('d-none');
            $('#fare-error').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{ url('addRoute') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    busno: busno,
                    startStation: startStation,
                    endStation: endStation,
                    fare: fare
                },
                success: function(data) {
                    setTimeout(function() {
                        location.reload();
                    },50);
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
                // const rID =$(this).parent().parent().find(".rID").html();
                // // var no = $(this).parent().parent().find(".bno").html();
                // $(this).parent().parent().find(".rID").html("<input type='text' value='"+rID.trim()+"' class='form-control txtrID' />");


                const bno =$(this).parent().parent().find(".bno").html();
                $(this).parent().parent().find(".bno").html("<select name='busno' class='form-control txtbno'>@foreach($buses as $b)<option value='{{ $b->busNo }}'>{{$b->busNo}}</option>@endforeach</select>");


                const ssID =$(this).parent().parent().find(".ssID").html();

                $(this).parent().parent().find(".ssID").html("<select name='ssID' class='form-control txtssID'>@foreach($stations as $s)<option value='{{ $s->stationID }}'>{{$s->stationName}}</option>@endforeach</select>");

                const esID =$(this).parent().parent().find(".esID").html();

                $(this).parent().parent().find(".esID").html("<select name='esID' class='form-control txtesID'>@foreach($stations as $s)<option value='{{ $s->stationID }}'>{{$s->stationName}}</option>@endforeach</select>");

                const fare =$(this).parent().parent().find(".fare").html();

                $(this).parent().parent().find(".fare").html("<input type='text' value='"+fare.trim()+"' class='form-control txtbfare' />");

                $(this).parent().parent().find(".tdAction").html(rowUpdateButtons);

            });

            function updateRoute() {
                var rID = $('.rID').text();
                var busno =$('.txtbno').val();
                var ssID = $('.txtssID').val();
                var esID = $('.txtesID').val();
                var fare = $('.txtbfare').val();

                $.ajax({
                    type:'POST',
                    url:"{{ url('updateRoute/"+rID+"') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        rID: rID,
                        busno: busno,
                        ssID: ssID,
                        esID: esID,
                        fare: fare
                    },
                    success : function(data)
                    {
                        setTimeout(function() {
                            location.reload();
                        },10);
                    }
                })
            }
        </script>
    @endsection
