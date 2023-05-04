<html>
  <head>
    <link rel="stylesheet" href="{{asset('userStyle/viewTicket.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  </head>
  <body>
      <div class="download">
        <form action="{{ url('/downloadTicket') }}" method="post">
            @csrf
       @foreach($station as $s)
       @if($s->stationID == $from)
        <input type="hidden" name="sname1" id="sname1" value="{{ $s->stationName }}">
        @endif
        @endforeach

      @foreach($station as $s)
      @if($s->stationID == $to)
      <input type="hidden" name="sname2" id="sname2" value="{{ $s->stationName }}">
      @endif
      @endforeach
      
      <input type="hidden" name="uname" id="uname" value="{{ $uname }}">
      <input type="hidden" name="bno" id="bno" value="{{ $bno }}">
      <input type="hidden" name="seatno" id="seatno" value="{{ $seatno }}">
      <input type="hidden" name="date" id="date" value="{{$time}} ON {{$date}}">
      <input type="hidden" name="fare" id="fare" value="{{ $fare }}">

        <button type="submit" class='btn btn-warning down'><i class="fa fa-download" id="down" aria-hidden="true"></i></button>
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
    <span class="airline">Global Travels</span>
    <span class="airline airlineslip">Global Travels</span>
    <div class="content">
    @foreach($station as $s)
      @if($s->stationID == $from)
        <span class="jfk">{{ $s->stationName }}</span>
        @endif
        @endforeach
        
        <span class="jfk1"><i class="fa fa-arrow-right"></i></span>
      
      @foreach($station as $s)
      @if($s->stationID == $to)
      <span class="sfo">{{ $s->stationName }}</span>
      @endif
      @endforeach
      
      @foreach($station as $s)
      @if($s->stationID == $from)
      <span class="jfk jfkslip">{{ $s->stationName }}</span>
      @endif
      @endforeach
      
      <span class="jfk jfkslip1"><i class="fa fa-arrow-right"></i></span>
      
      @foreach($station as $s)
      @if($s->stationID == $to)
        <span class="sfo sfoslip">{{ $s->stationName }}</span>
      @endif
      @endforeach

      <div class="sub-content">
        <span class="watermark">Global Travels</span>
        <span class="name">PASSENGER NAME<br><span>{{ $uname }}</span></span>
        <span class="flight">Bus No&deg;<br><span>{{ $bno }}</span></span>
        <span class="seat">SEAT<br><span>{{ $seatno }}</span></span>
        <span class="boardingtime">DEPARTURETIME<br><span>{{$time}} ON {{$date}}</span></span>
        <span class="fare">FARE<br><span>{{ $fare }}</span></span>
            
         <span class="flight flightslip">Bus No&deg;<br><span>{{ $bno }}</span></span>
          <span class="seat seatslip">SEAT<br><span>{{ $seatno }}</span></span>
         <span class="name nameslip">PASSENGER NAME<br><span>{{ $uname }}</span></span>
      </div>
    </div>
    <div class="barcode"></div>
    <div class="barcode slip"></div>
  </div>
</div>
    </body>
</html>