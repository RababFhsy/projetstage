<?php
// Informations d'identification
define('DB_SERVER', 'sql8.freesqldatabase.com');
define('DB_USERNAME', 'sql8508680');
define('DB_PASSWORD', 'HcAvki9g6u');
define('DB_NAME', 'sql8508680');
 
// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>