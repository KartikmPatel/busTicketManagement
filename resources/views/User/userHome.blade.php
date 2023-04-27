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
<script>
    let a1=new Array("bus1.jpg","bus3.jpg","bus2.jpg","bus4.jpg");
            var c=0;
            setInterval(click1,2000);
            image.src="images1/"+a1[c];
		function click1()
		{
             c++;
             if(c==a1.length)
             c=0;
              image.src="images1/"+a1[c];
		}
</script>

<img src="./images1/bus1.jpg" id="image" width="100%" height="600px">
<!-- style="margin-left:auto;margin-right:auto;display:block;" -->
</body>
@endsection
