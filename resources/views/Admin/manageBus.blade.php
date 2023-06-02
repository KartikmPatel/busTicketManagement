@extends('Layouts.main')

@section('main-content')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title> Manage Bus </title>
</head>
<body onload="myFunction()">
    
<div class="ml-4 mt-3">
    <h2> Buses </h2>
    {{-- <button class="btn btn-outline-dark"> Add Bus</button> --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-dark btn-lg" data-toggle="modal" data-target="#modelId">
        Add Bus
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <span class="" id="allBus-error">
                            </span>

                            <div class="form-group">
                                <label> Bus Number : </label>
                                <br>
                                <select name="series" id="series" onchange="addState()" class="form-control col-md-6 mb-1">
                                    <option value="">------------Select State------------</option>
                                    <option value="AN">Andaman and Nicobar Islands</option>
                                    <option value="AP">Andhra Pradesh</option>
                                    <option value="AR">Arunachal Pradesh</option>
                                    <option value="AS">Assam</option>
                                    <option value="BH">Bharat</option>
                                    <option value="BR">Bihar</option>
                                    <option value="CH">Chandigarh</option>
                                    <option value="CG">Chhattisgarh</option>
                                    <option value="DD">Daman and Diu</option>
                                    <option value="DL">Delhi</option>
                                    <option value="DN">Dadra and Nagar Haveli</option>
                                    <option value="GA">Goa</option>
                                    <option value="GJ">Gujarat</option>
                                    <option value="HR">Haryana</option>
                                    <option value="HP">Himachal Pradesh</option>
                                    <option value="JK">Jammu and Kashmir</option>
                                    <option value="JH">Jharkhand</option>
                                    <option value="KA">Karnataka</option>
                                    <option value="KL">Kerala</option>
                                    <option value="LA">Ladakh</option>
                                    <option value="LD">Lakshadweep</option>
                                    <option value="MP">Madhya Pradesh</option>
                                    <option value="MH">Maharashtra</option>
                                    <option value="MN">Manipur</option>
                                    <option value="ML">Meghalaya</option>
                                    <option value="MZ">Mizoram</option>
                                    <option value="NL">Nagaland</option>
                                    <option value="OD">Odisha</option>
                                    <option value="OR">Orissa</option>
                                    <option value="PY">Puducherry</option>
                                    <option value="PB">Punjab</option>
                                    <option value="RJ">Rajasthan</option>
                                    <option value="SK">Sikkim</option>
                                    <option value="TN">Tamil Nadu</option>
                                    <option value="TS">Telangana</option>
                                    <option value="TR">Tripura</option>
                                    <option value="UA">Uttaranchal</option>
                                    <option value="UP">Uttar Pradesh</option>
                                    <option value="UK">Uttarakhand</option>
                                    <option value="WB">West Bengal</option>
                                </select>

                                    <input type="text" class="form-control" name="busno" id="busno" oninput="validateBusNO()">
                                    <span class="" id="busno-error">
                                    </span>
                            </div>
                            <div class="form-group">
                                <label> Name : </label>
                                <input type="text" class="form-control" name="name" id="name" oninput="validateName()">
                                <span class="" id="name-error">
                                    </span>
                                </div>
                                <!-- <div class="form-group">
                                    <label> Size : </label>
                                    <input type="text" class="form-control" name="size" id="size" oninput="validateSize()">
                                    <span class="" id="size-error">
                                        </span>
                                    </div> -->
                                    <div class="form-group">
                                        <label> Type : </label>
                                        <select id="type" name="type" class="form-control">
                                            <option value="Sleeper">Sleeper</option>
                                            <option value="Seater">Seater</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-1" onclick="checkValidate()"> AddBus </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <br>

                <!-- <table class="table col-md-9 bg-secondary table-hover text-white" id="tblData">
                    <thead class="thead-dark">
                        <tr>
                            <th> Bus No </th>
                            <th> Name </th>
                            <th> Size </th>
                            <th> Type </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bus as $b)
                        <tr>
                            <td class="bno">
                                {{ $b->busNo }}
                            </td>
                            <td class="bname">
                                {{ $b->name }}
                            </td>
                            <td class="bsize">
                                {{ $b->size }}
                            </td>
                            <td class="btype">
                                {{ $b->type }}
                            </td>
                            <td class="tdAction">
                                <button class='btn btn-success btn-sm btn-edit' ><i class="fa fa-edit text-white"></i></button>
                            <a href="{{ url('/deleteBus') }}/{{ $b->busNo }}" class='btn btn-danger btn-sm'> <i class="fa fa-trash-can text-white"></i> </a>
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
                <button type="button" class="btn btn-danger my-2 my-sm-0 ml-4" onclick="window.location.href='{{ url('/manageBus') }}'">All Buses</button>
            </form>
        </div>

        <div class="viewTable">
            <table class="content1-table1 col-md-7" id="tblData">
                <thead>
                    <tr>
                        <th></th>
                        <th> Bus No </th>
                        <th> Name </th>
                        <th> Size </th>
                        <th> Type </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bus as $b)
                    <tr>
                        <td>
                            <img src="./images1/bus13.jpg" width="70px" height="50px" alt=""/>
                        </td>
                        <td class="bno">
                            {{ $b->busNo }}
                        </td>
                        <td class="bname">
                            {{ $b->name }}
                        </td>
                        <td class="bsize">
                            {{ $b->size }}
                        </td>
                        <td class="btype">
                            {{ $b->type }}
                        </td>
                        <td class="tdAction">
                            <button class='btn btn-success btn-sm btn-edit' ><i class="fa fa-edit text-white"></i></button>
                            <a href="{{ url('/deleteBus') }}/{{ $b->busNo }}" class='btn btn-danger btn-sm'> <i class="fa fa-trash-can text-white"></i> </a>
                        </td>
                    </tr>
                @endforeach
  </tbody>
