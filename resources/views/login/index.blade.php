<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="login">
<div class="container-login d-flex" style="background:#151D30">
    <div class="container-image-login d-flex">
    	<img src="assets/img/login.png" class="image-login">
    </div>
    <div class="container-text-login d-flex">
        <img src="{{ asset('assets/img/vector.png')}}" class="logo-login">
        <br>
    	<b>Log In</b>
    	<input class="login" type="text" name="username" placeholder="Username" id="textUsername">
    	<input class="login" type="password" name="password" placeholder="Password" id="textPassword">
    	<button id="ajax-login">Log In</button>
    </div>
	<div class="result"></div>
</div> 
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>