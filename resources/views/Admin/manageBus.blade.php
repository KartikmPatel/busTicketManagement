@extends('Layouts.main')

@section('main-content')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
                            <div class="form-group">
                                <label> Bus Number : </label>
                                <input type="text" class="form-control" name="busno" id="busno">
                                <span class="text-danger" id="busno-error">
                                </span>
                            </div>
                            <div class="form-group">
                                <label> Name : </label>
                                <input type="text" class="form-control" name="name" id="name">
                                <span class="text-danger" id="name-error">
                                </span>
                            </div>
                            <div class="form-group">
                                <label> Size : </label>
                                <input type="text" class="form-control" name="size" id="size">
                                <span class="text-danger" id="size-error">
                                </span>
                            </div>
                            <div class="form-group">
                                <label> Type : </label>
                                <select id="type" name="type" class="form-control">
                                    <option value="Sleeper">Sleeper</option>
                                    <option value="Seater">Seater</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mt-1" onclick="storeData();"> AddBus </button>
                        </div>
                    </div>
                </div>
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
                var name = $('#name').val();
                var size = $('#size').val();
                var type = $('#type').val();

                $('#busno-error').addClass('d-none');
                $('#name-error').addClass('d-none');
                $('#size-error').addClass('d-none');

                $.ajax({
                    type: 'POST',
                    url: "{{ url('manageBus') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        busno: busno,
                        name: name,
                        size: size,
                        type: type
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
        </script>
        <br>
        <br>

        <table class="table col-md-10 bg-secondary table-hover text-white" id="tblData">
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
                        <!-- href="{{url('editBus')}}/{{ $b->busNo }}"
                             <a class="btn btn-outline-warning"><i
                                    class="fa fa-edit text-white" id="a1"></i></a>
                            <a href="{{ url('/deleteBus') }}/{{ $b->busNo }}" class="btn btn-outline-danger"><i
                            class="fa fa-trash-can text-white"></i></a> -->
                            <button class='btn btn-success btn-sm btn-edit' > Edit </button> 
                            <a href="{{ url('/deleteBus') }}/{{ $b->busNo }}" class='btn btn-danger btn-sm'> Delete </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
            <script>
            //   var rowButtons ="<button class='btn btn-success btn-sm btn-edit' > Edit </button>  <button class='btn btn-danger btn-sm' > Delete </button> ";
        var rowUpdateButtons ="<a href='{{url('/mangeBus')}}'><button class='btn btn-success btn-sm btn-save' > Update </button></a>";
            
               $('#tblData').on('click', '.btn-edit', function () { 
                const no =$(this).parent().parent().find(".bno").html();

                const name =$(this).parent().parent().find(".bname").html();

                $(this).parent().parent().find(".bname").html("<input type='text' value='"+name+"' class='form-control txtbname' />"); 


                const bsize =$(this).parent().parent().find(".bsize").html();

                $(this).parent().parent().find(".bsize").html("<input type='text' value='"+bsize+"' class='form-control txtbsize' />"); 
                
                const type =$(this).parent().parent().find(".btype").html();

                $(this).parent().parent().find(".btype").html("<select name='type1' class='form-control'><option value='Sleeper'>Sleeper</option><option value='Seater'>Seater</option></select>"); 
                
                $(this).parent().parent().find(".tdAction").html(rowUpdateButtons);    
                
            });
            </script>
@endsection
