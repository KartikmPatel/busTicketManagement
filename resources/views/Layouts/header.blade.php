<!doctype html>
<html lang="en">
  <head>

    <!-- Bootstrap CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="jsFiles/aside.js"></script>
    <link rel="stylesheet" href="{{asset('app.css')}}">
    <link rel="stylesheet" href="{{asset('layoutstyle/aside.css')}}">
    <link rel="stylesheet" href="{{asset('layoutstyle/header.css')}}">
    <link rel="stylesheet" href="{{asset('adminStyle/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('adminStyle/seatStyle.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{asset('layoutstyle/Login.css')}}">
    <link rel="stylesheet" href="{{asset('layoutstyle/SignUp.css')}}">
    <link rel="stylesheet" href="{{asset('userStyle/searchBus.css')}}">
    <link rel="stylesheet" href="{{asset('userStyle/viewBus.css')}}">
</head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
        @if(session('username') == "Admin")
        <a class="navbar-brand"><span id="toggle-icon" class="navbar-toggler-icon" style="border:2px solid white"></span></a>
        @endif
        <a class="navbar-brand" href="/adminHome"><img src="images/bus.webp" height="50" width="60"></a>
        <a class="navbar-brand" href="/adminHome">Global Travels</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            @if(session('username') == "Admin")
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                 <li class="nav-item">
                    <a class="nav-link" href="/adminHome">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/manageBus">Manage Bus</a>
                </li>
            </ul>
            @else
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/adminHome">Home <span class="sr-only">(current)</span></a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="/"> Home </a>
                </li>
            </ul>
            @endif

            @if(!session('username'))
                <button type="button" class="btn btn-outline-success mx-2 my-2 my-sm-0" onclick="showform()">
                  Login
                </button>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="formshow()">Sign Up</button>
                @else
                {{-- <a href="{{url('logout')}}" class="btn btn-outline-success mx-2 my-2 my-sm-0">
                  Logout
                </a> --}}
                <img src="images/User-avatar.png" class="user-pic" onclick="toggleMenu()">
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="images/User-avatar.png">
                            {{-- <h2>Prem Patel</h2> --}}
                            <h3> {{session('username')}}</h3>
                        </div>
                        <hr>
                        <a href="#" class="sub-menu-link">
                            <img src="images/profile.png">
                            <p> Edit Profile </p>
                            <span> > </span>
                        </a>
                        <a href="#" class="sub-menu-link">
                            <img src="images/setting.png">
                            <p> Settings & Privacy </p>
                            <span> > </span>
                        </a>
                        <a href="#" class="sub-menu-link">
                            <img src="images/help.png">
                            <p> Help & Support </p>
                            <span> > </span>
                        </a>
                        <a href="{{url('logout')}}" class="sub-menu-link">
                            <img src="images/logout.png">
                            <p> Logout </p>
                            <span> > </span>
                        </a>
                    </div>
                </div>
                @endif
    </nav>

        <!-- Login -->
        <div class="overlay" onclick="hideform()"></div>
		<div class="container">
		<div class="screen">
			<div class="screen__content">
				<h2 onclick="hideform()">&times;</h2>
				<div class="login">
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" class="login__input" id="loginusername" placeholder="User name"><br>
                        <span class="text-danger" id="loginusername-error">
                        </span>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" id="loginpassword" placeholder="Password"><br>
                        <span class="text-danger" id="loginpassword-error">
                        </span>
					</div>
					<button class="button login__submit" id="logInbtn">
						<span class="button__text">Log In</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>
				</div>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4 bg-dark"></span>
				<span class="screen__background__shape screen__background__shape3 bg-dark"></span>
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>
		</div>
	</div>

         <!-- Sign Up -->
        <div class="overlay1" onclick="formhide()"></div>
		<div class="container-sign">
		<div class="screen1">
			<div class="screen__content1">
				<h2 onclick="formhide()">&times;</h2>
				<div class="login">
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" id="username"
                        class="login__input" placeholder="User name"><br>
                        <span class="text-danger" id="username-error">
                        </span>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" id="password" class="login__input" placeholder="Password"><br>
                        <span class="text-danger" id="password-error">
                        </span>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" id="cpassword" class="login__input" placeholder="Confirm Password">
                        <span class="text-danger" id="cpassword-error">
                        </span>
					</div>
					<button class="button login__submit" id="signUpBtn">
						<span class="button__text">Sign Up</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>
				</div>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>
		</div>
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }

    function showform()
    {
        document.querySelector('.overlay').classList.add('showoverlay');
        document.querySelector('.container').classList.add('open-container');
    }

    function hideform()
    {
        document.querySelector('.overlay').classList.remove('showoverlay');
        document.querySelector('.container').classList.remove('open-container');
    }
    function formshow()
    {
        document.querySelector('.overlay1').classList.add('showoverlay1');
        document.querySelector('.container-sign').classList.add('open-container-sign');
    }

    function formhide()
    {
        document.querySelector('.overlay1').classList.remove('showoverlay1');
        document.querySelector('.container-sign').classList.remove('open-container-sign');
    }

        $('#signUpBtn').on('click',function(){
            var username = $('#username').val();
            var password = $('#password').val();
            // var size = $('#size').val();
            var cpassword = $('#cpassword').val();
            $('#username-error').addClass('d-none');
            $('#password-error').addClass('d-none');
            $('#cpassword-error').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{ url('signUp') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    username: username,
                    password: password,
                    // size: size,
                    cpassword: cpassword
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
        })

        $('#logInbtn').on('click',function(){
            var loginusername = $('#loginusername').val();
            var loginpassword = $('#loginpassword').val();
            // var size = $('#size').val();
            $('#loginusername-error').addClass('d-none');
            $('#loginpassword-error').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{ url('login') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    loginusername: loginusername,
                    loginpassword: loginpassword
                },
                success: function(data) {
                    // setTimeout(function() {
                    //     location.reload();
                    // },50);

                    if(data == "adminLogin")
                    {
                        window.location.replace('/adminHome');
                    }

                    if(data == "userLogin")
                    {
                        window.location.replace('/');
                    }

                    if(data == "errorLogin")
                    {
                        alert('Invalid User Name Or Password');
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
        })

    </script>
  </body>
</html>