</table>
    </div>

    <br>
<div style="margin-left:37%;">
    {{ $bus->links() }}
</div>

    </div>
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
        });

        function addState()
        {
            var x = document.getElementById("series").value;
            document.getElementById("busno").value = x;
        }

        function validateBusNO()
        {
            var bNo = document.getElementById("busno");
            let p = /^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/;
            var state = $('#series').val();
            if(!p.test(bNo.value))
            {
                document.getElementById("busno-error").innerHTML="Please Enter valid Bus Number ("+state+"05AB1122)";
        		document.getElementById("busno-error").style.color="red";
        		document.getElementById("busno-error").style.fontSize="15px";
        		bNo.focus();
        		return false;
            }
            else
            {
                document.getElementById("busno-error").innerHTML="";
        		document.getElementById("busno-error").style.color="";
        		document.getElementById("busno-error").style.fontSize="";
            }
            return true;
        }

        function validateName()
        {
            var name = document.getElementById("name");
            let p = /^\D+$/;
            if(!p.test(name.value))
            {
                document.getElementById("name-error").innerHTML="Please Enter valid Bus Name";
        		document.getElementById("name-error").style.color="red";
        		document.getElementById("name-error").style.fontSize="15px";
        		name.focus();
        		return false;
            }
            else
            {
                document.getElementById("name-error").innerHTML="";
        		document.getElementById("name-error").style.color="";
        		document.getElementById("name-error").style.fontSize="";
            }
            return true;
        }

        // function validateSize()
        // {
        //     var size = document.getElementById("size");
        //     let p = /^[0-9]{2}$/;
        //     if(!p.test(size.value))
        //     {
        //         document.getElementById("size-error").innerHTML="Please Enter valid size";
        // 		document.getElementById("size-error").style.color="red";
        // 		document.getElementById("size-error").style.fontSize="15px";
        // 		size.focus();
        // 		return false;
        //     }
        //     else
        //     {
        //         document.getElementById("size-error").innerHTML="Size is valid";
        // 		document.getElementById("size-error").style.color="green";
        // 		document.getElementById("size-error").style.fontSize="15px";
        //     }
        //     return true;
        // }

        function checkValidate()
        {
            var bNo = document.getElementById("busno");
            var name = document.getElementById("name");
            // var size = document.getElementById("size");
            if(bNo.value.length == "" || name.value.length == "")
            {
                document.getElementById("allBus-error").innerHTML="Please fill up the empty field";
        		document.getElementById("allBus-error").style.color="red";
        		document.getElementById("allBus-error").style.fontSize="15px";
            }
            else{
                document.getElementById("allBus-error").innerHTML="";
        		document.getElementById("allBus-error").style.color="";
        		document.getElementById("allBus-error").style.fontSize="";
                if(validateBusNO() && validateName())
                {
                        storeData();
                }
            }
        }

        function storeData() {
            var busno = $('#busno').val();
            var name = $('#name').val();
            // var size = $('#size').val();
            var type = $('#type').val();
            // $('#busno-error').addClass('d-none');
            // $('#name-error').addClass('d-none');
            // $('#size-error').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{ url('addBus') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    busno: busno,
                    name: name,
                    // size: size,
                    type: type
                },
                success: function(data) {
                    // setTimeout(function() {
                    //     location.reload();
                    // },50);

                    if(data == "busError")
                        {
                            alert('Bus Already Exists');
                        }


                        if(data == "busSuccess")
                        {
                            alert('Insert Bus SuccessFully');
                            window.location.replace('/manageBus');
                        }
                },
                // error: function(data) {
                //     var errors = data.responseJSON;
                //     if ($.isEmptyObject(errors) == false) {
                //         $.each(errors.errors, function(key, value) {
                //             var ErrorID = '#' + key + '-error';
                //             $(ErrorID).removeClass('d-none');
                //             $(ErrorID).text(value);
                //         })
                //     }
                // }
            })
        }

            //   var rowButtons ="<button class='btn btn-success btn-sm btn-edit' > Edit </button>  <button class='btn btn-danger btn-sm' > Delete </button> ";
        var rowUpdateButtons ="<a onclick='updateBus();'><button class='btn btn-success btn-sm btn-save' > Update </button></a>";

               $('#tblData').on('click', '.btn-edit', function () {
                const no =$(this).parent().parent().find(".bno").html();
                // var no = $(this).parent().parent().find(".bno").html();
                $(this).parent().parent().find(".bno").html("<input type='text' value='"+no.trim()+"' class='form-control txtbno' readonly/>");


                const name =$(this).parent().parent().find(".bname").html();
                $(this).parent().parent().find(".bname").html("<input type='text' value='"+name.trim()+"' class='form-control txtbname' />");


                const bsize =$(this).parent().parent().find(".bsize").html();

                $(this).parent().parent().find(".bsize").html("<input type='text' value='"+bsize.trim()+"' class='form-control txtbsize' readonly/>");

                const type =$(this).parent().parent().find(".btype").html();

                $(this).parent().parent().find(".btype").html("<select name='type1' class='form-control txtbtype'><option value='Sleeper'>Sleeper</option><option value='Seater'>Seater</option></select>");

                $(this).parent().parent().find(".tdAction").html(rowUpdateButtons);

            });

            function updateBus() {
                var busno =$('.txtbno').val();
                var name = $('.txtbname').val();
                // var size = $('.txtbsize').val();
                var type = $('.txtbtype').val();

                $.ajax({
                    type:'POST',
                    url:"{{ url('updateBus/"+busno+"') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        busno: busno,
                        name: name,
                        // size: size,
                        type: type
                    },
                    success : function(data)
                    {
                        // setTimeout(function() {
                        //     location.reload();
                        // },10);


                        if(data == "updateBus")
                        {
                            alert('Update Bus SuccessFully');
                            window.location.replace('/manageBus');
                        }
                        // if(data == "deleteBus")
                        // {
                        //     alert('Delete Bus SuccessFully');
                        //     window.location.replace('/manageBus');
                        // }
                    }
                })
            }
            </script>
</body>
@endsection
