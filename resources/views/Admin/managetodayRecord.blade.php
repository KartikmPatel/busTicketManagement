@extends('Layouts.main')

@section('main-content')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title> Booking </title>
</head>
<body onload="myFunction()">
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