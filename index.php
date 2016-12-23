<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Hotels</title>
	<link rel="stylesheet" href="css/vendors.css">
	<link rel="stylesheet" href="css/main.css">
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
				<?php
					}
				?>
			</div>
		</div>
	</header>
</body>

</html>