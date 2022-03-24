<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAIN</title>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="sidebar">
        <div class="img-logo-sidebar-wrapper">
            <img class="w-100" src="{{asset('assets/img/Vector.png')}}" alt="">
        </div>
        <div class="sidebar-list-wrapper">
            <a href="">
                <div class="sidebar-list-item">
                    <img src="{{asset('assets/icons/icon-1.png')}}" class="icon-list-sidebar" alt="">
                    <h3 class="text-list-sidebar">Dashboard</h3>
                </div>
            </a>
            <a href="">
                <div class="sidebar-list-item">
                    <img src="{{asset('assets/icons/icon-2.png')}}" class="icon-list-sidebar" alt="">
                    <h3 class="text-list-sidebar">Team</h3>
                </div>
            </a>
            <a href="" class="active">
                <div class="sidebar-list-item">
                    <img src="{{asset('assets/icons/icon-3.png')}}" class="icon-list-sidebar" alt="">
                    <h3 class="text-list-sidebar">Finance</h3>
                </div>
            </a>
            <a href="">
                <div class="sidebar-list-item">
                    <img src="{{asset('assets/icons/icon-4.png')}}" class="icon-list-sidebar" alt="">
                    <h3 class="text-list-sidebar">Client</h3>
                </div>
            </a>
            <a href="">
                <div class="sidebar-list-item">
                    <img src="{{asset('assets/icons/icon-5.png')}}" class="icon-list-sidebar" alt="">
                    <h3 class="text-list-sidebar">Note</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="content">
        <div class="header-wrapper">
            <div class="header card">
                <div class="account-info-header">
                    <h3>Centong Hitam</h3>
                    <p>Admin</p>
                </div>
                <img class="img-avatar h-100" src="https://i.pravatar.cc/300" alt="">
            </div>
        </div>
        <div class="page-content-wrapper">
            <div class="page-content w-100 h-100">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>