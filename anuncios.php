<?php 
include 'includes/app.php';
    incluirTemplate('header');

?>

    <section class="casas"> <!--EMPIEZA SECCION DE CASAS-->

        <h3>Casas y Depas en Venta</h3>
        
        <?php $limite = 20;include 'includes/templates/anuncios.php';?>
     
    </section>

    <?php     incluirTemplate('footer');?>

   
</body>
</html>