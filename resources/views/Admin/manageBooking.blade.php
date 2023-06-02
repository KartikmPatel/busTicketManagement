@extends('Layouts.main')

@section('main-content')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title> Booking </title>
</head>
<body onload="myFunction()">
        <!-- <table class="table col-md-9 bg-secondary table-hover text-white" id="tblData">
            <thead class="thead-dark">
                <tr>
                    <th> ticket ID </th>
                    <th> busNo </th>
                    <th> user ID </th>
                    <th> seat No </th>
                    <th> fare </th>
                    <th> From </th>
                    <th> To </th>
                    <th> Date </th>
                    <th> Time </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td class="tid">
                            {{ $ticket->ticketID }}
                        </td>
                        <td class="bno">
                            {{ $ticket->busNo }}
                        </td>
                        <td class="uid">
                            {{ $ticket->userID }}
                        </td>
                        <td class="sno">
                            {{ $ticket->seatNo }}
                        </td>
                        <td class="fare">
                            {{ $ticket->fare }}
                        </td>
                        <td class="from">
                            {{ $ticket->from }}
                        </td>
                        <td class="to">
                            {{ $ticket->to }}
                        </td>
                        <td class="date">
                            {{ $ticket->date }}
                        </td>
                        <td class="time">
                            {{ $ticket->time }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> -->

        <div>
            <form action="" class="form-inline" style="margin-left:32%;margin-top:30px;">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" value="{{ $search }}" aria-label="Search">
                <button class="btn btn-info my-2 my-sm-0">Search</button>
                <button type="button" class="btn btn-danger my-2 my-sm-0 ml-4" onclick="window.location.href='{{ url('/manageBooking') }}'">All Bookings</button>
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
                    @foreach ($tickets as $ticket)
                    <tr>
                        <td>
                            <img src="./images/booking.webp" width="70px" height="50px" alt=""/>
                        </td>
                        
                        <td class="tid">
                            {{ $ticket->ticketID }}
                        </td>
                        <td class="bno">
                            {{ $ticket->busNo }}
                        </td>

                        @foreach($users as $user)
                        @if($user->userID == $ticket->userID)
                        <td class="uid">
                            {{ $user->userName }}
                        </td>
                        @endif
                        @endforeach

                        <td class="sno">
                            {{ $ticket->seatNo }}
                        </td>
                        <td class="fare">
                            {{ $ticket->fare }}
                        </td>
                        <td class="from">
                            {{ $ticket->from }}
                        </td>
                        <td class="to">
                            {{ $ticket->to }}
                        </td>
                        <td class="date">
                            {{ $ticket->date }}
                        </td>
                        <td class="time">
                            {{ $ticket->time }}
                        </td>
                    </tr>
                @endforeach
  </tbody>
</table>
</div>

<br>
<div style="margin-left:37%;">
    {{ $tickets->links() }}
</div>
</body>
@endsection