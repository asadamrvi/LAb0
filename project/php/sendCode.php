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
      <h3>Enter Your Mail</h3>
      <br>

      <legend align="center">Reset YOur Code</legend>
      <br><br>
      <form action="" method="post">
        Email:*<br><input name="email"  type="text"><br>
        <br>
        <input type="submit" name="send" value="send">

      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>

<?php
if (isset($_POST['send'])) {

  function alert($mensaje)
  {
    echo "<script type='text/javascript'>alert('$mensaje');  </script>";
  }

  function alertredirect($mensaje, $email){
    echo "<script type='text/javascript'>alert('$mensaje'); window.location.href = 'Layout.php'; </script>";
  }

  $email = $_POST['email'];

 $codigo = md5(random_int(99, 9999));

  require_once('DbConfig.php');
  $conexion = mysqli_connect($server, $user, $pass, $basededatos);
  $usuario ="SELECT email  from usuario where email ='$email'";
  

 
 
  
  if(!mysqli_num_rows($conexion->query($usuario))) {
    echo "<script type='text/javascript'>alert('Email no registrado o incorrecto');  </script>";
}else{
  $sqll= "DELETE FROM codes WHERE email='$email'";
  $conexion->query($sqll); 
        $sql = "INSERT INTO codes ( email, code) 
        VALUES( '$email', '$codigo')";
  
        $conexion->query($sql) ;
        $conexion->close();
        $des="Change Password";
                        $mensaje="<html>
                                    <head>
                                      <title> Change Your Password</title>
                                    </head>
                                    <body>
                                      <h3> Reset Your Password by clicking on the link below.</h3>
                                      <h3>".$codigo."</h3>
                                    <h2> <a href='https://twisting-advances.000webhostapp.com/lab/project/php/reset.php?codigo=".$codigo."&email=".$email."'>Cambiar Contraseña</a></h2>
                                    </body>
                                  </html>";
                        $headers="MIME-Version: 1.0"."\r\n";
                        $headers.="Content-type:text/html;charset=UTF-8"."\r\n";
                        mail($email,$des,$mensaje,$headers);
                        alert("You have sent email, please try 1,2 more time if you dont receive at first");


}
  
}
?>