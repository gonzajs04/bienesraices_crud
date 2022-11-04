<?php 
namespace App;


class Propiedad{

   //BASE DE DATOS
   protected static $db; //DEFINIMOS UN ATRIBUTO ESTATICO PARA QUE NO NOS HAGA UNA NUEVA CONEXION POR CADA VEZ QUE INSTANCIEMOS
   protected static $columnasDB = ['idPropiedades','titulo','precio','imagen','descripcion','habitaciones','baños','estacionamiento','creado','Vendedores_idVendedores'];

   //ARRAY DE ERRORES
   protected static $errores = [];

   public $id;
   public $titulo;
   public $precio;
   public $imagen;
   public $descripcion;
   public $habitaciones;
   public $baños;
   public $estacionamiento;
   public $creado;
   public $Vendedores_idVendedores;

   public function __construct($args =[])
   {
    $this->id = $args['id'] ?? '';
    $this->titulo = $args['titulo']?? '';
    $this->precio = $args['precio']  ?? '';
    $this->imagen = $args['imagen']?? '';
    $this->descripcion = $args['descripcion']?? '';
    $this->habitaciones =$args['habitaciones']?? '';
    $this->baños = $args['baños']?? '';
    $this->estacionamiento = $args['estacionamiento']?? '';
    $this->creado = date('Y/m/d');
    $this->Vendedores_idVendedores = $args['Vendedores_idVendedores'] ?? '';

      
   }

   public function guardar(){
      //LA IMAGEN AL NO FORMAR PARTE DEL POST, Y EL NOMBRE LO GENERAMOS DE MANERA RANDOM, NO LO PODEMOS INSERTAR AHORA.
    //INSERTAR EN LA BASE DE DATOS

      //SANITIZAR DATOS
     $atributos = $this->sanitizarDatos();
    
     $columnas = join(', ',array_keys($atributos));
     $filas = join("', '",array_values($atributos));

  
   //*  Consulta para insertar datos
      $sql = "INSERT INTO propiedades($columnas) VALUES ('$filas')";
   // debuguear($query);   
      $resultado = self::$db->query($sql); //USAMOS SELF PARA REFERIRNOS A LA VARIABLE DE DB ESTATICA Y LE PASAMOS LA SENTENCIA SQL DE INSERT
      


   }

   public function sanitizarDatos(): array{

      $atributos = $this->atributos(); //LLAMO A LA FUNCION ATRIBUTOS QUE NOS VA A RETORNAR
      $sanitizado = [];

      foreach ($atributos as $key => $value) {
         $sanitizado[$key] = self::$db->escape_string($value);
         //HAGO REFERENCIA A CADA POSICION DEL ARRAY DE ATRIBUTOS Y CON ESCAPE_STRING($VALUE) SANITIZO LOS VALORES
      }

      return $sanitizado;
      
   }

   //IDENTIFICAR Y UNIR LOS ATRIBUTOS DE LA BD
   public function atributos(){
      $atributos = [];
      foreach (self::$columnasDB as $columnas) { //RECORRO EL ARRAY Y HAGO REFERENCIA A LAS POSICIONES CON $COLUMNAS
    
         if($columnas === 'idPropiedades') continue; //SI LA COLUMNA ES LA ID, QUE LO SALTEE, NO LO GUARDE EN EL ARRAY Y PROSIGA CON EL CODIGO
         
         $atributos[$columnas] = $this->$columnas; 
      
         //GUARDO DENTRO DE CADA POSICION EN EL ARRAY DE ATRIBUTOS, EL VALOR DE CADA ATRIBUTO CON REFERENCIA AL OBJETO QUE TIENE ALMACENADO EN MEEMORIA RECIBIDO POR POST, EJEMPLO, TITULO: HERMOSA CASA EN LA PLAYA, ´PRECIO: 2222
      
      }

      return $atributos; //RETORNO EL ARRAY DE ATRIBUTOS
   }

   //DEFINIMOS LA DB estatica global a la que recibimos del app.php por la conexion
   public static function setDB($db){
      self::$db = $db;
   }




   //ERRORES ----------------------------------

   public static function getErrores(){
      return self::$errores;
   }

//VERIFICAR SI HAY ERRORES
   public function validarErrores(){
      if(!$this->titulo){
         self::$errores[] = "Debes añadir un titulo";
       }
       
       if(!$this->precio){
         self::$errores[] = "Debes añadir un PRECIO";
       }

       if(strlen($this->descripcion)<5){
          self:: $errores[] = "Debes añadir una descripcion con mas de 5 caracteres";
        }
       
       if(!$this->habitaciones){
         self::$errores[] = "Debes añadir CANTIDAD DE HABITACIONES OBLIGATORIAMENTE";
        }
       
       if(!$this->baños){
        self:: $errores[] = "Debes añadir CANTIDAD DE BAÑOS OBLIGATORIAMENTE";
       }
        if(!$this->estacionamiento){
         self:: $errores[] = "Debes añadir CANTIDAD DE ESTACIONAMIENTOS OBLIGATORIAMENTE";
        }
   
        if(!$this->imagen){
            self::$errores[] = "Debes añadir una imagen";
        }
       
        if(!$this->Vendedores_idVendedores){
          self:: $errores[] = "Debes añadir un VENDEDOR";
       }

         return self::$errores;
   }


   public function setImagen($imagen){
      //ASIGNAR NOMBRE DE LA IMAGEN
      if($imagen){
         $this->imagen = $imagen;
    
      }

   }

   //LISTAMOS TODAS LAS PROPIEDADES
   public static function all(){

      $query = "SELECT * FROM propiedades"; 
      $resultado = self::consultarSQL($query);

      return $resultado;

        
   }

   public static function consultarSQL($query){
      //CONUSLTAR LA BASE DE DATOS
      $resultado = self::$db->query($query);
     
      //ITERAR LOS RESULTADOS

      $array = [];

      while($registro = $resultado->fetch_assoc()){ //TRAEMOS TODOS LOS RESULTADOS DE LA BASE DE DATOS.

         $array[] = self::crearObjeto($registro); //llamo una funcion crearobjeto, le paso los registros y 
         //guardo dentro de un array todos los objetos de propiedad.
     
      }
      
      //LIBERAR LA MEMORIA DE LOS RESULTADOS DE LA COBNSULTA
      $resultado ->free(); 

      //RETORNAR LOS RESULTADOS

      return $array;

   }

   protected static function crearObjeto($registro){
         $objeto = new self; //CREO UNA NUEVA INSTANCIA DE OBJETO QUE TENGA LAS MISMAS COLUMNAS VACIAS SIN ISNTANCIAR.
    
         foreach ($registro as $key => $value) {
            if(property_exists($objeto,$key)){ //COMPARA OBJETO COLUMNAS DE OBJETO CON LAS COLUMNAS DE LA BASE DE DATOS, ID, IMAGEN, TITULO, PRECIO
         
               $objeto->$key = $value;        
              
               }
       
         }
     
          return $objeto;
}
 
}




?>

