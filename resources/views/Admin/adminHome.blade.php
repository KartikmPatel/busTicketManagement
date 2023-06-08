@extends('Layouts.main')

@section('main-content')
<head>
    <title>
        Dashboard
    </title>
</head>
<body onload="myFunction()">
<div class="dashboard-card">
    {{-- <div class="card" style="width: 13rem;height: 16rem;background-color:#D8BFD8">
        <img class="ml-5" src="images/new_icon.png" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Feedback</h5>
          <p class="card-text text-success">Available</p>
          <a class="btn btn-outline-primary" href="{{url('/manageFeedback')}}">View</a>
        </div>
    </div> --}}
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
          <p class="card-text text-success">{{$routeCount}} Available</p>
          <a class="btn btn-outline-primary" href="{{url('/manageRoute')}}">View</a>
        </div>
    </div>
    <div class="card" style="width: 13rem;height: 16rem;background-color:rgb(183, 183, 171)">
        <img class="" src="images/busBooking_icon.png" style="margin-left:40px" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title booking-card">Bookings</h5>
          <p class="card-text text-success">{{$bookingCount}} Tickets</p>
          <a class="btn btn-outline-primary" href="{{url('manageBooking')}}">View</a>
        </div>
    </div>
    <div class="card" style="width: 13rem;height: 16rem;background-color:rgb(242, 205, 163)">
        <img class="ml-5" src="images/stafflogo5.png" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title payment-card">Staffs</h5>
          <p class="card-text text-success">{{$staffCount}} Persons</p>
          <a class="btn btn-outline-primary" href="{{url('/manageStaff')}}">View</a>
        </div>
    </div>
	<div class="card" style="width: 13rem;height: 16rem;background-color:#ceebf9">
        <img class="ml-5" src="images1/mainfeed.png" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Feedback</h5>
          <p class="card-text text-success">{{$feedbackCount}} Feedback</p>
          <a class="btn btn-outline-primary" href="{{url('/manageFeedback')}}">View</a>
        </div>
    </div>
</div>

<br>
<center>
	<div style="border-top: 3px dashed black;font-Size:25px;font-weight:bold;">
		<font color="#FF2626">T</font>
        <font color="#252A34">o</font>
        <font color="#753422">d</font>
        <font color="#FFD523">a</font>
        <font color="#71EFA3">y</font>
        <font color="#0F52BA">'s</font>&nbsp;&nbsp;
        <font color="#66CC66">B</font>
        <font color="#FF9966">o</font>
        <font color="#FFCCCC">o</font>
        <font color="#00C1D4">k</font>
        <font color="#EFE3D0">i</font>
		<font color="#FF2626">n</font>
        <font color="#252A34">g</font>
		<font color="#71EFA3">s</font>
   </div>
</center>
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
<div>
        <form action="" class="form-inline" style="margin-left:32%;margin-top:30px;">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" value="{{ $search }}" aria-label="Search">
                <button class="btn btn-info my-2 my-sm-0">Search</button>
                <!-- <button type="button" class="btn btn-danger my-2 my-sm-0 ml-4" onclick="window.location.href='{{ url('/manageBooking') }}'">All Bookings</button> -->
            </form>
        </div>

        <div class="viewTable">
				<table class="content1-table1 col-md-7" id="tblData" style="margin-top:50px;margin-left:12%">
					<thead>
						<tr>
							<th></th>
							<th> ticket ID </th>
							<th> busNo </th>
							<th> userName </th>
							<th> seat No </th>
							<th> fare </th>
							<th> From </th>
							<th> To </th>
							<th> Date </th>
							<th> Time </th>
						</tr>
					</thead>
					<tbody>
						@foreach ($todayData as $today)
						<tr>
							<td>
								<img src="./images/new.jpg" width="70px" height="50px" alt=""/>
							</td>

							<td class="tid">
								{{ $today->ticketID }}
							</td>
							<td class="bno">
								{{ $today->busNo }}
							</td>

							@foreach($users as $user)
							@if($user->userID == $today->userID)
							<td class="uid">
								{{ $user->userName }}
							</td>
							@endif
							@endforeach

							<td class="sno">
								{{ $today->seatNo }}
							</td>
							<td class="fare">
								{{ $today->fare }}
							</td>
							<td class="from">
								{{ $today->from }}
							</td>
							<td class="to">
								{{ $today->to }}
							</td>
							<td class="date">
								{{ $today->date }}
							</td>
							<td class="time">
								{{ $today->time }}
							</td>
						</tr>
					@endforeach
	  </tbody>
	</table>
	</div>

	<br>
	<div style="margin-left:37%;">
		{{ $todayData->links() }}
	</div>

</body>

@endsection
