<?php

	include_once('functions.php');

	$salt = 'p85$QD&37f9m';

	if (isset($_POST['logname'])) $logname = trim(htmlspecialchars($_POST['logname']));
	if (isset($_POST['logpass'])) $logpass = trim(htmlspecialchars($_POST['logpass']));

	if ($logname == '' || $logpass == '')
	{
		return false;
	}
	if (strlen($logname)<3 || strlen($logname)>24 || strlen($logpass)<6 || strlen($logpass)>32)
	{
		return false;
	}
	global $salt;
	connect();
	$sel = 'select * from Users where username="'.$logname.'" and password="'.md5($logpass.$salt).'"';
	$res = mysql_query($sel);
	if ($row = mysql_fetch_assoc($res))
	{
		setcookie('userid', $row['id'], time()+3600, '/');
		if ($row['roleid'] == 1) setcookie('isadmin', true, time()+3600, '/');
		echo '1';
		return true;
	}
	return false;

?>