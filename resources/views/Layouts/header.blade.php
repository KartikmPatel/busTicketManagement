<!doctype html>
<html lang="en">
  <head>
    <style>
        #preloader{
        background: #fff url(images/spinner.gif) no-repeat center ;
        background-size: 15%;
        width: 100%;
        height: 100vh;
        position: fixed;
        z-index: 100;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="jsFiles/aside.js"></script>
    <script src="jsFiles/preloader.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{asset('layoutstyle/aside.css')}}">
    <link rel="stylesheet" href="{{asset('layoutstyle/header.css')}}">
    <link rel="stylesheet" href="{{asset('adminStyle/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('adminStyle/seatStyle.css')}}">
    <link rel="stylesheet" href="{{asset('adminStyle/viewTable.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{asset('layoutstyle/Login.css')}}">
    <link rel="stylesheet" href="{{asset('layoutstyle/SignUp.css')}}">
    <link rel="stylesheet" href="{{asset('userStyle/searchBus.css')}}">
    <link rel="stylesheet" href="{{asset('userStyle/login.css')}}">
    <link rel="stylesheet" href="{{asset('userStyle/viewBus.css')}}">
    <link rel="stylesheet" href="{{asset('layoutstyle/profile.css')}}">
</head>
  <body>
  <div id="preloader"></div>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#33475b;">
        @if(session('username') == "Admin")
        <a class="navbar-brand"><span id="toggle-icon" class="navbar-toggler-icon" style="border:2px solid white"></span></a>
        <a class="navbar-brand" href="/adminHome"><img src="images/bus_logo.jpg" style="border-radius: 40%" height="50" width="60"></a>
        <a class="navbar-brand" href="/adminHome">Global Travels</a>
        @endif

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
            <a class="navbar-brand" href="/"><img src="images/bus_logo.jpg" style="border-radius: 40%" height="50" width="60"></a> 
            <a class="navbar-brand" href="/">Global Travels</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/adminHome">Home <span class="sr-only">(current)</span></a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="/"> {{__('home.home')}} </a>
                </li>
                @if(session('username'))
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/viewHistory')}}"> History </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/cancelTicket')}}"> Ticket Cancel </a>
                </li>
                @endif
            </ul>
            @endif

            @if(!session('username'))
                <a href="{{url('loginView')}}" class="btn btn-outline-success mx-2 my-2 my-sm-0">
                {{__('home.login')}}
                </a>
                <a href="{{url('signUpView')}}" class="btn btn-outline-success my-2 my-sm-0">{{__('home.signUp')}}</a>
                @else
                {{-- <a href="{{url('logout')}}" class="btn btn-outline-success mx-2 my-2 my-sm-0">
                {{__('home.logout')}}
                </a> --}}
                @if(session('userImage'))
                <img src="{{ asset(session('userImage')) }}" class="user-pic" onclick="toggleMenu()">
                @else
                <img src="images/User-avatar.png" class="user-pic" onclick="toggleMenu()">
                @endif
                @if(session('username') == 'Admin')
                <div class="sub-menu-wrap1" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            @if(session('userImage'))
                            <img src="{{asset(session('userImage'))}}">
                            @else
                            <img src="images/User-avatar.png">
                            @endif
                            {{-- <h2>Prem Patel</h2> --}}
                            <h3> {{session('username')}}</h3>
                        </div>
                        <hr>
                        <a href="{{url('viewProfile')}}" class="sub-menu-link">
                            <img src="images/profile.png">
                            <p> {{__('home.editProfile')}} </p>
                            <span> > </span>
                        </a>
                        <!-- <a href="#" class="sub-menu-link">
                            <img src="images/setting.png">
                            <p> {{__('home.s&p')}} </p>
                            <span> > </span>
                        </a> -->
                        <a href="{{url('changePassword')}}" class="sub-menu-link">
                            <img src="images/help.png">
                            <!-- <p> {{__('home.h&s')}} </p> -->
                            <p>Change Password</p>
                            <span> > </span>
                        </a>
                        <a href="{{url('logout')}}" class="sub-menu-link">
                            <img src="images/logout.png">
                            <p> {{__('home.logout')}} </p>
                            <span> > </span>
                        </a>
                    </div>
                </div>
                @else
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            @if(session('userImage'))
                            <img src="{{asset(session('userImage'))}}">
                            @else
                            <img src="images/User-avatar.png">
                            @endif
                            {{-- <h2>Prem Patel</h2> --}}
                            <h3> {{session('username')}}</h3>
                        </div>
                        <hr>
                        <a href="{{url('viewProfile')}}" class="sub-menu-link">
                            <img src="images/profile.png">
                            <p> {{__('home.editProfile')}} </p>
                            <span> > </span>
                        </a>
                        {{-- <a href="#" class="sub-menu-link">
                            <img src="images/setting.png">
                            <p> {{__('home.s&p')}} </p>
                            <span> > </span>
                        </a> --}}
                        <a href="{{url('changePassword')}}" class="sub-menu-link">
                            <img src="images/help.png">
                            <!-- <p> {{__('home.h&s')}} </p> -->
                            <p>Change Password</p>
                            <span> > </span>
                        </a>
                        <a href="{{url('logout')}}" class="sub-menu-link">
                            <img src="images/logout.png">
                            <p> {{__('home.logout')}} </p>
                            <span> > </span>
                        </a>
                    </div>
                </div>
                @endif
                @endif
    </nav>

        <!-- Login -->
        {{-- <div class="overlay" onclick="hideform()"></div>
		<div class="container">
		<div class="screen">
			<div class="screen__content">
				<h2 onclick="hideform()">&times;</h2>
				<div class="login">
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" class="login__input" id="loginusername" placeholder="{{__('home.username')}}"><br>
                        <span class="text-danger" id="loginusername-error">
                        </span>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" id="loginpassword" placeholder="{{__('home.password')}}"><br>
                        <span class="text-danger" id="loginpassword-error">
                        </span>
					</div>
					<button class="button login__submit" id="logInbtn">
						<span class="button__text">{{__('home.login')}}</span>
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
                <span class="text-danger" id="all-error">
                        </span>
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" id="username" class="login__input" placeholder="{{__('home.username')}}" oninput="validUsername()"><br>
                        <span class="text-danger" id="username-error">
                        </span>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" id="password" class="login__input" placeholder="{{__('home.password')}}" oninput="validPassword()"><br>
                        <span class="text-danger" id="password-error">
                        </span>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" id="cpassword" class="login__input" placeholder="{{__('home.cpassword')}}" oninput="validCpassword()">
                        <span class="text-danger" id="cpassword-error">
                        </span>
					</div>
					<button class="button login__submit" id="signUpBtn" onclick="checkValidate()">
						<span class="button__text">{{__('home.signUp')}}</span>
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
	</div> --}}

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

    // function showform()
    // {
    //     document.querySelector('.overlay').classList.add('showoverlay');
    //     document.querySelector('.container').classList.add('open-container');
    // }

    // function hideform()
    // {
    //     document.querySelector('.overlay').classList.remove('showoverlay');
    //     document.querySelector('.container').classList.remove('open-container');
    // }
    // function formshow()
    // {
    //     document.querySelector('.overlay1').classList.add('showoverlay1');
    //     document.querySelector('.container-sign').classList.add('open-container-sign');
    // }

    // function formhide()
    // {
    //     document.querySelector('.overlay1').classList.remove('showoverlay1');
    //     document.querySelector('.container-sign').classList.remove('open-container-sign');
    // }


    // function validUsername()
    // {
    //     var username = document.getElementById("username");
    //         let p = /^\D+$/;
    //         if(!p.test(username.value))
    //         {
    //             // document.getElementById("username-error").innerHTML="Please Enter Only character";
    //             document.getElementById("username-error").innerHTML="{{__('home.usernameError')}}";
    //     		document.getElementById("username-error").style.color="red";
    //     		document.getElementById("username-error").style.fontSize="15px";
    //     		username.focus();
    //     		return false;
    //         }
    //         else
    //         {
    //             document.getElementById("username-error").innerHTML="";
    //     		document.getElementById("username-error").style.color="";
    //     		document.getElementById("username-error").style.fontSize="";
    //         }
    //         return true;
    // }
    // function validPassword()
    // {
    //     var password = document.getElementById("password");
    //         let p = /^\D+[0-9]{4}$/;
    //         if(!p.test(password.value))
    //         {
    //             // document.getElementById("password-error").innerHTML="Please Enter Valid Password (patel@4040)";
    //             document.getElementById("password-error").innerHTML="{{__('home.passwordError')}}";
    //     		document.getElementById("password-error").style.color="red";
    //     		document.getElementById("password-error").style.fontSize="15px";
    //     		password.focus();
    //     		return false;
    //         }
    //         else
    //         {
    //             document.getElementById("password-error").innerHTML="";
    //     		document.getElementById("password-error").style.color="";
    //     		document.getElementById("password-error").style.fontSize="";
    //         }
    //         return true;
    // }
    // function validCpassword()
    // {
    //     var password = document.getElementById("password");
    //     var cpassword = document.getElementById("cpassword");
    //     if(password.value != cpassword.value)
    //     {

    //         // document.getElementById("cpassword-error").innerHTML="Passwords Must be Same";
    //         document.getElementById("cpassword-error").innerHTML="{{__('home.cpasswordError')}}";
    //         document.getElementById("cpassword-error").style.color="red";
    //         document.getElementById("cpassword-error").style.fontSize="15px";
    //         return false;
    //     }
    //     else
    //     {
    //         document.getElementById("cpassword-error").innerHTML="";
    //         document.getElementById("cpassword-error").style.color="";
    //         document.getElementById("cpassword-error").style.fontSize="";
    //     }
    //         return true;
    // }

    //     function checkValidate()
    //     {
    //       var username = document.getElementById("username");
    //       var password = document.getElementById("password");
    //       var cpassword = document.getElementById("cpassword");
    //     if(username.value.length == "" || password.value.length =="" || cpassword.value.length == "")
    //     {
    //         // document.getElementById("all-error").innerHTML="Please fill up the empty field";
    //         document.getElementById("all-error").innerHTML="{{__('home.allError')}}";
    //         document.getElementById("all-error").style.color="red";
    //         document.getElementById("all-error").style.fontSize="15px";
    //     }
    //     else
    //     {
    //         document.getElementById("all-error").innerHTML="";
    //         document.getElementById("all-error").style.color="";
    //         document.getElementById("all-error").style.fontSize="";
    //         if(validUsername() && validPassword() && validCpassword())
    //         {
    //             storedata()
    //         }
    //     }
    // }
    //     function storedata(){
    //         var username = $('#username').val();
    //         var password = $('#password').val();
    //         // var size = $('#size').val();
    //         var cpassword = $('#cpassword').val();
    //         // $('#username-error').addClass('d-none');
    //         // $('#password-error').addClass('d-none');
    //         // $('#cpassword-error').addClass('d-none');

    //         $.ajax({
    //             type: 'POST',
    //             url: "{{ url('signUp') }}",
    //             data: {
    //                 _token: '{{ csrf_token() }}',
    //                 username: username,
    //                 password: password,
    //                 // size: size,
    //                 cpassword: cpassword
    //             },
    //             success: function(data) {
    //                 // setTimeout(function() {
    //                 //     location.reload();
    //                 // },50);

    //                 if(data == "signupError")
    //                 {
    //                     alert('Username or Password already Exits!');
    //                 }

    //                 if(data == "signupDone")
    //                 {
    //                     window.location.replace('/');
    //                 }
    //             },
    //             error: function(data) {
    //                 var errors = data.responseJSON;
    //                 if ($.isEmptyObject(errors) == false) {
    //                     $.each(errors.errors, function(key, value) {
    //                         var ErrorID = '#' + key + '-error';
    //                         $(ErrorID).removeClass('d-none');
    //                         $(ErrorID).text(value);
    //                     })
    //                 }
    //             }
    //         })
    //     }

    //     $('#logInbtn').on('click',function(){
    //         var loginusername = $('#loginusername').val();
    //         var loginpassword = $('#loginpassword').val();
    //         // var size = $('#size').val();
    //         $('#loginusername-error').addClass('d-none');
    //         $('#loginpassword-error').addClass('d-none');

    //         $.ajax({
    //             type: 'POST',
    //             url: "{{ url('login') }}",
    //             data: {
    //                 _token: '{{ csrf_token() }}',
    //                 loginusername: loginusername,
    //                 loginpassword: loginpassword
    //             },
    //             success: function(data) {
    //                 // setTimeout(function() {
    //                 //     location.reload();
    //                 // },50);

    //                 if(data == "adminLogin")
    //                 {
    //                     window.location.replace('/adminHome');
    //                 }

    //                 if(data == "userLogin")
    //                 {
    //                     window.location.replace('/');
    //                 }

    //                 if(data == "errorLogin")
    //                 {
    //                     alert('Invalid User Name Or Password');
    //                 }
    //             },
    //             error: function(data) {
    //                 var errors = data.responseJSON;
    //                 if ($.isEmptyObject(errors) == false) {
    //                     $.each(errors.errors, function(key, value) {
    //                         var ErrorID = '#' + key + '-error';
    //                         $(ErrorID).removeClass('d-none');
    //                         $(ErrorID).text(value);
    //                     })
    //                 }
    //             }
    //         })
    //     })

    </script>
  </body>
</html>
