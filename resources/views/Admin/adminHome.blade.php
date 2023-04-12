@extends('Layouts.main')

@section('main-content')

<div class="dashboard-card">
    <div class="card" style="width: 13rem;height: 15.5rem;background-color:rgb(203, 220, 184)">
        <img class="ml-5" src="images/bus_icon.png" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title ml-5">Buses</h5>
          <p class="card-text text-success ml-5">Available</p>
          <a class="btn btn-outline-primary ml-5" href="#">View</a>
        </div>
    </div>
    <div class="card" style="width: 13rem;height: 15.5rem;background-color:rgb(235, 240, 176)">
        <img class="ml-5" src="images/route_icon.png" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title ml-5">Routes</h5>
          <p class="card-text text-success ml-5">Available</p>
          <a class="btn btn-outline-primary ml-5" href="#">View</a>
        </div>
    </div>
    <div class="card" style="width: 13rem;height: 15.5rem;background-color:rgb(183, 183, 171)">
        <img class="" src="images/busBooking_icon.png" style="margin-left:40px" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title booking-card">Bookings</h5>
          <p class="card-text text-success ml-5">Tickets</p>
          <a class="btn btn-outline-primary ml-5" href="#">View</a>
        </div>
    </div>
    <div class="card" style="width: 13rem;height: 15.5rem;background-color:rgb(242, 205, 163)">
        <img class="ml-5" src="images/payment_icon.png" height="100" width="120" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title payment-card">Payments</h5>
          <p class="card-text text-danger ml-5">Pending</p>
          <a class="btn btn-outline-primary ml-5" href="#">View</a>
        </div>
    </div>
</div>


@endsection
