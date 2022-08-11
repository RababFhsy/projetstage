<?php
	$db_username = 'toubkali_toubkal';
	$db_password = '2ejCD1zp72';
	$conn = new PDO( 'mysql:host=localhost;dbname=toubkali_medcal', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!" . mysqli_connect_error());
	}
?>