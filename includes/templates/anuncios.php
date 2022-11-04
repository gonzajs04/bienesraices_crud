<?php

//selecciono propiedadews

$sql = "SELECT * FROM propiedades LIMIT ${limite}";

$resultado = mysqli_query($db,$sql);

?>

<div class="grid-casas">

     <?php while($propiedades = mysqli_fetch_assoc($resultado)){?>       
                <div class="grid-casa">
                    <div class="imgcasa">
                        <picture>
                            <source srcset="../../imagenes/<?php echo $propiedades['imagen'];?>" type="image/jpeg">
                            <source srcset="../../imagenes/<?php echo $propiedades['imagen'];?>" type="image/webp">
                            <img loading ="../../imagenes/<?php echo $propiedades['imagen'];?>" alt="">
                        </picture>
                    </div>
                    <h3><?php echo $propiedades['titulo'];?></h3>
                    <p><?php echo $propiedades['descripcion'];?></p>
                    <p class="precio"><?php echo $propiedades['precio'];?></p>
                    <ul>
                        <li><img lazy = "loading "src="build/img/icono_wc.svg" alt="icono baño"><span><?php echo $propiedades['baños'];?></span></li>
                        <li><img lazy = "loading "src="build/img/icono_estacionamiento.svg" alt="icono baño"><span><?php echo $propiedades['estacionamiento'];?></span></li>
                        <li><img lazy = "loading "src="build/img/icono_dormitorio.svg" alt="icono baño"><span><?php echo $propiedades['habitaciones'];?></span></li>

                    </ul>
                
                    <div class="boton-amarillo">
                        <a href="anuncio.php?id=<?php echo $propiedades['idPropiedades'];?>">Ver Propiedad</a>
                    </div>
             
                </div>
                <?php }?>


                <?php mysqli_close($db) ?>
