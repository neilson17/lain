<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAIN</title>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="home d-flex">
    <div class="sidebar d-flex">
        <div class="img-logo-sidebar-wrapper">
            <img class="w-100p" src="{{asset('assets/img/Vector.png')}}" alt="">
        </div>
        <div class="sidebar-list-wrapper d-flex h-100p mt-15x">
            <div class="sidebar-list-wrapper d-flex">
                <a href="{{url('/dashboard')}}" class="@yield('dashboard-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-1.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Dashboard</h3>
                    </div>
                </a>
                <a href="{{url('/teams')}}" class="@yield('team-active')">
                    <div class="sidebar-list-item d-flex">
                    <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-2.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Team</h3>
                    </div>
                </a>
                <a href="" class="@yield('finance-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-3.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Finance</h3>
                    </div>
                </a>
                <a href="{{url('/clients')}}" class="@yield('client-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-4.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Client</h3>
                    </div>
                </a>
                <a href="/todos" class="@yield('todo-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-9.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Todo</h3>
                    </div>
                </a>
                <a href="/events" class="@yield('event-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-8.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Event</h3>
                    </div>
                </a>
                <a href="/notes" class="@yield('note-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-5.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Note</h3>
                    </div>
                </a>
            </div>
            <div class="sidebar-list-wrapper d-flex">
                <a href="/setting" class="@yield('settings-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-6.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Settings</h3>
                    </div>
                </a>
                <a href="">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-7.png')}}" class="icon-list-sidebar" alt="">
                        </div> 
                        <h3 class="text-list-sidebar">Logout</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="content d-flex">
        <div class="header-wrapper">
            <div class="header card d-flex">
                <div class="account-info-header d-flex">
                    <h3>Centong Hitam</h3>
                    <p>Admin</p>
                </div>
                <img class="img-avatar h-100p" src="https://i.pravatar.cc/300" alt="">
            </div>
        </div>
        <div class="page-content-wrapper">
            @yield('content')
        </div>
    </div>
    @yield('javascript')
</body>
</html>