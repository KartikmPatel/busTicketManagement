@include('Layouts.header')

@if(session('username') == 'Admin')
  @include('Layouts.aside')
  @yield('main-content')
@else
    @yield('Usermain-content')
@endif
@include('Layouts.footer')
