<?php

function conectarDB() : mysqli{ //FUNCION CONECTAR A BASE DE DATOS QUE RETORNA UNA VARIABLE DE TIPO MYSQLI
    $db = new mysqli('localhost','root','root','bienesraices_crud'); 

    //AHORA LA CONEXION ES ORIENTADA A OBJETOS
    //CONECTO A LA BASE DE DATOS, LOCALHOST PORQUE VA A SER HOST LOCAL, MI USUARIO DE MYSQL ES ROOT Y PASSWORD ROOT Y QUIERO CONECTAR A LA BASE DE DATOS BIENESRAICES_CRUD
    //LO GUADRO EN UNA VARIABLE
    if(!$db){
        echo "No se pudo conectar";
        //EN CASO DE QUE NO SE PUEDA CONECTAR LE PONGO EXIT PARA FINALIZAR TODO EL CODIGO QUE PROSIGUE A ESTE CONDICIONAL
        //YA QUE PUEDE FILTRAR INFORMACION NO DESEADA
    }
    return $db; //RETORNO VARIABLE PARA SABER MAS INFO DE LA CONEXION

}


?>