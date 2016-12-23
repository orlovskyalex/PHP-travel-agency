<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Hotels</title>
	<link rel="stylesheet" href="/css/vendors.css">
	<link rel="stylesheet" href="/css/main.css">
</head>

<body>
	<header>
		<div class="header-inner">
			<a href="/" class="logo">
				<img src="/images/site/logo_header.png" alt="Hotels24 logo">
			</a>
			<?php include_once('/pages/menu.php'); ?>
			<div class="auth">
				<?php
					if (!isset($_COOKIE['userid']))
					{
				?>
				<button id="signin-btn">Sign in</button>
				or
				<button id="signup-btn">Sign up</button>
				<div id="signin-popup" class="popup user">
					<form id="signin-form">
						<input type="text" placeholder="Username:">
						<input type="password" placeholder="Password:">
						<button>Sign in</button>
					</form>
				</div>
				<div id="signup-popup" class="popup user">
					<form id="signup-form">
						<input type="text" placeholder="Username:">
						<input type="password" placeholder="Password:">
						<input type="password" placeholder="Confirm password:">
						<input type="email" placeholder="E-mail:">
						<button>Create an account</button>
					</form>
				</div>
				<?php
					}
				?>
			</div>
		</div>
	</header>

	<script src="/js/vendors/jquery-3.1.1.min.js"></script>
	<script src="/js/main.js"></script>
</body>

</html>