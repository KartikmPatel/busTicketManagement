@extends('Layouts.main')

@section('main-content')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title> Booking </title>
</head>
<body>
        <!-- <table class="table col-md-9 bg-secondary table-hover text-white" id="tblData">
            <thead class="thead-dark">
                <tr>
                    <th> Cancel ID </th>
                    <th>Busno </th>
                    <th>User ID </th>
                    <th> Source </th>
                    <th> Destination </th>
                    <th> Seat No </th>
                    <th> Date </th>
                    <th> Time </th>
                    <th> Fare </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ticket as $t)
                <tr>
                    <td>
                        {{$t->cancelID}}
                    </td>
                    <td>
                        {{$t->busNo}}
                    </td>
                    <td>
                        {{$t->userID}}
                    </td>
                    <td>
                        {{$t->Source}}
                    </td>
                    <td>
                        {{$t->Destination}}
                    </td>
                    
                    <td class="text-danger" style="font-weight:bold;">
                        {{ $t->Status }}
                    </td>

                    <td>
                        {{$t->seatNo}}
                    </td>
                    <td>
                        {{$t->busDate}}
                    </td>
                    <td>
                        {{$t->busTime}}
                    </td>
                    <td>
                        {{$t->fare}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> -->

        
        <div class="viewTable">
            <table class="content1-table1 col-md-7" id="tblData" style="margin-top:50px;margin-left:12%">
                <thead>
                    <tr>
                        <th></th>
                        <th> Cancel ID </th>
                        <th>Busno </th>
                        <th>User ID </th>
                        <th> Source </th>
                        <th> Destination </th>
                        <th> Status </th>
                        <th> Seat No </th>
                        <th> Date </th>
                        <th> Time </th>
                        <th> Fare </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($ticket as $t)
                <tr>
                    <td>
                        <img src="./images/cancelTicket.jpg" width="70px" height="50px" alt=""/>
                    </td>
                    <td>
                        {{$t->cancelID}}
                    </td>
                    <td>
                        {{$t->busNo}}
                    </td>
                    <td>
                        {{$t->userID}}
                    </td>
                    <td>
                        {{$t->Source}}
                    </td>
                    <td>
                        {{$t->Destination}}
                    </td>
                    
                    <td class="text-danger" style="font-weight:bold;">
                        {{ $t->Status }}
                    </td>

                    <td>
                        {{$t->seatNo}}
                    </td>
                    <td>
                        {{$t->busDate}}
                    </td>
                    <td>
                        {{$t->busTime}}
                    </td>
                    <td>
                        {{$t->fare}}
                    </td>
                </tr>
                @endforeach
  </tbody>
</table>
    </div>

<br>
<div style="margin-left:37%;">
    {{ $ticket->links() }}
</div>

</body>
@endsection