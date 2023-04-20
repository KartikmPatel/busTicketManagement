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
      <div id="aside">
        <span><i class="fa fa-bus"></i><a href="{{url('/manageBus')}}" class="c1"> Manage Buses </a></span><br><br/>
        <span><i class="fa fa-route"></i><a href="{{url('/manageRoute')}}" class="c1"> Manage Route</a></span><br><br/>
        <span><i class="fa fa-ticket"></i><a href="" class="c1"> SMS Ticket</a></span><br><br/>
        <span><i class="fa fa-money-check"></i><a href="" class="c1"> Payments</a></span><br><br/>
      </div>
    </div>
  </body>
</html>
