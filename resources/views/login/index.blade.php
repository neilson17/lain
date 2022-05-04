<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="w-100vw h-100vh d-flex justify-content-center item-align-center">
	@csrf
	<img src="{{ asset('assets/img/vector.png')}}" class="mr-40x">
	<div class="d-flex flex-dir-col">
		<!-- <h2 class="text-align-center mt-20x">Login</h2> -->
		<input type="text" class="input-text font-18x" name="username" placeholder="Username" id="textUsername">
		<input type="password" class="input-text font-18x mt-15x" name="password" placeholder="Password" id="textPassword">
		<p class="text-align-center">
			<button class="btn btn-normal mt-30x pr-40x pl-40x" id="ajax-login">Log In</button>
		</p>
	</div>
	
	<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>