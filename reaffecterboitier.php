<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['affecter'])){
		try{
			
			$ref = $_POST['ref'];
		    $id=$_POST['id'];
            $idp=$_POST['idp'];
			$datedebut = $_POST['datedebut'];
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql2="select id from `boitier` where ref ='$ref'";
            $stmt = $conn->query($sql2);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$idb=$row['id']; 

			$sql1 = "UPDATE  `patientboitier` SET  `datefin`='$datedebut' where `datefin`='0000-00-00' and `idb` ='$idb' ";
            $conn->exec($sql1);

		
			
			$sql11 = "UPDATE `patientboitier` SET  `idb`='$idb' , `datedebut`='$datedebut' WHERE `idp` = '$id' " ;
            $conn->exec($sql11);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:patientparmedecin.php');
	}
?>