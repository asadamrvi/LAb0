<?php
session_start();?>
<!DOCTYPE html>
<html>

<head>
  <script src="../js/jquery-3.4.1.min.js"></script>
    <?php include '../html/Head.html' ?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <br>

      <legend align="center">Restablecer</legend>
      <br><br>
      <form action="" method="post" >
        
        Contraseña:*<br><input  name="password"  type="password"><br>
        Repite la contraseña:*<br><input  name="passwordr"  type="password"><br>
        <br>
        <input type="submit"  name="enviar" value="Enviar">

      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>

<?php

function ValidateRegisterPHP($password, $passwordr)
{
if (preg_match("/.{6,}$/", $password) == 0) {
    alert("Error, el servidor dice que las contraseñas son cortas (min. 6 caracteres).");
    return false;
  }

  if ($password != $passwordr) {
    alert("Error, el servidor dice que las contraseñas no coinciden.");
    return false;
  }
  return true;
}
if (isset($_POST['enviar'])) {

  function alert($mensaje)
  {
    echo "<script type='text/javascript'>alert('$mensaje');</script>";

  }
  $password = $_POST['password'];
  $passwordr = $_POST['passwordr'];
  
 
if(ValidateRegisterPHP($password,$passwordr)){
  $password = md5($password);  
  require_once('DbConfig.php');
  $codigo = (string)$_GET['codigo'];
  $email =  (string)($_GET['email']);
  
  $conexion = mysqli_connect($server, $user, $pass, $basededatos);
  $usuario ="SELECT code  from codes where email ='$email'";
  $miusuario = mysqli_fetch_array($conexion->query($usuario));
  if ($miusuario[0] == $codigo ){
  $sql= "UPDATE usuario SET password='$password' WHERE email='$email'";
  if(mysqli_query($conexion, $sql)===TRUE){
      $sqll= "DELETE FROM codes WHERE email='$email'";
      $conexion->query($sqll);
      
        echo "<script type='text/javascript'>alert('You have changed Your code Successfully'); window.location.href = 'LogIn.php'; </script>";
  }

    }else{
        echo "<script type='text/javascript'>alert('Invalid Code, Please try again.'); window.location.href = 'sendCode.php'; </script>";


    }
    $conexion->close();
}

  }

?>