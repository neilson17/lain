<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

    <meta property="og:title" content="Walrus Login" />
	<meta property="og:description" content="Site that provide you with anything you want" />
	<meta property="og:image" content="https://picsum.photos/id/1084/110/110" />
	<meta property="og:url" content="https://www.walrus.com/login" />

	<style type="text/css">
		body {
			margin:  0px;
		}

		@media (min-width:  541px) {
			.container {
				display: grid;
				height: 100vh;
				grid-template-columns: 2fr 1fr;
				grid-template-rows: 100vh;
			}

			.container-image {
				grid-row: 1/2;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
			}

			.container-text {
				grid-row: 1/2;
			}

			.image {
				/* width: 100%; */
				height: 30%;
                
				/* object-fit: fill; */
			}
		}
		
		.container-text {
            background: #292F45;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			gap: 1em;
		}

		input {
			width: 80%;
		}

        .logo {
            height: 15%;
        }

		@media (max-width:  540px) {
			.container-image {
				display: none;
                
			}

			.container {
				display: flex;
				justify-content: center;
			}

			.container-text {
				width: 70%;
				height: 220px;
				margin-top: 20px;
			}
		}

	</style>
</head>
<body>
<div class="container" style="background:#151D30">
    <div class="container-image">
    	<img src="assets/img/login.png" class="image">
    </div>
    <div class="container-text">
        <img src="assets/img/vector.png" class="logo">
        <br>
    	<b>Log In</b>
    	<input type="text" name="username" placeholder="Username">
    	<input type="text" name="password" placeholder="Password">
    	<button>Log In</button>
    </div>
</div>
</body>
</html>