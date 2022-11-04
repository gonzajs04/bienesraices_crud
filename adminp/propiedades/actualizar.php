<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
require '../../includes/app.php';

isAutenticado();



incluirTemplate('header');
$db = conectarDB();

$idPropiedad = $_GET['idPropiedad_']; //OBTENEMOS LA ID DE LA PROPIEDAD QUE QUEREMOS ACTUALIZAR

$idPropiedad = filter_var($idPropiedad,FILTER_VALIDATE_INT); //VALIDO QUE LA ID SEA UN ENTERO


$sql = "select * from vendedores";
$resultadoQuery = mysqli_query($db, $sql);

if(!$idPropiedad){ //VERIFICO QUE SE HAYA RECIBIDO UNA ID, EN CASO DE QUE NO
 header("Location: /adminp/index.php"); //REDIRIJO A PAGINA PRINCIPAL

}else{
// SI HAY ID, HAGO UNA CONSULTA PARA OBTENER TODAS LAS PROPIEDADES QUE TENGAN LA ID QUE RECIBIMOS
  $sqlPropiedad = "select * from propiedades where idPropiedades = ${idPropiedad}"; //CONSULTA
   $rPropiedad  = mysqli_query($db, $sqlPropiedad); // LE INDICO BASE DE DATOS Y LA CONSULTA

   $propiedad = mysqli_fetch_assoc($rPropiedad); //LEEMOS LA BASE DE DATOS
    $titulo = $propiedad['titulo']; //LE PONGO NOMBRE LAS VARIABLES RECIBIDAS
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $baños = $propiedad['baños'];
    $estacionamientos = $propiedad['estacionamiento'];
    $idVendedores = $propiedad['Vendedores_idVendedores'];
  $imagenPropiedad  = $propiedad['imagen']; //GUARDO EL NOMBRE DE LA IMAGEN

}

if($_POST === []){
 ECHO '';  
}
else{


  //SANITIZO LOS DATOS
  $titulo = mysqli_real_escape_string($db,$_POST['titulo']);
  $precio = mysqli_real_escape_string($db,$_POST['precio']);
  $imagen = $_FILES['imagen'];
  $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
  $baños = mysqli_real_escape_string($db,$_POST['baños']);
  $estacionamientos = mysqli_real_escape_string($db,$_POST['estacionamientos']);
  $habitaciones = mysqli_real_escape_string($db,$_POST['habitaciones']);
  $idVendedores = mysqli_real_escape_string($db,$_POST['vendedor']);
  $creado = date("Y/m/d");
  $errores = [];



  if(!$titulo)$errores[] = "Debes añadir un titulo";
  
  if(!$precio) $errores[] = "Debes añadir un precio";


  if(!$descripcion || strlen($descripcion)<10 ) $errores[] = "Debes añadir una descripcion o debe ser mayor a 10 caracteres";

  if(!$baños) $errores[] = "Debes añadir baños";
  if(!$habitaciones) $errores[] = "Debes añadir habitaciones";
  if(!$estacionamientos) $errores[] = "Debes añadir un Estacionamientos";
  if(!$idVendedores) $errores[] = "Debes añadir un vendedor";


  $pesoImg = 1000*400;
  if($imagen['size']>$pesoImg){
    $errores[] = "El peso de la imagen debe ser menos a 1MB";
  }

if(empty($errores)){

  $locationFolder = '../../imagenes/';
   if(!is_dir($locationFolder)){
     mkdir($locationFolder);
 }
  $nombreImg = md5(uniqid(rand(),true)); //LE ASIGNO UN NOMBRE RANDOM
  $nombreImg.='.jpg'; //LE PONGO EXTENSION JPG
  $uploadImageStatus = false; //BOOLEAN QUE ME VA A VERIFICAR SI SE SUBIO IMG NUEVA O NO

  if($imagen['name']){ //PREGUNTO SI HAY UNA IMAGEN NUEVA EN EL POST
    try { // EN CASO DE QUE SI, ME MUEVE LA IMAGEN A LA CARPETA CREADA CON EL NOMBRE CREADO DE FORMA RANDOM
    
      move_uploaded_file($imagen['tmp_name'], $locationFolder . "${nombreImg}"); //ME MUEVE LA IMG A LA CARPETA
      $uploadImageStatus = true; //BOOLEANO QUE ME INDICA QUE SE SUBIO UNA NUEVA IMAGEN
    } catch (\Throwable $th) {
      
      $uploadImageStatus = false; // NO SE SUBIO NUEVA IMAGEN
    }
  }else{
    $nombreImg = $propiedad["imagen"]; // EN CASO DE QUE NO SE HAYA SUBIDO UNA NUEVA IMAGEN
    //EL NOMBRE DE LA IMAGEN, VA A UPDATEARSE CON EL MISMO, QUE HAYAMOS RECIBIDO DESDE LA BASE DE DATOS
    //POR LO QUE NOS VA A QUEDAR LA MISMA IMAGEN
  }

   if($uploadImageStatus==true){ //EN CASO DE QUE EL BOOLEANO ME HAYA INDICADO QUE SE SUBIO LA NUEVA IMAGEN, BORRAMOS LA ANTERIOR CON LA LOCALIZACION DE LA CARPETA EN LA QUE ESTA LA IMAGEN, Y EL NOMBRE DE LA IMAGEN  RECIBIDA DESDE LA BASE DE DATOS A ELIMINAR.
  
      unlink($locationFolder . $propiedad['imagen']); //BORRO LA IMAGEN ANTERIOR
      
   }


  $sqlUp = "UPDATE propiedades SET titulo = '${titulo}', precio = ${precio}, imagen = '${nombreImg}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, baños = ${baños}, estacionamiento = ${estacionamientos}, Vendedores_idVendedores = ${idVendedores}, creado = '${creado}' WHERE idPropiedades = ${idPropiedad}"; 


    $rs = mysqli_query($db,$sqlUp); //UPDATEAMOS BASE DE DATOS

  header("Location: /adminp?resultado=2"); //ENVIAMOS A INDEX.PHP UNA INDICACION DE QUE SE ACTUALIZO LA BASE DE DATOS
}
 
}

