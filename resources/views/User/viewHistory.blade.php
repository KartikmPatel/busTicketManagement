@extends('Layouts.main')

@section('Usermain-content')

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <title> </title>
    </head>

    <body class="bg-white" onload="myFunction()">
        <div class="ml-4 mt-3">
            <!-- <table class="table">
                <thead>
                    <tr>
                        <th>Busno </th>
                        <th> Source </th>
                        <th> Destination </th>
                        <th> Seat No </th>
                        <th> Date </th>
                        <th> Time </th>
                        <th> Fare </th>
                        <th> Status </th>
                        <th> View Ticket </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historys as $h)
                    <tr>
                            <td>
                                {{ $h->busNo }}
                            </td>
                            <td>
                                {{ $h->Source }}
                            </td>
                            <td>
                                {{ $h->Destination }}
                            </td>
                            <td>
                                {{ $h->seatNo }}
                            </td>
                            <td>
                                {{ $h->busDate }}
                            </td>
                            <td>
                                {{ $h->busTime }}
                            </td>
                            <td>
                                {{ $h->fare }}
                            </td>
                            @if ($h->Status == 'Successful')
                            <td class="text-success" style="font-weight:bold;">
                                {{ $h->Status }}
                            </td>
                            @else
                                <td class="text-danger" style="font-weight:bold;">
                                    {{ $h->Status }}
                                </td>
                                @endif

                                @foreach($ticket as $t)
                                @if($h->busDate >= $curDate && $h->Status == "Successful" && $h->busNo == $t->busNo && $h->seatNo == $t->seatNo && $h->busDate == $t->date)
                                <td class="row">
                                    <form action="{{url('showTicket')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="from" id="from" value="{{ $t->from }}">
                                        <input type="hidden" name="to" id="to" value="{{ $t->to }}">
                                        <input type="hidden" name="bno" id="bno" value="{{ $t->busNo }}">
                                        <input type="hidden" name="seatno" id="seatno" value="{{ $t->seatNo }}">
                                        <input type="hidden" name="date" id="date" value="{{ $t->date }}">
                                        <input type="hidden" name="time" id="time" value="{{ $t->time }}">
                                        <input type="hidden" name="tid" id="tid" value="{{ $t->ticketID }}">
                                        <input type="hidden" name="fare" id="fare" value="{{ $t->fare }}">

                                        <button class='btn btn-warning btn-sm'><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    </form>

                                    @if($h->busDate > $curDate && $h->Status == "Successful" && $h->busNo == $t->busNo && $h->seatNo == $t->seatNo && $h->busDate == $t->date)
                                    <form action="ticketCancel2" method="post">
                                        @csrf
                                        <input type="hidden" name="ticketID" id="ticketID" value="{{ $t->ticketID }}">
                                        <button tyep="submit" class="btn btn-danger ml-3 btn-sm" onclick="cancelTicket()"> Cancel Ticket</button>
                                    </form>
                                    @endif
                              </td>
                              @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table> -->

            <div class="viewBus">
    <table class="content-table col-md-7" style="min-width:1200px;margin-left:10%">
  <thead>
    <tr>
            <th></th>
            <th>Busno </th>
            <th> Source </th>
            <th> Destination </th>
            <th> Seat No </th>
            <th> Date </th>
            <th> Time </th>
            <th> Fare </th>
            <th> Status </th>
            <th> View Ticket </th>
    </tr>
  </thead>
  <tbody>
      @foreach ($historys as $h)
      <tr>
                        <td>
                            <img src="./images/history.jpg" width="70px" height="50px" alt=""/>
                        </td>
                            <td>
                                {{ $h->busNo }}
                            </td>
                            <td>
                                {{ $h->Source }}
                            </td>
                            <td>
                                {{ $h->Destination }}
                            </td>
                            <td>
                                {{ $h->seatNo }}
                            </td>
                            <td>
                                {{ $h->busDate }}
                            </td>
                            <td>
                                {{ $h->busTime }}
                            </td>
                            <td>
                                {{ $h->fare }}
                            </td>
                            @if ($h->Status == 'Successful')
                            <td class="text-success" style="font-weight:bold;">
                                {{ $h->Status }}
                            </td>
                            @else
                                <td class="text-danger" style="font-weight:bold;">
                                    {{ $h->Status }}
                                </td>
                                @endif

                                @foreach($ticket as $t)
                                @if($h->busDate >= $curDate && $h->Status == "Successful" && $h->busNo == $t->busNo && $h->seatNo == $t->seatNo && $h->busDate == $t->date)
                                <td class="row">
                                    <form action="{{url('showTicket')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="from" id="from" value="{{ $t->from }}">
                                        <input type="hidden" name="to" id="to" value="{{ $t->to }}">
                                        <input type="hidden" name="bno" id="bno" value="{{ $t->busNo }}">
                                        <input type="hidden" name="seatno" id="seatno" value="{{ $t->seatNo }}">
                                        <input type="hidden" name="date" id="date" value="{{ $t->date }}">
                                        <input type="hidden" name="time" id="time" value="{{ $t->time }}">
                                        <input type="hidden" name="tid" id="tid" value="{{ $t->ticketID }}">
                                        <input type="hidden" name="fare" id="fare" value="{{ $t->fare }}">

                                        <button class='btn btn-warning btn-sm'><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    </form>

                                    @if($h->busDate > $curDate && $h->Status == "Successful" && $h->busNo == $t->busNo && $h->seatNo == $t->seatNo && $h->busDate == $t->date)
                                    <form action="ticketCancel2" method="post">
                                        @csrf
                                        <input type="hidden" name="ticketID" id="ticketID" value="{{ $t->ticketID }}">
                                        <button tyep="submit" class="btn btn-danger ml-3 btn-sm" onclick="cancelTicket()"> Cancel Ticket</button>
                                    </form>
                                    @endif
                              </td>
                              @endif
                            @endforeach
                        </tr>
                    @endforeach
  </tbody>
</table>
    </div>

    <br>
<div style="margin-left:40%;margin-top:-100px;">
    {{ $historys->links() }}
</div>
        </div>
        <script>
            function cancelTicket(){
                alert('Your Ticket Has Been Canceled Successfully');
            }
            </script>
    </body>
@endsection
