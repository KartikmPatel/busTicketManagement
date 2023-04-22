@extends('Layouts.main')

@section('main-content')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title> Manage Station </title>
</head>
    <div class="ml-4 mt-3">
        <h2> Stations </h2>
        {{-- <button class="btn btn-outline-dark"> Add Bus</button> --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-dark btn-lg" data-toggle="modal" data-target="#modelId">
            Add Station
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
                                <label> Station I'd : </label>
                                <input type="text" class="form-control" name="staid" id="staid">
                                <span class="text-danger" id="staid-error">
                                </span>
                            </div>
                            <div class="form-group">
                                <label> Station Name : </label>
                                <input type="text" class="form-control" name="staname" id="staname">
                                <span class="text-danger" id="staname-error">
                                </span>
                            </div>
                            <button type="submit" class="btn btn-success mt-1" onclick="storeData();"> AddStation </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>

        <table class="table col-md-9 bg-secondary table-hover text-white" id="tblData">
            <thead class="thead-dark">
                <tr>
                    <th> Station I'd </th>
                    <th> Station Name </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($station as $s)
                    <tr>
                        <td class="sid">
                            {{ $s->stationID }}
                        </td>
                        <td class="sname">
                            {{ $s->stationName }}
                        </td>
                        <td class="tdAction">
                        <!-- href="{{url('editStation')}}/{{ $s->stationID }}"
                            <a class="btn btn-outline-warning"><i
                                class="fa fa-edit text-white" id="a1"></i></a>
                                <a href="{{ url('/deleteStation') }}/{{ $s->stationID }}" class="btn btn-outline-danger"><i
                                    class="fa fa-trash-can text-white"></i></a> -->
                            <button class='btn btn-success btn-sm btn-edit' ><i class="fa fa-edit text-white"></i></button>
                            <a href="{{ url('/deleteStation') }}/{{ $s->stationID }}" class='btn btn-danger btn-sm'> <i class="fa fa-trash-can text-white"></i> </a>
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
            var staid = $('#staid').val();
            var staname = $('#staname').val();

            $('#staid-error').addClass('d-none');
            $('#staname-error').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{ url('addStation') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    staid: staid,
                    staname: staname,
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
            //   var rowButtons ="<button class='btn btn-success btn-sm btn-edit' > Edit </button>  <button class='btn btn-danger btn-sm' > Delete </button> ";
        var rowUpdateButtons ="<a onclick='updateStation();'><button class='btn btn-success btn-sm btn-save' > Update </button></a>";

               $('#tblData').on('click', '.btn-edit', function () {
                const id =$(this).parent().parent().find(".sid").html();
                // var no = $(this).parent().parent().find(".bno").html();
                $(this).parent().parent().find(".sid").html("<input type='text' value='"+id.trim()+"' class='form-control txtsid' readonly/>");

                const name =$(this).parent().parent().find(".sname").html();
                $(this).parent().parent().find(".sname").html("<input type='text' value='"+name.trim()+"' class='form-control txtsname' />");


                $(this).parent().parent().find(".tdAction").html(rowUpdateButtons);

            });

            function updateStation() {
                var staid =$('.txtsid').val();
                var staname = $('.txtsname').val();

                $.ajax({
                    type:'POST',
                    url:"{{ url('updateStation/"+staid+"') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        staid: staid,
                        staname: staname
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