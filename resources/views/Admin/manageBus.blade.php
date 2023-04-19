@extends('Layouts.main')

@section('main-content')
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

        <table class="table col-md-6 bg-secondary table-hover text-white">
            <thead class="thead-dark">
                <tr>
                    <th> Bus No </th>
                    <th> Name </th>
                    <th> Size </th>
                    <th> Type </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bus as $b)
                    <tr>
                        <td>
                            {{ $b->busNo }}
                        </td>
                        <td>
                            {{ $b->name }}
                        </td>
                        <td>
                            {{ $b->size }}
                        </td>
                        <td>
                            {{ $b->type }}
                        </td>
                        <td>
                             <a href="{{url('editBus')}}/{{ $b->busNo }}" class="btn btn-outline-warning" ><i
                                    class="fa fa-edit text-white"></i></a>
                            <a href="{{ url('/deleteBus') }}/{{ $b->busNo }}" class="btn btn-outline-danger"><i
                                    class="fa fa-trash-can text-white"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers:{
                    'X-CSRF-Token' : $("input[name=_token]").val();
                }

                $('#editTable').Tabledit({
                    url:"{{url('busEdit/action')}}",
                    dataType:"json",
                    columns:{
                        identifier:[0,'busno'],
                        editable:[[1,'name'],[2,'size'],[3,
                    'type','{"1":"Sleeper","2":"Seater"}']]
                    },
                    restoreButton:false,
                    onSuccess:function(data,textStatus,jqXHR)
                    {
                        if(data.action == 'delete')
                        {
                            $('#'+data.id).remove();
                        }
                    }
                });
            })

        });
        </script> --}}
@endsection
