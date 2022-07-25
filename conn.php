<?php
	$db_username = 'sql8508680';
	$db_password = 'HcAvki9g6u';
	$conn = new PDO( 'mysql:host=sql8.freesqldatabase.com;dbname= sql8508680', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>