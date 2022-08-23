<?php
 require_once 'conn.php';
	if(isset($_POST['deletedata']))
    {
       
        $id = $_POST['id'];    
		$sql = $conn->prepare("DELETE from `patientboitier` WHERE `idp`='$id'");
		$sql->execute();
		header('location:patientparmedecin.php');
       
	}
?>