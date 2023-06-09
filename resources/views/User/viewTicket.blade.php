<html>
  <head>
    <link rel="stylesheet" href="{{asset('userStyle/viewTicket.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="jsFiles/preloader.js"></script>
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
    <title>
        Ticket
    </title>
  </head>
  <body onload="myFunction()">
  <div id="preloader"></div>

      <div class="download">
        <form action="{{ url('/downloadTicket') }}" method="post">
            @csrf
       {{-- @foreach($station as $s)
       @if($s->stationName == $from)
       @endif
       @endforeach --}}
       <input type="hidden" name="sname1" id="sname1" value="{{ $from }}">

      {{-- @foreach($station as $s)
      @if($s->stationName == $to)
      @endif
      @endforeach --}}
      <input type="hidden" name="sname2" id="sname2" value="{{ $to }}">

      <input type="hidden" name="uname" id="uname" value="{{ $uname }}">
      <input type="hidden" name="bno" id="bno" value="{{ $bno }}">
      <input type="hidden" name="seatno" id="seatno" value="{{ $seatno }}">
      <input type="hidden" name="date" id="date" value="{{$time}} ON {{$date}}">
      <!-- @foreach($ticket as $t)
        @if($t->busNo == $bno && $t->seatNo == $seatno && $t->date == $date)
          <span class="ticketID">Ticket Id<br><span>{{ $t->ticketID }}</span></span>
          <input type="hidden" name="ticketID" id="ticketID" value="{{ $t->ticketID }}">
        @endif
        @endforeach -->
      <!-- <input type="hidden" name="fare" id="fare" value="{{ $fare }}"> -->

        <button type="submit" class='btn btn-info down'><i class="fa fa-download" id="down" aria-hidden="true"></i></button>
      </form>
    </div>

    <div class="box">
  <ul class="left">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>

  <ul class="right">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
  <div class="ticket">
    <span class="airline">{{__('home.name')}}</span>
    <span class="airline airlineslip">{{__('home.name')}}</span>
    <div class="content">
    {{-- @foreach($station as $s)
      @if($s->stationName == $from)
      @endif
      @endforeach --}}
      <span class="jfk">{{ $from }}</span>

        <span class="jfk1"><i class="fa fa-arrow-right"></i></span>

      {{-- @foreach($station as $s)
      @if($s->stationName == $to)
      @endif
      @endforeach --}}
      <span class="sfo">{{ $to }}</span>

      {{-- @foreach($station as $s)
      @if($s->stationID == $from)
      @endif
      @endforeach --}}
      <span class="jfk jfkslip">{{ $from }}</span>

      <span class="jfk jfkslip1"><i class="fa fa-arrow-right"></i></span>

      {{-- @foreach($station as $s)
      @if($s->stationID == $to)
      @endif
      @endforeach --}}
      <span class="sfo sfoslip">{{ $to }}</span>


      <div class="sub-content">
        <span class="watermark">{{__('home.name')}}</span>
        <span class="name">{{__('home.passenger')}}<br><span>{{ $uname }}</span></span>
        <span class="flight">{{__('home.bno')}}&deg;<br><span>{{ $bno }}</span></span>
        <span class="seat">{{__('home.sNo')}}<br><span>{{ $seatno }}</span></span>
        <span class="boardingtime">{{__('home.dTime')}}<br><span>{{$time}} ON {{$date}}</span></span>
        <!-- @foreach($ticket as $t)
        @if($t->busNo == $bno && $t->seatNo == $seatno && $t->date == $date)
          <span class="ticketID">Ticket Id<br><span>{{ $t->ticketID }}</span></span>
        @endif
        @endforeach -->
        <!-- <span class="fare">{{__('home.fare')}}<br><span>{{ $fare }}</span></span> -->

         <span class="flight flightslip">{{__('home.bno')}}&deg;<br><span>{{ $bno }}</span></span>
          <span class="seat seatslip">{{__('home.sNo')}}<br><span>{{ $seatno }}</span></span>
         <span class="name nameslip">{{__('home.passenger')}}<br><span>{{ $uname }}</span></span>
      </div>
    </div>
    <div class="barcode"></div>
    <div class="barcode slip"></div>
  </div>
</div>

    <a href="{{url('/')}}"><button class="btn btn-success" style="margin-left:30%;cursor:pointer;margin-top:-55px;"><i class="fa fa-home" aria-hidden="true"></i></button></a>
    </body>
</html>
