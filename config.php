<?php
// Informations d'identification
define('DB_SERVER', ' remotemysql.com');
define('DB_USERNAME', 'sqx6F9pr6V');
define('DB_PASSWORD', '2lV1fCz6Vh');
define('DB_NAME', 'sqx6F9pr6V');
 
// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>