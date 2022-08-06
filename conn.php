<?php
	$db_username = 'sql8511061';
	$db_password = '';
	$conn = new PDO( 'mysql:host=sql8.freesqldatabase.com;dbname=sql8511061', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!" . mysqli_connect_error());
	}
?>