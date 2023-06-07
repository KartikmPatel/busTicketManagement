@extends('Layouts.main')

@section('main-content')

<html>
    <head>
        <title>Feedback</title>
    </head>
    <body onload="myFunction()">

<div class="viewTable mt-5 ml-5">
    <table class="content1-table1 col-md-7" id="tblData">
        <thead>
            <tr>
                <th></th>
                <th> Name </th>
                <th> Email </th>
                <th> Message </th>
                <th> Date </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedback as $f)
            <tr>
                <td>
                    <img src="./images1/feedback.jpg" width="70px" height="50px" alt=""/>
                </td>
                <td class="fname">
                    {{ $f->name }}
                </td>
                <td class="femail">
                    {{ $f->email }}
                </td>
                <td class="fmsg">
                    {{ $f->message }}
                </td>
                <td class="fdate">
                    {{ $f->curDate }}
                </td>
            </tr>
        @endforeach
</tbody>
</table>
</div>
<br>
<div style="margin-left:37%;">
    {{ $feedback->links() }}
</div>
    </body>
</html>
@endsection