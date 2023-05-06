<html>
  <head>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/> -->
     <style>
        body{
    margin: 0;
    padding: 0;
    background: #fff;
  }

  .download{
    margin-left: 65%;
    margin-top: 14%;
  }
  .down{
    cursor: pointer;
  }

  .box{
    position: absolute;
    top: calc(50% - 125px);
    top: -webkit-calc(50% - 125px);
    left: calc(50% - 300px);
    left: -webkit-calc(50% - 300px);
  }
  
  .ticket{
    width: 610px;
    height: 250px;
    background: #FFB300;
    border-radius: 3px;
    box-shadow: 0 0 100px #aaa;
    border-top: 1px solid #E89F3D;
    border-bottom: 1px solid #E89F3D;
  }
  
  .left{
    margin: 0;
    padding: 0;
    list-style: none;
    position: absolute;
    top: 0px;
    left: -5px;
  }
  
  .left li{
    width: 0px;
    height: 0px;
  }
  
  .left li:nth-child(-n+2){
    margin-top: 8px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-right: 5px solid #FFB300;
  }
  
  .left li:nth-child(3),
  .left li:nth-child(6){
    margin-top: 8px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-right: 5px solid #EEEEEE;
  }
  
  .left li:nth-child(4){
    margin-top: 8px;
    margin-left: 2px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-right: 5px solid #EEEEEE;
  }
  
  .left li:nth-child(5){
    margin-top: 8px;
    margin-left: -1px;
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent; 
    border-right: 6px solid #EEEEEE;
  }
  
  .left li:nth-child(7),
  .left li:nth-child(9),
  .left li:nth-child(11),
  .left li:nth-child(12){
    margin-top: 7px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-right: 5px solid #E5E5E5;
  }
  
  .left li:nth-child(8){
    margin-top: 7px;
    margin-left: 2px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-right: 5px solid #E5E5E5;
  }
  
  .left li:nth-child(10){
    margin-top: 7px;
    margin-left: 1px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-right: 5px solid #E5E5E5;
  }
  
  .left li:nth-child(13){
    margin-top: 7px;
    margin-left: 2px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-right: 5px solid #FFB300;
  }
  
  .left li:nth-child(14){
    margin-top: 7px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-right: 5px solid #FFB300;
  }
  
  .right{
    margin: 0;
    padding: 0;
    list-style: none;
    position: absolute;
    top: 0px;
    right: -5px;
  }
  
  .right li:nth-child(-n+2){
    margin-top: 8px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-left: 5px solid #FFB300;
  }
  
  .right li:nth-child(3),
  .right li:nth-child(4),
  .right li:nth-child(6){
    margin-top: 8px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-left: 5px solid #EEEEEE;
  }
  
  .right li:nth-child(5){
    margin-top: 8px;
    margin-left: -2px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-left: 5px solid #EEEEEE;
  }
  
  .right li:nth-child(8),
  .right li:nth-child(9),
  .right li:nth-child(11){
    margin-top: 7px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-left: 5px solid #E5E5E5;
  }
  
  .right li:nth-child(7){
    margin-top: 7px;
    margin-left: -3px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-left: 5px solid #E5E5E5;
  }
  
  .right li:nth-child(10){
    margin-top: 7px;
    margin-left: -2px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-left: 5px solid #E5E5E5;
  }
  
  .right li:nth-child(12){
    margin-top: 7px;
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent; 
    border-left: 6px solid #E5E5E5;
  }
  
  .right li:nth-child(13),
  .right li:nth-child(14){
    margin-top: 7px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent; 
    border-left: 5px solid #FFB300;
  }
  
  .ticket:after{
    content: '';
    position: absolute;
    right: 200px;
    top: 0px;
    width: 2px;
    height: 250px;
    box-shadow: inset 0 0 0 #FFB300,
      inset 0 -10px 0 #B56E0A,
      inset 0 -20px 0 #FFB300,
      inset 0 -30px 0 #B56E0A,
      inset 0 -40px 0 #FFB300,
      inset 0 -50px 0 #999999,
      inset 0 -60px 0 #E5E5E5,
      inset 0 -70px 0 #999999,
      inset 0 -80px 0 #E5E5E5,
      inset 0 -90px 0 #999999,
      inset 0 -100px 0 #E5E5E5,
      inset 0 -110px 0 #999999,
      inset 0 -120px 0 #E5E5E5,
      inset 0 -130px 0 #999999,
      inset 0 -140px 0 #E5E5E5,
      inset 0 -150px 0 #B0B0B0,
      inset 0 -160px 0 #EEEEEE,
      inset 0 -170px 0 #B0B0B0,
      inset 0 -180px 0 #EEEEEE,
      inset 0 -190px 0 #B0B0B0,
      inset 0 -200px 0 #EEEEEE,
      inset 0 -210px 0 #B0B0B0,
      inset 0 -220px 0 #FFB300,
      inset 0 -230px 0 #B56E0A,
      inset 0 -240px 0 #FFB300,
      inset 0 -250px 0 #B56E0A;
  }
  
  .ticket:before{
    content: '';
    position: absolute;
    z-index: 5;
    right: 199px;
    top: 0px;
    width: 1px;
    height: 250px;
    box-shadow: inset 0 0 0 #FFB300,
      inset 0 -10px 0 #F4D483,
      inset 0 -20px 0 #FFB300,
      inset 0 -30px 0 #F4D483,
      inset 0 -40px 0 #FFB300,
      inset 0 -50px 0 #FFFFFF,
      inset 0 -60px 0 #E5E5E5,
      inset 0 -70px 0 #FFFFFF,
      inset 0 -80px 0 #E5E5E5,
      inset 0 -90px 0 #FFFFFF,
      inset 0 -100px 0 #E5E5E5,
      inset 0 -110px 0 #FFFFFF,
      inset 0 -120px 0 #E5E5E5,
      inset 0 -130px 0 #FFFFFF,
      inset 0 -140px 0 #E5E5E5,
      inset 0 -150px 0 #FFFFFF,
      inset 0 -160px 0 #EEEEEE,
      inset 0 -170px 0 #FFFFFF,
      inset 0 -180px 0 #EEEEEE,
      inset 0 -190px 0 #FFFFFF,
      inset 0 -200px 0 #EEEEEE,
      inset 0 -210px 0 #FFFFFF,
      inset 0 -220px 0 #FFB300,
      inset 0 -230px 0 #F4D483,
      inset 0 -240px 0 #FFB300,
      inset 0 -250px 0 #F4D483;
  }
  
  .content{
    position: absolute;
    top: 40px;
    width: 100%;
    height: 170px;
    background: #eee;
  }
  
  .airline{
    position: absolute;
    top: 10px;
    left: 10px;
    font-family: Arial;
    font-size: 20px;
    font-weight: bold;
    color: rgba(0,0,102,1);
  }
  
  .boarding{
    position: absolute;
    top: 10px;
    right: 220px;
    font-family: Arial;
    font-size: 18px;
    color: rgba(255,255,255,0.6);
  }
  .fare{
    position: absolute;
    margin-top: 60px;
    margin-left: 350px;
    font-family: Arial;
    font-size: 18px;
    color: rgba(255,255,255,0.6);
  }
  
  .jfk{
    position: absolute;
    top: 10px;
    left: 20px;
    font-family: Arial;
    font-size: 38px;
    color: #222;
  }
  .jfk1{
    position: absolute;
    top: 10px;
    left: 125px;
    font-family: Arial;
    font-size: 38px;
    color: #222;
  }
  
  .sfo{
    position: absolute;
    top: 10px;
    left: 180px;
    font-family: Arial;
    font-size: 38px;
    color: #222;
  }
  
  .plane{
    position: absolute;
    left: 105px;
    top: 0px;
  }
  
  .sub-content{
    background: #e5e5e5;
    width: 100%;
    height: 100px;
    position: absolute;
    top: 70px;
  }
  
  .watermark{
    position: absolute;
    left: 5px;
    top: -10px;
    font-family: Arial;
    font-size: 110px;
    font-weight: bold;
    color: rgba(255,255,255,0.2);
  }
  
  .name{
    position: absolute;
    top: 10px;
    left: 10px;
    font-family: Arial Narrow, Arial;
    font-weight: bold;
    font-size: 14px;
    color: #999;
  }
  
  .name span{
    color: #555;
    font-size: 17px;
  }
  
  .flight{
    position: absolute;
    top: 10px;
    left: 180px;
    font-family: Arial Narrow, Arial;
    font-weight: bold;
    font-size: 14px;
    color: #999;
  }
  
  .flight span{
    color: #555;
    font-size: 17px;
  }
  
  .gate{
    position: absolute;
    top: 10px;
    left: 280px;
    font-family: Arial Narrow, Arial;
    font-weight: bold;
    font-size: 14px;
    color: #999;
  }
  
  .gate span{
    color: #555;
    font-size: 17px;
  }
  
  
  .seat{
    position: absolute;
    top: 10px;
    left: 350px;
    font-family: Arial Narrow, Arial;
    font-weight: bold;
    font-size: 14px;
    color: #999;
  }
  
  .seat span{
    color: #555;
    font-size: 17px;
  }
  
  .boardingtime{
    position: absolute;
    top: 60px;
    left: 10px;
    font-family: Arial Narrow, Arial;
    font-weight: bold;
    font-size: 14px;
    color: #999;
  }
  
  .boardingtime span{
    color: #555;
    font-size: 17px;
  }

  .fare{
    position: absolute;
    margin-top: 60px;
    margin-left: 350px;
    font-family: Arial Narrow, Arial;
    font-weight: bold;
    font-size: 14px;
    color: #999;
  }
  .fare span{
    color: #555;
    font-size: 17px;
  }

  .barcode{
    position: absolute;
    left: 8px;
    bottom: 6px;
    height: 30px;
    width: 90px;
    background: #222;
    box-shadow: inset 0 1px 0 #FFB300, inset -2px 0 0 #FFB300,
      inset -4px 0 0 #222,
      inset -5px 0 0 #FFB300,
      inset -6px 0 0 #222,
      inset -9px 0 0 #FFB300,
      inset -12px 0 0 #222,
      inset -13px 0 0 #FFB300,
      inset -14px 0 0 #222,
      inset -15px 0 0 #FFB300,
      inset -16px 0 0 #222,
      inset -17px 0 0 #FFB300,
      inset -19px 0 0 #222,
      inset -20px 0 0 #FFB300,
      inset -23px 0 0 #222,
      inset -25px 0 0 #FFB300,
      inset -26px 0 0 #222,
      inset -26px 0 0 #FFB300,
      inset -27px 0 0 #222,
      inset -30px 0 0 #FFB300,
      inset -31px 0 0 #222,
      inset -33px 0 0 #FFB300,
      inset -35px 0 0 #222,
      inset -37px 0 0 #FFB300,
      inset -40px 0 0 #222,
      inset -43px 0 0 #FFB300,
      inset -44px 0 0 #222,
      inset -45px 0 0 #FFB300,
      inset -46px 0 0 #222,
      inset -48px 0 0 #FFB300,
      inset -49px 0 0 #222,
      inset -50px 0 0 #FFB300,
      inset -52px 0 0 #222,
      inset -54px 0 0 #FFB300,
      inset -55px 0 0 #222,
      inset -57px 0 0 #FFB300,
      inset -59px 0 0 #222,
      inset -61px 0 0 #FFB300,
      inset -64px 0 0 #222,
      inset -66px 0 0 #FFB300,
      inset -67px 0 0 #222,
      inset -68px 0 0 #FFB300,
      inset -69px 0 0 #222,
      inset -71px 0 0 #FFB300,
      inset -72px 0 0 #222,
      inset -73px 0 0 #FFB300,
      inset -75px 0 0 #222,
      inset -77px 0 0 #FFB300,
      inset -80px 0 0 #222,
      inset -82px 0 0 #FFB300,
      inset -83px 0 0 #222,
      inset -84px 0 0 #FFB300,
      inset -86px 0 0 #222,
      inset -88px 0 0 #FFB300,
      inset -89px 0 0 #222,
      inset -90px 0 0 #FFB300;
  }
  
  .slip{
    left: 455px;
  }
  
  .nameslip{
    top: 60px;
    left: 410px;
  }
  
  .flightslip{
    left: 410px;
  }
  
  .seatslip{
    left: 540px;
  }
  
  .jfkslip{
    font-size: 30px;
    top: 20px;
    left: 410px;
  }

  .jfkslip1{
    font-size: 30px;
    top: 20px;
    left: 490px;
  }
  
  .sfoslip{
    font-size: 30px;
    top: 20px;
    left: 530px;
  }
  
  .planeslip{
    top: 10px;
    left: 475px;
  }
  
  .airlineslip{
    left: 455px;
  }
     </style>
  </head>
  <body>
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
        <span class="jfk">{{ $st1 }}</span>
        
        <!-- <span class="jfk1"><i class="fa fa-arrow-right"></i></span> -->
      
      
      <span class="sfo">{{ $st2 }}</span>

      
      <span class="jfk jfkslip">{{ $st1 }}</span>
      
      <!-- <span class="jfk jfkslip1"><i class="fa fa-arrow-right"></i></span> -->
      
        <span class="sfo sfoslip">{{ $st2 }}</span>

      <div class="sub-content">
        <span class="watermark">Global Travels</span>
        <span class="name">PASSENGER NAME<br><span>{{ $uname }}</span></span>
        <span class="flight">Bus No&deg;<br><span>{{ $bno }}</span></span>
        <span class="seat">SEAT<br><span>{{ $seatno }}</span></span>
        <span class="boardingtime">DEPARTURETIME<br><span>{{ $date }}</span></span>
        <span class="fare">FARE<br><span>{{ $fare }}</span></span>
        
         <span class="flight flightslip">Bus No&deg;<br><span>{{ $bno }}</span></span>
          <span class="seat seatslip">SEAT<br><span>{{ $seatno }}</span></span>
         <span class="name nameslip">PASSENGER NAME<br><span>{{ $uname }}</span></span>
      </div>
    </div>
  </div>
</div>
    </body>
</html>