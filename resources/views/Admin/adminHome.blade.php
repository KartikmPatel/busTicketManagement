@extends('Layouts.main')

@section('main-content')

<div class="dashboard-card">
    <div class="card" style="width: 13rem;height: 16rem;background-color:rgb(203, 220, 184)">
        <img class="ml-5" src="images/bus_icon.png" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Buses</h5>
          <p class="card-text text-success">{{$busCount}} Available</p>
          <a class="btn btn-outline-primary" href="{{url('/manageBus')}}">View</a>
        </div>
    </div>
    <div class="card" style="width: 13rem;height: 16rem;background-color:rgb(235, 240, 176)">
        <img class="ml-5" src="images/route_icon.png" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Routes</h5>
          <p class="card-text text-success">Available</p>
          <a class="btn btn-outline-primary" href="#">View</a>
        </div>
    </div>
    <div class="card" style="width: 13rem;height: 16rem;background-color:rgb(183, 183, 171)">
        <img class="" src="images/busBooking_icon.png" style="margin-left:40px" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title booking-card">Bookings</h5>
          <p class="card-text text-success">Tickets</p>
          <a class="btn btn-outline-primary" href="#">View</a>
        </div>
    </div>
    <div class="card" style="width: 13rem;height: 16rem;background-color:rgb(242, 205, 163)">
        <img class="ml-5" src="images/payment_icon.png" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title payment-card">Payments</h5>
          <p class="card-text text-danger">Pending</p>
          <a class="btn btn-outline-primary" href="#">View</a>
        </div>
    </div>
</div>

<!-- <div class="container">
	<div class="screen">
		<div class="screen__content">
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

<div class="container">
	<div class="screen">
		<div class="screen__content">
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
</div> -->

@endsection
