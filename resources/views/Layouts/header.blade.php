<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="jsFiles/aside.js"></script>
    <link rel="stylesheet" href="{{asset('app.css')}}">
    <link rel="stylesheet" href="{{asset('layoutstyle/aside.css')}}">
    <link rel="stylesheet" href="{{asset('adminStyle/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="jsFiles/aside.js"></script>
</head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand"><span id="toggle-icon" class="navbar-toggler-icon" style="border:2px solid white"></span></a>
        <a class="navbar-brand" href="#"><img src="images/bus.webp" height="50" width="60"></a>
        <a class="navbar-brand" href="#">Globle Travels</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage Bus</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-success mx-2 my-2 my-sm-0" data-toggle="modal" data-target="#modelId">
                  Login
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content bg-dark col-md-10">
                                <div class="modal-header">
                                        <h5 class="modal-title text-white"> Login </h5>
                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                            <div class="modal-body">
                                <div class="container-fluid text-white">
                                    Username 
                                    <input type="text" style="border-radius: 10px" name="username" placeholder="userName" class="mb-2"><br>
                                    Password 
                                    <input type="password" style="border-radius: 10px" name="password" placeholder="Password" class="ml-1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-primary">Login</button>
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

                {{-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button> --}}

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modelId2">
                  Sign Up
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content bg-dark col-md-10">
                                <div class="modal-header">
                                        <h5 class="modal-title text-white">SignUp</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                            <div class="modal-body">
                                <div class="container-fluid text-white">
                                    Username 
                                    <input type="text" style="border-radius: 10px" name="username" placeholder="userName" class="mb-2"><br>
                                    Password 
                                    <input type="password" style="border-radius: 10px" name="password" placeholder="Password" class="mb-2"><br>
                                    Confirm
                                    <input type="password" style="border-radius: 10px" name="cpassword" placeholder="Confirm" class="ml-1"><br>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save</button> --}}
                                <button type="submit" class="btn btn-outline-primary">Sign-Up</button>
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
            </form>
        </div>
    </nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

