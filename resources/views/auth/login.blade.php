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
    <form method="POST" action="{{ route('login') }}" class="d-flex">
        @csrf
        <img src="{{ asset('assets/img/vector.png')}}" class="mr-40x">
        <div class="d-flex flex-dir-col">
            <!-- <h2 class="text-align-center mt-20x">Login</h2> -->
            <input id="email" type="text" class="input-text font-18x @error('email') is-invalid @enderror" placeholder="Username" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password" type="password" class="input-text font-18x mt-15x @error('password') is-invalid @enderror" name="password" required placeholder = "Password" autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <p class="text-align-center">

                <button type="submit" class="btn btn-normal mt-30x pr-40x pl-40x">
                    {{ __('Login') }}
                </button>
            </p>
        </div>
    </form>
	<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
