<?php include 'includes/funciones.php';


    session_start(); //ABRIMOS LA SESION PARA PODER UTILIZARLA.
    $_SESSION = []; //CERRAMOS LA SESION VACIANDO LOS DATOS
 
    header("Location: /index.php");




?>