<?php  
//IMPORTAR LA CONEXION
require 'includes/config/database.php';
$db = conectarDB();

//CREAR UN EMAIL Y PASSWORD
$email = "mail@mail.com";
$pass = "123";

$pass_hash = password_hash($pass,PASSWORD_DEFAULT);

//query para crear el usuario
$sql = "INSERT INTO usuarios (email,password) VALUES('${email}','${pass_hash}')";

//AGREGARLO A LA BSE DE DATOS
mysqli_query($db,$sql);



?>