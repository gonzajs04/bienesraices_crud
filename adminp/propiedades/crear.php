
<?php 
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

include '../../includes/app.php';

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as imagen;


$auth = isAutenticado();
if(!$auth){
  header("Location: /");
}
incluirTemplate('header');


$db = conectarDB();

//OBTENER VENDEDORES
$sql = "select * from vendedores";
$resultado = mysqli_query($db,$sql);

$errores = Propiedad::getErrores();

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$baños = '';
$estacionamiento = '';
$idVendedores = '';
$creado = date('Y/m/d');

if($_POST === []){
ECHO '';
}

else{
  //la IMAGEN NO SE L APODEMOS PASAR, YA QUE LA GENERAMOS LUEGO DE FORMA RANDOM.
  $propiedad = new Propiedad($_POST);
 
   //GENERAR NOMBRE UNICO
   $nombreImg = md5(uniqid(rand(),true)) . ".jpg";


   if($_FILES['imagen']['tmp_name']){
     //REALIZA UN RESIZE A LA IMAGEN 
      $imagen = imagen::make($_FILES['imagen']['tmp_name'])->fit(800,600); //APLICO INTERVENTION IMAGE, LIBRERIA DE PHP PARA RECORTAR Y MINIMIZAR UNA IMAGEN
      
      //SETEO EL NOMBRE DE LA IMAGEN
      $propiedad->setImagen($nombreImg);
   }
    //GUARDO EN UN ARRAY, LOS ERRORES POSIBLES.
    $errores = $propiedad->validarErrores();

  //LEER LOS VALORES
    // $imagen = $_FILES['imagen'];
// $titulo = mysqli_real_escape_string($db,$_POST['titulo']);
// $precio = mysqli_real_escape_string($db,$_POST['precio']);
// $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
// $habitaciones =mysqli_real_escape_string( $db,$_POST['habitaciones']);
// $baños = mysqli_real_escape_string($db,$_POST['baños']);
// $estacionamiento = mysqli_real_escape_string($db,$_POST['estacionamiento']);
// $idVendedores = mysqli_real_escape_string($db,$_POST['vendedorId']);


if(empty($errores)){

//controlo si existe una carpeta mediante una constante que tiene una direccion almacenada
  if(!is_dir(CARPETA_IMAGENES)){
    mkdir(CARPETA_IMAGENES);
  }

  //GUARDO IMAGEN EN EL SERVIDOR:
  $imagen->save(CARPETA_IMAGENES . $nombreImg);

  //GUARDAR EN LA BASE DE DATOS IMAGEN:

  $propiedad->guardar(); //LLAMAMOS AL METODO GUARDAR PARA INSERTAR LOS DATOS INGRESADOS EN LA BASE DE DATOS.


  //INSERTAR EN LA BASE DE DATOS lo hacemos ahora en propiedad.php

  if($resultado){
    //REDIRECCIONAR AL USUARIO EN CASO DE QUE HAYA ENVIADO YA EL FORMULARIO
    header('Location: /adminp?resultado=1'); //REDIRECCIONAMOS A INDEX.PHP Y LE MANDAMOS UN 1
  }

}
}

?>
  
    <main class="contenedor-seccion">
 
    <h1>Titulo pagina crear</h1>
    </main>
    <a style ="display:inline-block; padding:1rem 1rem; margin: 0 1rem" href="/adminp/index.php" class="boton boton-amarillo">Volver a administrador</a>

    <form class="formulario" method = "POST" action="#" enctype="multipart/form-data">

      <?php

        foreach($errores as $error){
          ?>
          <div class="alerta error">

          <?PHP echo $error;?>


          </div>
          
        <?php } ?>
      
      

      <fieldset>
        <legend>Informacion General de la propiedad</legend>
        <label for="titulo">Titulo de la propiedad</label>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value = "<?php  echo $titulo = '' ? 'Titulo propiedad' : $titulo; ?>">

        <label for="precio">Precio de la propiedad</label>
        <input type="number" name="precio" id="precio" placeholder="Precio de la propiedad" value ="<?php  echo $precio = '' ? 'Titulo propiedad' : $precio; ?>">

        <label for="imagen">Imagen de la propiedad</label>
        <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

        <label for="descripcion"></label>
        <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion de la propiedad" value = "<?php echo $descripcion = '' ? 'Ingresa una descripcion mayor a 50 caracteres' : $descripcion; ?>"> 

      </fieldset>


      <fieldset>
      <legend>Informacion de la propiedad</legend>

      <label for="habitaciones">Habitaciones</label>
      <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" value = "<?php echo $habitaciones = '' ? 'Ingresa Habitaciones' : $_POST['habitaciones']; ?>">

      <label for="baños">Baños</label>
      <input type="number" name="baños" id="baños" placeholder="Ej: 3" min="1" value = "<?php echo $baños = '' ? 'Ej: 3' : $baños; ?>">

      <label for="estacionamiento">Estacionamiento</label>
      <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" 
      value = "<?php echo $estacionamiento = '' ? 'Ej:3' : $estacionamiento; ?>">

      </fieldset>

      <fieldset>
      <legend>Vendedor</legend>

      <select name='Vendedores_idVendedores' id='Vendedores_idVendedores'>
        <option value="" selected>--- Seleccione ---</option>
        <?php while ($vendedor = mysqli_fetch_assoc($resultado)){ //LEO TODOS LOS RESULTADOS POSIBLES DE LA CONSULTA 

            ?>
            <option  <?PHP echo $idVendedores === $vendedor['idVendedores'] ? 'selected' : '';?> value="<?php echo $vendedor['idVendedores'];?>"><?php echo $vendedor['nombre'] . ' '. $vendedor['apellido'];?>
          </option> <!--IMPRIMO
          Y CONTATENO, NOMBRE CON APELLIDO-->
          
          <?php }?>
          
          
       
      </select>

      </fieldset>

      <input type="submit" value="Crear propiedad" class="boton-amarillo">
 
    </form>


    <?php incluirTemplate('footer');?>


 
   
</body>
</html>

