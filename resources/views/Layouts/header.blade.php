<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="jsFiles/aside.js"></script>
    <link rel="stylesheet" href="{{asset('app.css')}}">
    <link rel="stylesheet" href="{{asset('layoutstyle/aside.css')}}">
    <link rel="stylesheet" href="{{asset('adminStyle/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('layoutstyle/Login.css')}}">
    <link rel="stylesheet" href="{{asset('layoutstyle/SignUp.css')}}">
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

                <button type="button" class="btn btn-outline-success mx-2 my-2 my-sm-0" onclick="showform()">
                  Login
                </button>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="formshow()">Sign Up</button>
    </nav>

        <!-- Login -->
        <div class="overlay" onclick="hideform()"></div>
		<div class="container">
		<div class="screen">
			<div class="screen__content">
				<h2 onclick="hideform()">&times;</h2>
				<form class="login">
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" class="login__input" placeholder="User name / Email">
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" placeholder="Password">
					</div>
					<button class="button login__submit">
						<span class="button__text">Log In</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>				
				</form>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>		
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>		
		</div>
	</div>

    <script>
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
    </script>
        
         <!-- Sign Up -->
        <div class="overlay1" onclick="formhide()"></div>
		<div class="container-sign">
		<div class="screen1">
			<div class="screen__content1">
				<h2 onclick="formhide()">&times;</h2>
				<form class="login">
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" class="login__input" placeholder="User name / Email">
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" placeholder="Password">
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" placeholder="Confirm Password">
					</div>
					<button class="button login__submit">
						<span class="button__text">Sign Up</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>				
				</form>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>		
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>		
		</div>
	</div>

    <script>
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
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

