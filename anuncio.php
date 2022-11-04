<?php require 'includes/app.php';


    //CONECTAR A BASE DE DATOS
$db = conectarDB();

$idPropiedades = $_GET['id'] ?? null;

$idPropiedades = filter_var($idPropiedades,FILTER_VALIDATE_INT);

if($idPropiedades){
    $sql = "SELECT * FROM propiedades WHERE idPropiedades = ${idPropiedades}";
    $rs = mysqli_query($db,$sql);
    $propiedades = mysqli_fetch_assoc($rs);
} else{
   header("location: /");
}

    incluirTemplate('header');
?>


    <section class="anuncio">
        <div class="contenedor container-anuncio">
            <h2><?php echo $propiedades['titulo'];?></h2>

            <div class="imagen-anuncio">
                <picture>
                    <source srcset="imagenes/<?php echo  $propiedades['imagen'];?>" type="image/jpeg">
                    <source srcset="imagenes/<?php echo  $propiedades['imagen'];?>" type="image/webp">
                    <img loading ="lazy" src="imagenes/<?php echo  $propiedades['imagen'];?>" alt="foto anuncio">
                </picture>
            </div>

            <p class="precio"><?php echo "$" . $propiedades['precio'];?></p>
            <ul>/
                <li><img lazy = "loading "src="build/img/icono_wc.svg" alt="icono baño"><span><?php echo $propiedades['baños'];?></span></li>
                <li><img lazy = "loading "src="build/img/icono_estacionamiento.svg" alt="icono baño"><span><?php echo $propiedades['estacionamiento'];?></span></li>
                <li><img lazy = "loading "src="build/img/icono_dormitorio.svg" alt="icono baño"><span><?php echo $propiedades['habitaciones'];?></span></li>

            </ul>

            <p><?php echo $propiedades['descripcion'];?></p>

        </div>

    </section>

<?php     incluirTemplate('footer');
mysqli_close($db);
?>


    
</body>
</html>