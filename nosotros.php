<?php require 'includes/app.php';
    incluirTemplate('header');


?>

    <section class="nosotros">

        <h2>Conoce Sobre Nosotros</h2>

        <div class="contenedor container-nosotros">

            <div class="img-nosotros">
                <picture>
                    <source srcset="/build/img/nosotros.jpg" type="image/jpeg">
                    <source srcset="/build/img/destacada.webp" type="image/webp">
                    <img loading ="lazy" src="/build/img/nosotros.jpg" alt="">
                </picture>
            </div>

            <div class="texto-nosotros">
                <h4>25 años de Experiencia</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum maiores iste et libero voluptatem odio officia magnam mollitia maxime, repellendus repellat dignissimos quas qui id architecto harum temporibus adipisci labore.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum maiores iste et libero voluptatem odio officia magnam mollitia maxime, repellendus repellat dignissimos quas qui id architecto harum temporibus adipisci labore.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum maiores iste et libero voluptatem odio officia magnam mollitia maxime, repellendus repellat dignissimos quas qui id architecto harum temporibus adipisci labore.
                </p>
            
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum maiores iste et libero voluptatem odio officia magnam mollitia maxime, repellendus repellat dignissimos quas qui id architecto harum temporibus adipisci labore.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum maiores iste et libero voluptatem odio officia magnam mollitia maxime, repellendus repellat dignissimos quas qui id architecto harum temporibus adipisci labore.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum maiores iste et libero voluptatem odio officia magnam mollitia maxime, repellendus repellat dignissimos quas qui id architecto harum temporibus adipisci labore.
                </p>

            </div>


        </div> <!--Finaliza SOBRE NOSOTROS-->



    </section>


    <section class="sobre-nosotros">
        <div class="container-sobrenosotros">
            <h3>Más Sobre Nosotros</h3>

            <div class="contenedor grid-nosotros"> <!--GRID GENERAL NOSOTROS-->

                <!--3 GRIDS MAS-->

                <div class="contenedor grid">
                    <div class="icono">
                        <picture>
                           
                            <img loading ="lazy" src="src/img/icono1.svg" alt="Icono seguridad">
                        </picture>
                    </div>
                    <h3>Seguridad</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae exercitationem suscipit eaque ipsam, veritatis provident odit, magnam nobis beatae saepe dicta minus aspernatur aliquam? Deleniti aut illum quis sunt cumque.</p>

                </div>

                <div class="contenedor grid"> <!--OTRO GRID-->
                    <div class="icono">

                        <picture>
                           
                            <img loading ="lazy" src="src/img/icono2.svg" alt="Icono dinero">
                        </picture>

                    </div>
                    <h3>Precio</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae exercitationem suscipit eaque ipsam, veritatis provident odit, magnam nobis beatae saepe dicta minus aspernatur aliquam? Deleniti aut illum quis sunt cumque.</p>
                    
                </div>

                <div class="contenedor grid"> <!--OTRO GRID-->
                    <div class="icono">
                        <picture>
                            <img loading ="lazy" src="src/img/icono3.svg" alt="Icono reloj">
                        </picture>
                    </div>
                    <h3 class="h3-nomargin">A Tiempo</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae exercitationem suscipit eaque ipsam, veritatis provident odit, magnam nobis beatae saepe dicta minus aspernatur aliquam? Deleniti aut illum quis sunt cumque.</p>
                    
                </div>

            </div>


        </div>

    </section> <!--TERMINA SECCION NOSOTROS-->


    <?php  incluirTemplate('footer');?>

</body>
</html>