<?php
// Informations d'identification
define('DB_SERVER', 'sql8.freesqldatabase.com');
define('DB_USERNAME', 'sql8511061');
define('DB_PASSWORD', 'szbcX1MjwX');
define('DB_NAME', 'sql8511061');
 
// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>