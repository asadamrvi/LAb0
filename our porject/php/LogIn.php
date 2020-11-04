<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>

    <link rel="stylesheet" type="text/css" href="../styles/ourcss.css"/>

</head>
<body>


<?php include '../php/Menus.php' ?>


  <section class="main" id="s1">

   <div class="loginBox" style="align:center">
      <form action="" method="post">
         <table class="tt">
            <tr>
               <td><label>Email*: </label></td>
               <td><input type="email" required name="email" size="21" value=""/> </td><br>
            </tr>

            <tr>
               <td><label>Password*: </label></td>
               <td><input type="Password" required name="pass"/></td><br>


            </tr>

            <tr>
               <td> <label>Entrar: </label></td>
               <td><input type="submit" value="Entrar" id="submit" align="center"></td><br>

            </tr>
            <br>
         </table>
      </form>
   </div>
</section>


 <?php include '../html/Footer.html' ?>
</body>
</html>
<?php

  if (isset($_POST['email'])){
    require_once('DbConfig.php');

    $mysql= mysqli_connect($server, $user, $pass, $basededatos);
       if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    $username=$_POST['email'];
    $pass=md5($_POST['pass']);
    $usuarios = mysqli_query( $mysql,"SELECT * FROM `usuario` WHERE `email`= '$username'  and password ='$pass'");

    $cont= mysqli_num_rows($usuarios);

    mysqli_close( $mysql); //cierra la conexion

    if($cont==1){




     echo("<script> alert ('Bienvenido al sistema:". $username ."')
     window.location.href='Layout.php?email=$username&cont=1';</script>");




      }
    else {
      echo ("Par&aacute;metros de login incorrectos ");

      }

    }

  ?>
