@extends('Layouts.main')
@section('main-content')
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <title> Manage Staff </title>
    </head>
    <body onload="myFunction()">
        
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
                                <span id="allStaff-error" class="text-danger"></span><br>
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
                            <button type="button" class="btn btn-success mt-1" onclick="validatefunction()"> AddStaff </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <table class="table col-md-9 mt-2 bg-secondary table-hover text-white" id="tblData">
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
                        <button class='btn btn-success btn-sm btn-edit' ><i class="fa fa-edit text-white"></i></button>
                        <a href="{{ url('/deleteStaff') }}/{{ $s->staffID }}" class='btn btn-danger btn-sm'> <i class="fa fa-trash-can text-white"></i> </a>
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
                <button type="button" class="btn btn-danger my-2 my-sm-0 ml-4" onclick="window.location.href='{{ url('/manageStaff') }}'">All Staffs</button>
            </form>
        </div>

        <div class="viewTable">
            <table class="content1-table1 col-md-7" id="tblData" style="margin-top:30px;">
                <thead>
                    <tr>
                        <th></th>
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
                    <td>
                        <img src="./images/staff.jpg" width="70px" height="50px" alt=""/>
                    </td>
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
                        <button class='btn btn-success btn-sm btn-edit' ><i class="fa fa-edit text-white"></i></button>
                        <a href="{{ url('/deleteStaff') }}/{{ $s->staffID }}" class='btn btn-danger btn-sm'> <i class="fa fa-trash-can text-white"></i> </a>
                    </td>
                </tr>
            @endforeach
  </tbody>
</table>
    </div>

    <br>
<div style="margin-left:37%;">
    {{ $staff->links() }}
</div>

    </div>

        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
            });

            function validatefunction()
            {
                let p = /^\d{10}$/;
                var busno = document.getElementById("busno");
                var sName = document.getElementById("sName");
                var sType = document.getElementById("sType");
                var mNo = document.getElementById("mNo");
                if(busno.value == "" || sName.value == "" || sType.value == "" || mNo.value == "")
                {
                    document.getElementById("mNo-error").innerHTML =  "";
                    document.getElementById("mNo-error").style.color =  "";
                    document.getElementById("mNo-error").style.fontSize =  "";

                    document.getElementById("allStaff-error").innerHTML =  "Please Fill up the empty field";
                    document.getElementById("allStaff-error").style.color =  "red";
                    document.getElementById("allStaff-error").style.fontSize =  "15px";
                }
                else if(!p.test(mNo.value))
                {
                    document.getElementById("allStaff-error").innerHTML =  "";
                    document.getElementById("allStaff-error").style.color =  "";
                    document.getElementById("allStaff-error").style.fontSize =  "";

                    document.getElementById("mNo-error").innerHTML =  "Please enter exactly 10 digits";
                    document.getElementById("mNo-error").style.color =  "red";
                    document.getElementById("mNo-error").style.fontSize =  "15px";   
                }
                else
                {
                    document.getElementById("mNo-error").innerHTML =  "";
                    document.getElementById("mNo-error").style.color =  "";
                    document.getElementById("mNo-error").style.fontSize =  "";

                    document.getElementById("allStaff-error").innerHTML =  "";
                    document.getElementById("allStaff-error").style.color =  "";
                    document.getElementById("allStaff-error").style.fontSize =  "";
                    storeData()   
                }
            }

            function storeData() {
            var busno = $('#busno').val();
            var sName = $('#sName').val();
            var sType = $('#sType').val();
            var mNo = $('#mNo').val();

            // $('#busno-error').addClass('d-none');
            // $('#sName-error').addClass('d-none');
            // $('#sType-error').addClass('d-none');
            // $('#mNo-error').addClass('d-none');

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
                    // setTimeout(function() {
                    //     location.reload();
                    // },50);

                    if(data == "errorStaff")
                    {
                        alert('Only 1 Staff For 1 Bus');
                    }

                    if(data == "insertStaff")
                    {
                        alert('Staff Insert Successfully');
                        window.location.replace('/manageStaff');
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
                    <option value="Driver">Driver</option>
                    <option value="Conductor">Conductor</option>
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
                        // setTimeout(function() {
                        //     location.reload();
                        // },10);

                        if(data == "sameStaffType")
                        {
                            alert('Only 1 Staff For 1 Bus');
                            window.location.replace('/manageStaff');
                        }
                        if(data == "updateStaff")
                        {
                            alert('Staff Update Successfully');
                            window.location.replace('/manageStaff');
                        }
                    }
                })
            }
        </script>
    </body>
@endsection