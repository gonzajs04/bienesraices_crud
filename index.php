<?php 
declare(strict_types=1);

require 'includes/app.php'; //REQUERIMOS LA FUNCION DE INCLUIR TEMPLATE
incluirTemplate('header',$inicio = true); //INCLUIMOS HEADER

?>
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

    <section class="casas"> <!--EMPIEZA SECCION DE CASAS-->

        <h3>Casas y Depas en Venta</h3>
        
        <?php $limite = 3;
        include 'includes/templates/anuncios.php';?>      
   
        </div>
      
        <div class="boton-verde alinear-derecha">
            <a href="anuncios.php">Ver Todas</a>
        </div>
     
    </section>


    <section class="contacto">

        <div class="container-texto">
           <div class="texto-contacto">

          
            <h3>Encuentra la casa de tus sueños</h3>
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    
            <div class="boton-amarillo">
                <a href="">Contactanos</a>
            </div>
        </div>
         
        </div>
       
        <div class="imagen-contacto">

            <picture>
                <source srcset="build/img/encuentra.jpg" type="image/jpeg">
                <source srcset="build/img/encuentra.webp" type="image/webp">
                <img loading ="lazy" src="build/img/encuentra.jpg" alt="imagen encontrar casa">
            </picture>

        </div>


    </section>

    <section class="blog-testimoniales">

        <div class="contenedor containerg-bt">
            
            <div class="container-blog">
                <h3>Nuestro Blog</h3>

                <div class="blog">
                    <div class="containerimg">
                        <picture>
                            <source srcset="build/img/blog1.jpg" type="image/jpeg">
                            <source srcset="build/img/blog1.webp" type="image/webp">
                            <img loading ="lazy" src="build/img/blog1.jpg" alt="imagen blog 1">
                        </picture>
                    </div>
                    <a href="#IR A BLOG">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span class="info-meta">20/10/2021</span> por: <span class="info-meta">Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales ahorrando dinero</p>
                    </a>
                    
                    
                </div> <!-- Cierra BLOG 1-->


                <div class="blog">
                    <div class="containerimg">
                        <picture>
                            <source srcset="build/img/blog2.jpg" type="image/jpeg">
                            <source srcset="build/img/blog2.webp" type="image/webp">
                            <img loading ="lazy" src="build/img/blog2.jpg" alt="imagen blog 2">
                        </picture>
                    </div>
                    <a href="#IR A BLOG">
                    <h4>Terraza en el techo de tu casa</h4>
                
                    <p>Escrito el: <span class="info-meta">20/10/2021</span> por: <span class="info-meta">Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales ahorrando dinero</p>
                    </a>
                    
                    
                </div> <!-- Cierra BLOG 2-->



            </div> <!-- Cierra container BLOG-->
    
            
            <div class="container-testi">
                <h3>Testimoniales</h3>

                <div class="testimonio">
                    <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam autem perferendis necessitatibus nulla, iste impedit, eveniet repudiandae ab voluptatum quas asperiores reprehenderit praesentium. Labore numquam doloremque molestiae quod. Tenetur, nisi."</blockquote>
                    <span>-Gonzalo Hernandez</span>

                </div> 


                
            </div> <!--Cierra Conitaner testimonales-->

        </div>

      

    </section>

   <?php  
   incluirTemplate('footer');
   
   ?>
    

</body>
</html>