?>
 <script src="/build/js/bundle.min.js"></script> <!--Sino no se incluye el JAVASCRIPT, POR ESO LO PONGO ACA -->
  
    <main class="contenedor-seccion">
        <h1> ACTUALIZAR VIVIENDA</h1>
    </main>
    <a style = "display: block ; padding : 2rem 0;" class="boton-amarillo-block" href="/adminp/index.php">Volver al administrador</a>
    
    <form class="formulario" method = "POST" action="#" enctype="multipart/form-data">

    <?php
    foreach ($errores as $error) {?>
      <div class="alerta error"> <?php echo $error?></div>
      
    <?php } ?>
    

    <fieldset>
    
    <legend>Informacion general de la propiedad</legend>
      <!-- <?php //while($propiedad = mysqli_fetch_assoc($rPropiedad)){?> -->
    <label for="titulo">Titulo de la propiedad</label>
    <input type="text" name="titulo" id="titulo" value = "<?php echo $titulo?>" placeholder="Hermosa casa en la playa">

    <label for="precio">Precio de la propiedad</label>
    <input type="number" name="precio" id="precio" value = "<?php echo $precio?>" placeholder="200000"> 

    <label for="image">Imagen de la propiedad</label>
    <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
    <img src="/imagenes/<?php echo $imagenPropiedad;?>" class="imagen-small" alt="Imagen de la propiedad">

    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10" value = "<?php echo $descripcion?>" placeholder="Minimo 10 caracteres"><?php echo $descripcion?></textarea>
        <?php //} ?>
    </fieldset>

    <fieldset>
      <legend>Informacion de la propiedad</legend>

      <label for="habitaciones">Habitaciones</label>
      <input type="number" name="habitaciones" id="habitaciones" placeholder = "Ej 3" value = "<?php echo $habitaciones?>">

      <label for="baños">Baños</label>
      <input type="number" name="baños" id="baños" placeholder = "Ej 3" value = "<?php echo $baños?>">

      <label for="estacionamientos">Baños</label>
      <input type="estacionamientos" name="estacionamientos" id="estacionamientos" placeholder = "Ej 3" value = "<?php echo $estacionamientos?>">


    </fieldset>

    <fieldset>
    <legend>Vendedor</legend>
    <select name="vendedor" id="vendedor">
    <option value="" name="" selected>--- Seleccione un vendedor ---</option>
    <?php while($vendedor = mysqli_fetch_assoc($resultadoQuery)){
      ?>
        <option <?php echo $idVendedores === $vendedor['idVendedores'] ? 'selected' : '';?> value ="<?php echo $vendedor['idVendedores']?>"?><?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido']?></option>

        <!--El value, nos arroja la ID DEL VENDEDOR-->
      
          <?php }?>
    </select>


    </fieldset>

    <input type="submit" value="Actualizar propiedad" class="boton-amarillo">

    </form>

  <?php incluirTemplate('footer');?>
  
   
</body>
</html>