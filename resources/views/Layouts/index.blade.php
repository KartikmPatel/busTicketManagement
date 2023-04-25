<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <!-- Boxicon -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
        <link rel="stylesheet" href="{{asset('layoutstyle/index.css')}}">
    </head>
    <body>
        <section id="sidebar">
            <a href="#" class="brand">
                <i class="bx bxs-bus"></i>
                <span class="text">Globle Travels</span>
            </a>
            <ul class="side-menu top">
                <li class="active">
                    <a href="#">
                        <i class="bx bxs-dashboard"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bx bxs-bus"></i>
                        <span class="text">Buses</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-route"></i>
                        <span class="text">Routes</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-playstation"></i>
                        <span class="text">Stations</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bx bxs-group"></i>
                        <span class="text">Staffs</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-money-check"></i>
                        <span class="text">Payments</span>
                    </a>
                </li>
            </ul>
            <ul class="side-menu">
                    <li>
                        <a href="#">
                            <i class="bx bxs-cog"></i>
                            <span class="text">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="logout">
                            <i class="bx bxs-log-out-circle"></i>
                            <span class="text">Logout</span>
                        </a>
                    </li>
            </ul>
        </section>

        <!-- Content -->

        <section id="content">
            <nav>
                <i class='bx bx-menu'></i>
                <a href="#" class="nax-link">Buses</a>
                <form action="#">
                    <div class="form-input">
                        <input type="search" placeholder="Search...">
                        <button type="submit" class="search-btn"><i class="bx bx-search"></i></button>
                    </div>
                </form>
                <a href="#" class="notification">
                    <i class="bx bxs-bell"></i>
                    <span class="num">8</span>
                </a>
                <a href="#" class="profile">
                    <img src="images/User-avatar.png">
                </a>
                {{-- <button type="button" class="btn btn-outline-primary" onclick="showform()">
                    Login
                  </button> --}}
                  {{-- <button class="btn btn-outline-success " type="submit" onclick="formshow()">Sign Up</button> --}}
            </nav>
        </section>
        <main>
            @yield('testmain-content')
        </main>
        <script src="jsFiles/index.js"></script>
    </body>
</html>
