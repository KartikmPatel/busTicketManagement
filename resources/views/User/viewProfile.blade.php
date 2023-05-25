@extends('Layouts.main')

@if($user->userName == "Admin")
@section('main-content')
@else
@section('Usermain-content')
@endif
<body class="bg-white">
    <div class="profileContainer col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
              {{-- <h3 class="panel-title">User Profile</h3> --}}
            </div>
       <!-- Panel-Body -->
            <div class="panel-body">
              <div class="row profile-info">
                <div class="image" align="center">
                    @if($user->image)
                      <img src="{{ asset($user->image) }}" alt="User image" class="image-profile" data-toggle="modal" data-target="#modelId1">
                      @elseif($user->image == NULL)
                      <img src="images/User-avatar.png" alt="User image" class="image-profile" data-toggle="modal" data-target="#modelId1">                      
                      @else
                  <img src="images/User-avatar.png" alt="User image" class="image-profile" data-toggle="modal" data-target="#modelId1">
                  @endif

                  <!-- Modal -->
                  <div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title">Edit Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form action="{{url('editImage')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="form-group">
                                        <h3> Choose Profile Image </h3>
                                      <input type="file"
                                        class="form-control" name="image" id="image" aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
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
                  </script>
                </div><!-- /.col-xs-12 -->
        <!-- User Information -->
                <div class="ml-5">
                  <h2 class="ml-3" style="margin-top: 10px;">{{$user->userName}}</h2>
                  <div class="table-responsive">
                    <table class="table table-responsive table-user-information">
                      <tbody>
                        <tr>
                          <td>
                            <strong>
                              <span class="fa fa-home"></span>
                            </strong>
                          </td>
                          @if($user->city)
                          <td class="text-primary">
                            {{$user->city}}
                          </td>
                          @else
                          <td class="text-primary">
                           ---
                          </td>
                          @endif

                        </tr><!--/home -->
                        <tr>
                           <td>
                            <strong>
                                <span class="fa-sharp fa-solid fa-envelope"></span>
                            </strong>
                          </td>
                          @if($user->email)
                          <td class="text-primary">
                           {{$user->email}}
                          </td>
                          @else
                          <td class="text-primary">
                           ---
                          </td>
                          @endif
                        </tr><!--/email -->
                        <tr>
                           <td>
                            <strong>
                                <span class="fa-solid fa-mobile"></span>
                            </strong>
                          </td>
                          @if($user->mobileNo)
                          <td class="text-primary">
                           {{$user->mobileNo}}
                          </td>
                          @else
                          <td class="text-primary">
                           ---
                          </td>
                          @endif
                        </tr><!--/Mobile No -->

                      </tbody>
                    </table>
                    </div> <!-- /.table-responsive -->
        <!-- Social Buttons -->
                    <div class="button-group">
                      <button class="btn">
                         <a href="#" class="social-icon si-border si-border-round">
                       <i class="fa-brands fa-github"></i></a></button>
            <button class="btn"><a href="#" class="social-icon si-border si-border-round">
                      <i class="fa-brands fa-google-plus-g"></i>
                  </a></button>
                      <button class="btn"><a href="#" class="social-icon si-border si-border-round">
                        <i class="fa-brands fa-linkedin-in"></i>
                  </a></button>
              <button class="btn"><a href="#" class="social-icon si-border si-border-round">
                    <i class="fa-brands fa-facebook"></i>
                  </a></button>

        </div><!-- /.button-group -->

    </div><!-- /.col-xs-12 -->
    <div class="edit-button">
        <button class="btn btn-outline-dark" data-toggle="modal" data-target="#modelId"><i class="fa fa-edit"></i></button>
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Edit Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="{{url('editProfile')}}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for=""> User Name :- </label>
                                        <input type="text" name="username" id="username" class="form-control" value="{{$user->userName}}" aria-describedby="helpId">
                                        <label for=""> City :- </label>
                                        <input type="text" name="city" id="city" class="form-control" value="{{$user->city}}" aria-describedby="helpId">
                                        <label for=""> Email :- </label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}" aria-describedby="helpId">
                                        <label for=""> Mobile No :- </label>
                                        <input type="text" name="mobileno" id="mobileno" class="form-control" value="{{$user->mobileNo}}" aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
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
        </script>
        </div>
              </div><!-- /.row -->
            </div><!-- /.panel-body -->
          </div><!-- /.panel panel-info -->
      </div><!-- /.container -->
</body>
@endsection
