@extends('Layouts.main')
@section('main-content')
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <title> Manage Staff </title>
    </head>

    <div class="ml-4 mt-3">
        <h2> Staffs </h2>
        {{-- <button class="btn btn-outline-dark"> Add Bus</button> --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-dark btn-lg" data-toggle="modal" data-target="#modelId">
            Add Staff
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Staff</h5>
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
                                <label> Staff Name : </label>
                                <input type="text" class="form-control" name="sName" id="sName" placeholder="Staff Name">
                                <span class="text-danger" id="sName-error">
                                </span>
                            </div>

                            <div class="form-group">
                                <label> Staff Type : </label>
                                <select id="sType" name="sType" class="form-control">
                                    <option value="">--Select Staff--</option>
                                    <option value="Driver">Driver</option>
                                    <option value="Conductor">Conductor</option>
                                </select>
                                <span class="text-danger" id="sType-error">
                                </span>
                            </div>

                            <div class="form-group">
                                <label> Mobile Number : </label>
                                <input type="text" class="form-control" name="mNo" id="mNo" placeholder="Mobile Number">
                                <span class="text-danger" id="mNo-error">
                                </span>
                            </div>
                            <button type="button" class="btn btn-success mt-1" onclick="storeData();"> AddStaff </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table col-md-9 mt-2 bg-secondary table-hover text-white" id="tblData">
            <thead class="thead-dark">
                <tr>
                    <th> Staff Id </th>
                    <th> Bus No </th>
                    <th> Staff Name </th>
                    <th> Staff Type </th>
                    <th> Mobile Number </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staff as $s)
                <tr>
                    <td class="sID">
                        {{ $s->staffID }}
                    </td>
                    <td class="bno">
                        {{ $s->busNo }}
                    </td>
                    <td class="sName">
                        {{ $s->staffName }}
                    </td>
                    <td class="sType">
                        {{ $s->staffType }}
                    </td>
                    <td class="mNo col-md-2">
                        {{ $s->mobileNo }}
                    </td>
                    <td class="tdAction">
                    {{-- <!-- href="{{url('editBus')}}/{{ $b->busNo }}"
                        <a class="btn btn-outline-warning"><i
                            class="fa fa-edit text-white" id="a1"></i></a>
                            <a href="{{ url('/deleteBus') }}/{{ $b->busNo }}" class="btn btn-outline-danger"><i
                                class="fa fa-trash-can text-white"></i></a> --> --}}
                        <button class='btn btn-success btn-sm btn-edit' ><i class="fa fa-edit text-white"></i></button>
                        <a href="{{ url('/deleteStaff') }}/{{ $s->staffID }}" class='btn btn-danger btn-sm'> <i class="fa fa-trash-can text-white"></i> </a>
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
            var sName = $('#sName').val();
            var sType = $('#sType').val();
            var mNo = $('#mNo').val();

            $('#busno-error').addClass('d-none');
            $('#sName-error').addClass('d-none');
            $('#sType-error').addClass('d-none');
            $('#mNo-error').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{ url('addStaff') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    busno: busno,
                    sName: sName,
                    sType: sType,
                    mNo: mNo
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

        var rowUpdateButtons ="<a onclick='updateStaff();'><button class='btn btn-success btn-sm btn-save' > Update </button></a>";

               $('#tblData').on('click', '.btn-edit', function () {
                const sID =$(this).parent().parent().find(".sID").html();
                // // var no = $(this).parent().parent().find(".bno").html();
                $(this).parent().parent().find(".sID").html("<input type='text' value='"+sID.trim()+"' class='form-control txtsID' readonly/>");


                const bno =$(this).parent().parent().find(".bno").html();
                $(this).parent().parent().find(".bno").html(`
                <select name='busno' class='form-control txtbno'>
                <option value='`+ bno.trim() +`' selected>`+ bno.trim() +`</option>
                @foreach($buses as $b)
                <option value='{{ $b->busNo }}'>{{$b->busNo}}</option>
                @endforeach</select>
                `);


                const sName =$(this).parent().parent().find(".sName").html();

                $(this).parent().parent().find(".sName").html("<input type='text' value='"+sName.trim()+"' class='form-control txtsName' />");

                const sType =$(this).parent().parent().find(".sType").html();

                $(this).parent().parent().find(".sType").html(`
                <select name='sType' class='form-control txtsType'>
                    <option value='`+sType.trim()+`'>`+sType.trim()+`</option>
                    @foreach($staff as $s)
                    <option value='{{ $s->staffType }}'>{{$s->staffType}}</option>
                    @endforeach
                    </select>
                `);

                const mNo =$(this).parent().parent().find(".mNo").html();

                $(this).parent().parent().find(".mNo").html("<input type='text' value='"+mNo.trim()+"' class='form-control txtmNo' />");

                $(this).parent().parent().find(".tdAction").html(rowUpdateButtons);

            });

            function updateStaff() {
                var sID =$('.txtsID').val();
                var busno =$('.txtbno').val();
                var sName = $('.txtsName').val();
                var sType = $('.txtsType').val();
                var mNo = $('.txtmNo').val();

                $.ajax({
                    type:'POST',
                    url:"{{ url('updateStaff') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        sID: sID,
                        busno: busno,
                        sName: sName,
                        sType: sType,
                        mNo: mNo
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