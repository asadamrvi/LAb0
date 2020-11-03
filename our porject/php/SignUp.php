<!DOCTYPE html>
<html>
   <head>
      <?php include '../html/Head.html'?>
      <link rel="stylesheet" type="text/css" href="../styles/ourcss.css"/>
   </head>
   <body>
      <?php include '../php/Menus.php' ?>

            <?php
               $errMail=$errName=$errPass=$errRePass="";
               $email=$nombre=$password=$passwordRepetido=FALSE;

               if($_SERVER["REQUEST_METHOD"] =="POST") {

                  $tipoUsuario = ($_POST["fTipoUsuario"]);

                  if(empty($_POST["fEmail"])) {
                     $errMail ="Email cannot be empty!";
                  }
                  if ($_POST["fTipoUsuario"]=="alumno") {

                     if(!filter_var($_POST["fEmail"], FILTER_VALIDATE_REGEXP,array("options" => array("regexp"=>"/^(\s)*[a-z]+[0-9]{3}(\@ikasle.ehu.){1}(eus|es){1}(\s)*$/i")))) {
                        $errMail = "Email is not valid";
                     }

                     else {
                        $correo = validData($_POST["fEmail"]);
                        $email=TRUE;
                     }
                  }
                  else {
                     if(!filter_var($_POST["fEmail"], FILTER_VALIDATE_REGEXP,array("options" => array("regexp"=>"/^(\s)*[a-z]+(\.{1}[a-z]*)?\@ehu.{1}(eus|es){1}(\s)*$/i")))) {
                        $errMail = "Email is not valid";
                     }

                     else {
                        $correo = validData($_POST["fEmail"]);
                        $email=TRUE;
                     }
                  }

                  if(empty($_POST["fNombreApellido"])) {
                     $errName ="The name cannot be empty!";
                  }

                  elseif(!filter_var($_POST["fNombreApellido"], FILTER_VALIDATE_REGEXP,array("options" => array("regexp"=>"/([a-zA-Z]+\s?\b){2,}/")))) {

                     $errName = "The name should be at least two words";
                  }

                  else {
                     $name = validData($_POST["fNombreApellido"]);
                     $nombre=TRUE;
                  }


                  if (empty($_POST["fPassword"])) {
                     $errPass ="The password cannot be empty";
                  }

                  elseif(strlen($_POST["fPassword"])<6) {

                     $errPass = "The password must have at least 6 characters";
                  }

                  else {
                     $pass = validData($_POST["fPassword"]);
                     $password=TRUE;
                  }


                  if ((empty($_POST["fRepeatPassword"])) or (($_POST["fRepeatPassword"])!= ($_POST["fPassword"]))) {

                     $errRePass ="The password does not match!";
                  }
                  else {

                     $repeatPass = validData($_POST["fRepeatPassword"]);
                     $passwordRepetido=TRUE;
                  }

                  if($email and $nombre and $password and $passwordRepetido) {
                    require_once('DbConfig.php');


                     $connection=mysqli_connect("$server","$user","$pass","$basededatos_registro");

                     if (!$connection) {

                        echo ' Database Error Occured ';
                     }

                     $selectQuery="SELECT * FROM `usuario` WHERE `email`= '$correo' ";

                     $selectResult=mysqli_query($connection,$selectQuery);

                     if(!$selectResult) {
                        echo 'Select Query Failed';
                     }

                     if (mysqli_num_rows($selectResult) == 0) {

                        $InsertQuery="INSERT INTO `usuario` (`tipousuario`, `email`, `nombre`, `password`, `repassword`) VALUES ('{$tipoUsuario}', '{$correo}', '{$name}', '{$pass}', '{$repeatPass}')";

                        $InsertResult=mysqli_query($connection,$InsertQuery);

                        if (!$InsertResult) {
                           echo 'Insert Query Failed ';
                        }

                        if (mysqli_affected_rows($connection) == 1) {

                           echo("<script>
                           alert ('You have successfuly registered:". $correo ."')
                           window.location.href='LogIn.php';
                           </script>");

                        }
                     }

                     else {

                        echo("<script> alert ('This email is already associated with an account:". $correo . "')</script>");

                     }

                     mysqli_close($connection);
                  }



                 }

                 function validData($data) {
                  $data = trim($data);
                  //$data = stripcslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
                 }

               ?>

      <section class="main" id="s1">
         <div class="signUpBox" style="align:center">
            <form id='signUpForm' name='signUpForm' action="" method="post">
               <table class="tt">
                  <tr>
                     <td><label>Tipo Usuario*:</label>
                        <input type="radio" id="alumno" name="fTipoUsuario" value="alumno" checked="checked">
                        <label>Alumno</label>
                        <input type="radio" id="profesor" name="fTipoUsuario" value="profesor">
                        <label>Profesor</label>
                     </td>
                  </tr>
                  <tr>
                     <td><label>Email*:</label></td>
                     <td><input type="text" id="fEmail" name="fEmail"></td>
                     <td><?php echo $errMail;?></td>
                  </tr>
                  <tr>
                     <td><label>Nombre y Apellidos*:</label></td>
                     <td><input type="text" id="fNombreApellido" name="fNombreApellido"> </td>
                     <td><?php echo $errName;?></td>
                  </tr>
                  <tr>
                     <td><label>Password*:</label></td>
                     <td><input type="password" id="fPassword" name="fPassword"> </td>
                     <td><?php echo $errPass;?></td>
                  </tr>
                  <tr>
                     <td><label>Repeat Password*:</label></td>
                     <td><input type="password" id="fRepeatPassword" name="fRepeatPassword"> </td>
                     <td><?php echo $errRePass;?></td>
                  </tr>
                  <tr>
                     <td> <label>Enviar Solicitud:</label></td>
                     <td><input type="submit" value="Enviar Solicitud" id="submit"></td>
                  </tr>
               </table>
            </form>
         </div>
      </section>
      <?php include '../html/Footer.html' ?>
   </body>
</html>
