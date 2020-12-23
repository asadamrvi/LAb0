<?php
session_start();
?>

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

    mysqli_close( $mysql); //cierra la conexion

    $datos = mysqli_fetch_array($usuarios);

        if ($datos[1] == $username && $datos[3] == $pass) {


          if($datos[0]=='admin@ehu.es'){
            $_SESSION['username']=$username;
               echo("<script> alert('Bienvenido al sistema ADMIN');
                window.location.href='Layout.php';
                </script>");
            }

          else {

            if($datos[4]=='ACTIVO'){
              $_SESSION['username']=$username;
              $_SESSION['avatar']=$datos[5];

              
              
               echo "<script> alert ('Bienvenido al sistema:". $username ."');
                window.location = 'IncreaseGlobalCounter.php';</script>";


              }
            else{
              echo "<script>
               alert('". $username ." tu cuenta está bloqueda, contacta con administrador');
               window.location.href='Layout.php';
               </script>";
          }

          }
        }

        else


        {
          echo("<script>alert('Parametros de login incorrectos')</script>");
        }


    }


  ?>
