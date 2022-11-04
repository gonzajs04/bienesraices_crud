<?php require 'includes/app.php';
    incluirTemplate('header');
   

    $db = conectarDB();
    $errores=[];

    if($_POST === []){
        echo '';
    }else{
       
        $email =  mysqli_real_escape_string($db,filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

      
        $pass = mysqli_real_escape_string($db,$_POST['pass']);

  
        if(!$email || $email === ''){
            $errores[] = "Debes añadir un correo electronico"; 
        
        }
        if(!$pass || $pass== ''){
            $errores[] = "Debes añadir una contraseña";
        
        }
     
        if(empty($errores)){
           
         $sql = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db,$sql);
            
            if($resultado->num_rows){

                //LEO LOS DATOS DE LOS USUARIOS
                $usuario = mysqli_fetch_assoc($resultado);

                //VERIFICO SI LA CONTRASEÑA DEL USUARIO DE LA BASE DE DATOS, ES IGUAL A LA INGRESADA.
                $auth = password_verify($pass,$usuario['password']);
             

                if($auth){ // en caso de que las contraseñas sean iguales
                    //INICIA LA SESION
                    session_start(); //INICIAMOS LA SUPERGLOBAL $_SESSION

                    $_SESSION['usuario'] = $usuario['email']; //GUARDAMOS EN EL ARRAY DE SESSION UN USUARIO CON EL MAIL CORRESPONDIENTE.

                    $_SESSION['login'] = true;

                    header("Location: /adminp/index.php");


                }else{
                    $errores[] = "La CONTRASEÑA no es correcta"; //NOS ARROJA ERROR, DE QUE NO ES CORRECTA.
                }
               

            }else{
                $errores[] = "No existe ningun mail como el que ingresaste";
            }
        }
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<?php foreach ($errores as $error) {?>
    <div class="alerta error">
        <?php echo $error;?>
    </div>
<?php }?>

<div class="contenedorg-login">
   
    <form method="POST" class="form-login" >
    <h2>Iniciar sesion</h2>
    <span></span>
    
   
    <label for="email"></label>
    <input class= "input-email" type="email" name="email" id="email" placeholder="tumail@Correo.com" value  = "<?php echo $_POST['email'];?>" >
   
    
    <label for="pass"></label>
    <input class = "input-pass" type="password" name="pass" id="pass" placeholder="Ingrese su contraseña" >
   

   
        <input  class="boton-verde-block" type="submit" value="Iniciar sesion">
        <a href="">Te olvidaste tu contraseña?</a>


    </form>


</div>

    
</body>
</html>




<?php incluirTemplate('footer')?>