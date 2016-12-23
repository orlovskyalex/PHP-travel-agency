<?php include_once('/functions/functions.php'); ?>
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
						<input type="text" name="logname" placeholder="Username:">
						<input type="password" name="logpass" placeholder="Password:">
						<button class="btn-success">Sign in</button>
					</form>
				</div>
				<div id="signup-popup" class="popup user">
					<form id="signup-form">
						<input type="text" name="username" placeholder="Username:">
						<input type="password" name="password" id="password" placeholder="Password:">
						<input type="password" id="confirm-password" placeholder="Confirm password:">
						<input type="email" name="email" placeholder="E-mail:">
						<button class="btn-success">Create an account</button>
					</form>
				</div>
				<?php
					}
					else
					{
				?>
				<span id="username">
					<?php
						connect();
						$res = mysql_query('select * from Users where id='.$_COOKIE['userid']);
						$row = mysql_fetch_assoc($res);
						echo $row['username'];
						mysql_free_result($res);
					?>
				</span>
				<button id="signout-btn">Logout</button>
				<?php
					}
				?>
			</div>
		</div>
	</header>

	<div id="signin-success" class="popup notification centered">
		<span class="h">Success</span>
		<p class="message">You are now signed in</p>
		<button class="btn-success">Ok</button>
	</div>
	<div id="signup-error" class="popup notification centered">
		<span class="h">Error</span>
		<p class="message"></p>
		<button class="btn-error">Try again</button>
	</div>

	<script src="/js/vendors/jquery-3.1.1.min.js"></script>
	<script src="/js/main.js"></script>
</body>

</html>