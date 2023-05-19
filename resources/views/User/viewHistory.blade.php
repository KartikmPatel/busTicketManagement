@extends('Layouts.main')

@section('Usermain-content')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title> </title>
</head>
<body class="bg-white">
<div class="ml-4 mt-3">
    <table class="table">
        <thead>
            <tr>
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
            @foreach ($historys as $h)
            <tr>
            <td>
                {{$h->busNo}}
            </td>
            <td>
                {{$h->userID}}
            </td>
            <td>
                {{$h->Source}}
            </td>
            <td>
                {{$h->Destination}}
            </td>
            <td>
                {{$h->seatNo}}
            </td>
            <td>
                {{$h->busDate}}
            </td>
            <td>
                {{$h->busTime}}
            </td>
            <td>
                {{$h->fare}}
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
@endsection
