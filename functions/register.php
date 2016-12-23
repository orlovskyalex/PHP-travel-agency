<?php

	include_once('functions.php');

	$username = trim(htmlspecialchars($_POST['username']));
	$password = trim(htmlspecialchars($_POST['password']));
	$email = strtolower(trim(htmlspecialchars($_POST['email'])));

	if ($username == '' || $password == '' || $email == '')
	{
		echo 'All fields are required';
		return false;
	}
	if (strlen($username) < 3 || strlen($username) > 24)
	{
		echo 'Username must be between 3 and 24 symbols';
		return false;
	}
	if (strlen($password) < 6 || strlen($password) > 32)
	{
		echo 'Password must be between 6 and 32 symbols';
		return false;
	}

	$salt = 'p85$QD&37f9m';

	$ins = 'insert into Users (username, password, email, roleid)
			values("'.$username.'", "'.md5($password.$salt).'", "'.$email.'", 2)';
	connect();
	mysql_query($ins);
	$err = mysql_errno();
	if ($err)
	{
		if ($err == 1062) echo 'This username is already taken';
		else echo 'Error code: '.$err;
		return false;
	}
	setcookie('userid', $row['id'], time()+3600, '/');
	echo '1';
	return true;

?>