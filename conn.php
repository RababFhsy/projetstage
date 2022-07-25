<?php
	$db_username = 'sqx6F9pr6V';
	$db_password = ' 2lV1fCz6Vh';
	$conn = new PDO( 'mysql:host= remotemysql.com;dbname= sqx6F9pr6V', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>