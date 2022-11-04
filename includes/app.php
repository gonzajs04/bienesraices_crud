<?php
require 'funciones.php';
require 'config/database.php';
require  __DIR__ . '/../vendor/autoload.php';


use App\Propiedad;
//NOS CONECTAMOS A LA DB

//ME CONECTO A LA BASE DE DATOS DESDE APP.PHP 
$db = conectarDB();

//LE PASAMOS AL METODO ESTATICO DE PROPIEDAD SIEMPRE LA MISMA CONEXION.
Propiedad::setDB($db);
