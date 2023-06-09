<!doctype html>
<html lang="en">
  <head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- jQuery CDN Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('layoutstyle/aside.css')}}">
    <script src="jsFiles/aside.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <div class="asi">
      {{-- <div id="aside">
        <span><i class="fa fa-bus"></i><a href="{{url('/manageBus')}}" class="c1"> Buses </a></span><br><br/>
        <span><i class="fa fa-route"></i><a href="{{url('/manageRoute')}}" class="c1"> Routes</a></span><br><br/>
        <span><i class="fas fa-playstation"></i><a href="{{url('/adminSeats')}}" class="c1"> Seats </a></span><br><br/>
        <span><i class="fab fa-playstation"></i><a href="{{url('/manageStation')}}" class="c1"> Stations</a></span><br><br/>
        <span><i class="fa fa-people-group"></i><a href="{{url('/manageStaff')}}" class="c1"> Staffs</a></span><br><br/>
        <span><i class="fa fa-ticket-simple"></i><a href="{{url('/manageCancelTicket')}}" class="c1"> Cancel Ticket</a></span><br><br/>
        <span><i class="fa fa-ticket"></i><a href="{{url('manageBooking')}}" class="c1"> Bookings </a></span><br><br/>
      </div> --}}

      <div class="sidebar">
        <header class="header" style="background-color: #4584B4;"> Admin side </header>
        <ul>
            <li><a href="{{url('/manageBus')}}"><i class="fa fa-bus"></i>Buses</a></li>
            <li><a href="{{url('/manageRoute')}}"><i class="fa fa-route"></i>Routes</a></li>
            <li><a href="{{url('/adminSeats')}}"><i class="fas fa-playstation"></i>Seats</a></li>
            <li><a href="{{url('/manageStation')}}"><i class="fab fa-playstation"></i>Stations</a></li>
            <li><a href="{{url('/manageStaff')}}"><i class="fa fa-people-group"></i>Staffs</a></li>
            <li><a href="{{url('/manageCancelTicket')}}"><i class="fa fa-rectangle-xmark"></i>Cancel Ticket</a></li>
            <li><a href="{{url('manageBooking')}}"><i class="fa fa-ticket"></i>Bookings</a></li>
        </ul>
      </div>
    </div>
  </body>
</html>
