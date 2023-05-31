@extends('Layouts.main')

@section('main-content')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title> Manage Bus </title>
</head>
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
                                <select name="series" id="series" onchange="addCity()">
                                    <option value="">Select</option>
                                    <option value="GJ01">GJ01</option>
                                    <option value="GJ02">GJ02</option>
                                    <option value="GJ03">GJ03</option>
                                    <option value="GJ04">GJ04</option>
                                    <option value="GJ05">GJ05</option>
                                    <option value="GJ06">GJ06</option>
                                    <option value="GJ07">GJ07</option>
                                    <option value="GJ08">GJ08</option>
                                    <option value="GJ09">GJ09</option>
                                    <option value="GJ10">GJ10</option>
                                    <option value="GJ11">GJ11</option>
                                    <option value="GJ12">GJ12</option>
                                    <option value="GJ13">GJ13</option>
                                    <option value="GJ14">GJ14</option>
                                    <option value="GJ15">GJ15</option>
                                    <option value="GJ16">GJ16</option>
                                    <option value="GJ17">GJ17</option>
                                    <option value="GJ18">GJ18</option>
                                    <option value="GJ19">GJ19</option>
                                    <option value="GJ20">GJ20</option>
                                    <option value="GJ21">GJ21</option>
                                    <option value="GJ22">GJ22</option>
                                    <option value="GJ23">GJ23</option>
                                    <option value="GJ24">GJ24</option>
                                    <option value="GJ25">GJ25</option>
                                    <option value="GJ26">GJ26</option>
                                    <option value="GJ27">GJ27</option>
                                    <option value="GJ28">GJ28</option>
                                    <option value="GJ29">GJ29</option>
                                    <option value="GJ30">GJ30</option>
                                    <option value="GJ31">GJ31</option>
                                    <option value="GJ32">GJ32</option>
                                    <option value="GJ33">GJ33</option>
                                    <option value="GJ34">GJ34</option>
                                    <option value="GJ35">GJ35</option>
                                    <option value="GJ36">GJ36</option>
                                    <option value="GJ37">GJ37</option>
                                    <option value="GJ38">GJ38</option>
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

        function addCity()
        {
            var x = document.getElementById("series").value;
            document.getElementById("busno").value = x;
        }

        function validateBusNO()
        {
            var bNo = document.getElementById("busno");
            let p = /^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/;
            if(!p.test(bNo.value))
            {
                document.getElementById("busno-error").innerHTML="Please Enter valid Bus Number (GJ05AB1122)";
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
@endsection