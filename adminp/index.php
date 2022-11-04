<?php 

require '../includes/app.php';
use App\Propiedad;
$auth = isAutenticado();

echo $auth;
if(!$auth){
  header("Location: /");
}

// //IMPORTAR LA CONEXION
// $db = conectarDB(); //HAGO LA CONEXION EN APP.PHP

// //ESCRIBIR QUERY
// $sql = "SELECT * FROM propiedades ";

// //CONSULTAR BASE DE DATOS
// $resultadoQuery = mysqli_query($db,$sql);

//llamo a un metodo que nos guarde todas las propiedades
$propiedades = Propiedad::all();

echo '<pre>';
var_dump($propiedades);
echo '</pre>';

incluirTemplate('header'); 

//VERIFICAMOS SI ESTA EN LA URL PARA USAR GET, EN CASO DE QUE NO, NO NOS AFECTA AL CODIGO, EN CASO DE QUE EXISTA, EL RESULTADO VA A SER IGUAL A "1" ESTE VALOR LO RECIBIMOS DE CREAR.PHP
$resultado = $_GET['resultado'] ?? null;

if($_POST === []){ //VALIDO QUE HAYA UN POST
  echo '';
}
else{
  $idPropiedad = $_POST['id']; //RECIBO LA ID

  $idPropiedad = filter_var($idPropiedad,FILTER_VALIDATE_INT); //ME FIJO QUE LO QUE RECIBO ES UNA ID
 
  if(!$idPropiedad){ // ME FIJO QUE HAYA UNA ID RECIBIDA
    echo '';
  }
  else{
      $sql = "SELECT * FROM propiedades WHERE idPropiedades = ${idPropiedad}"; //AGARRO LAS PROPIEDADES QUE TENGA ESA ID UNICO
      $rp = mysqli_query($db,$sql);
      $propiedad = mysqli_fetch_assoc($rp); //SACO LOS DATOS D ELA PROPIEDAD Y LOS ALMACENO EN VARIABLE LLAMADA PROPIEDAD
  
      
  
    $sql = "DELETE FROM propiedades WHERE idPropiedades = ${idPropiedad}";
     $rd = mysqli_query($db,$sql); //ELIMINO LAS PROPIEDADES QUE TENGAN LA ID QUE LE INDIQUE CON EL SUBMIT 

     if($rd){ // EN CASO DE QUE SE HAYA BORRADO ALGO correctamente
      header("Location: /adminp?resultado=3"); //REDIRECCIONO AL USUARIO A LA MISMA DIRECCION, PARA QUE A TRAVES DE UN GET ESCRIBA UN MENSAJE DE PROPIEDAD ELIMINADA CORRECTAMENTE QUE SE VA A IMPRIMIR EN EEL MAIN SECTION

      if($propiedad['imagen']){ //EN CASO DE QUE EXISTA UNA IMAGEN RELACIONADA A ESA PROPIEDAD, LA ELIMINO.
        unlink("../imagenes/" . $propiedad['imagen']);
      }


     }
  }


}

?>

  
    <main class="contenedor-seccion">
        <h1>Administrador de BIENES RAICES</h1>
    </main>
    <?php if(intval($resultado)==3){?>

      <div class="alerta exito">
        <p>Propiedad eliminada correctamente.</p>
      </div>


      <?php } ?>

    <?php if(intval($resultado) == 2 ){?>
    <div class="alerta exito">

    <p>Se Actualizo la propiedad correctamente</p>

    </div>
    <?php } ?>

    <?php  if(intval($resultado) == 1){?><!--cOMPARAMOS SI EL STRING ES IGUAL A "1"-->  

      <p class="alerta exito">Propiedad registrada correctamente</p>
    <?php } ?>

   
      

    <a style ="display:block" href="/adminp/propiedades/crear.php" class="boton boton-verde">Ir a crear nueva propiedad</a>

      <div class="contenedor contenedor-propiedades">
        <div class="head-propiedades">
          <p>ID PROPIEDAD</p>
          <p>Nombre Propiedad</p>
          <p>Precio</p>
          <p>Imagen</p>
          <p>Acciones</p>
        </div>
        <?php while($propiedad = mysqli_fetch_assoc($resultadoQuery)){?>


        <div class="body-propiedades">

        
          <p><?php echo $propiedad['idPropiedades'];?></p>
          <p><?php echo $propiedad['titulo']?></p>
          <p><?php echo $propiedad['precio']?></p>
          

      
          <img src="/imagenes/<?php echo $propiedad['imagen'] .".jpg";?>" alt="" class="imagen-tabla">

         
          <div class="botones">
            <form method="POST" action="#"> <!--FORM POST PARA ENVIAR SOLICITUD DE QUE VOY A ELIMINAR ALGO-->
            <input type="hidden" name="id" value="<?php echo $propiedad['idPropiedades'];?>">
            <!--ES UN INPUT QUE NO SE VE, EL CUAL LE VOY A ENVIAR LA ID DE LA PROPIOEDAD QUE QUIERO ELIMINAR-->
            <input type="submit" class="boton-rojo-block" value="Eliminar">

            </form>
            
            <a href="/adminp/propiedades/actualizar.php? idPropiedad = <?php echo $propiedad['idPropiedades']?>" class="boton-amarillo-block">Actualizar</a> <!--Le pasamos la ID DE LA PROPIEDAD PARA LUEGO HACER UN GET Y OBTENERLA-->
          </div>

        
        </div>
        <?php }?>

      </div>

    
  
  <?php incluirTemplate('footer');
  
  //CERRAR CONEXION
  mysqli_close($db);
  
  ?>

  
</body>
</html>