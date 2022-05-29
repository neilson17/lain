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
    <div id="sidebar" class="d-flex">
        <div class="img-logo-sidebar-wrapper">
            <img id="menu-logo" src="{{asset('assets/img/Vector.png')}}" alt="">
        </div>
        <div id="wrapper-menu" class="sidebar-list-wrapper d-flex mt-15x">
            <div class="sidebar-list-wrapper d-flex">
                <a href="{{url('/dashboard')}}" class="@yield('dashboard-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-1.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Dashboard</h3>
                    </div>
                </a>
                @can('admin-only')
                <a href="{{url('/teams')}}" class="@yield('team-active')">
                    <div class="sidebar-list-item d-flex">
                    <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-2.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Team</h3>
                    </div>
                </a>
                <a href="{{url('/finances')}}" class="@yield('finance-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-3.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Finance</h3>
                    </div>
                </a>
                @endcan
                <a href="{{url('/clients')}}" class="@yield('client-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-4.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Client</h3>
                    </div>
                </a>
                <a href="{{url('/todos')}}" class="@yield('todo-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-9.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Todo</h3>
                    </div>
                </a>
                <a href="{{url('/events')}}" class="@yield('event-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-8.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Event</h3>
                    </div>
                </a>
                <a href="{{url('/notes')}}" class="@yield('note-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-5.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Note</h3>
                    </div>
                </a>
            </div>
            <div class="sidebar-list-wrapper d-flex">
                <a href="{{url('/setting')}}" class="@yield('settings-active')">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-6.png')}}" class="icon-list-sidebar" alt="">
                        </div>
                        <h3 class="text-list-sidebar">Settings</h3>
                    </div>
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <div class="sidebar-list-item d-flex">
                        <div class="icon-list-sidebar-wrapper">
                            <img src="{{asset('assets/icons/icon-7.png')}}" class="icon-list-sidebar" alt="">
                        </div> 
                        <h3 class="text-list-sidebar">Logout</h3>
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <div class="content d-flex">
        <div class="header-bar-wrapper">
            <div class="header card d-flex">
                <img src="{{asset('assets/icons/icon-10.png')}}" id="hamburger-menu" class="icon-list-sidebar" alt="">
                <div class="d-flex img-top-bar">
                    <div class="account-info-header d-flex">
                        <h3>
                            @if(Auth::user())
                            {{ Auth::user()->name }}
                            @endif
                        </h3>
                        <p>
                            @if(Auth::user())
                            {{ Auth::user()->role }}
                            @endif
                        </p>
                    </div>
                    <img class="img-avatar h-100p" src={{ asset('assets/img/'. Auth::user()->photo_url )}} alt="">
                </div>
            </div>
        </div>
        <div class="page-content-wrapper">
            @yield('content')
        </div>
    </div>
    <img src="{{asset('assets/icons/icon-11.png')}}" id="close-hamburger" class="h-40x" alt="">
    @yield('javascript')
    <script src="{{asset('assets/js/global.js')}}"></script>
</body>
</html>