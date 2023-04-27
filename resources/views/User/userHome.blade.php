@extends('Layouts.mainUser')

@section('Usermain-content')

<body class="bg-white">
    @if (Session()->has('success'))
         <div class="alert alert-success alert-dismissible successAlert" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session()->get('success') }}
        </div>
    @endif
<p class="text-dark"> User Home </p>
</body>
@endsection
