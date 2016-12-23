<?php

	function connect($DBHost='127.0.0.1', $DBUser='root', $DBPass='', $DBName='travel')
	{
		$link = mysql_connect($DBHost, $DBUser, $DBPass) or die('Connection error!'); // or die() - устаревший способ
		mysql_select_db($DBName) or die('DB not found!');
		mysql_query('set names "utf8"'); // режим работы с русскими буквами
	}

?>