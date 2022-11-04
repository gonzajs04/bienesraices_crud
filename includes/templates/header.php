<?php 


if(!isset($_SESSION)){ //CONTROLAMOS SI ESTA DEFINIDA LA VARIABLE SESSION
    session_start(); //EN CASO DE QUE NO, LA INICIAMOS
}
$auth = isAutenticado(); // CONTROLAMOS SI ESTA AUTENTICADO


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio': '';?>">

        <div class="containerg-header">
            <div class="container-header">

                <div class="logo">
                    <a href="/">
                        <h2>BIENES <span>RAICES</span></h2>
                    </a>
                    
                </div>

                <div class="menu-mobile">
                    <img src="/build/img/barras.svg" alt="menu responsive">
                </div>

                <div class="derecha">

                    <div class="img-boton">
                        <img class="boton-dark" src="/build/img/dark-mode.svg" alt="logo dark-mode">
                    </div>
                    <nav class="nav">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anuncios</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>       

                        <?php if($auth){?>
                        <a href="/cerrar-sesion.php">Cerrar sesion</a>   

                        <?php } else{ ?>

                            <a href="/login.php">Iniciar Sesion</a>
                        <?php }?>
                    </nav>       
                </div>
            </div>
            </div>
        </div>

        <?php if($inicio){ echo "<div class='containerg-presentacion'><h1 class='presentacion-texto' >Venta de casas y departamentos Exclusivos de lujo</h1></div>";
            }?>
    </header>