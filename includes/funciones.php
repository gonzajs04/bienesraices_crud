<?php

function incluirTemplate(string $nombre, bool $inicio = false){ //LE DEFINIMOS UN FALSE POR DEFECTO EN CASO DE QUE NO ESTE DEFINIDA LA VARIABLE EN OTRO ARCHIVO .PHP APARTE DEL INDEX.
 
    include TEMPLATE_URL . "/${nombre}.php"; //PONGO LA CONSTANTE CON LA URL y la concateno con un /nombrearchivo.php
}


function isAutenticado(){

    session_start();
    $auth = $_SESSION['login'];
    if($auth){
        return true;
    }
    return false;
   

}


define('TEMPLATE_URL', __DIR__ . '/templates'); //Defino una constante CON EL DIRECTORIO COMPLETO __DIR__ y que me lo concatene con .'/templates'
define('FUNCIONES_URL',__DIR__ . 'funciones.php');

//CREO CONSTANTE QUE TENGA LA DIRECCION DE LA CARPETA DE IMAGENES PARA GUARDAR LAS IMAGENES CORRESPONDIENTES
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');