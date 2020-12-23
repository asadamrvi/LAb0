<!DOCTYPE html>
<html>

<head>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript">
  var test1=false;
  </script>
  <script type="text/javascript" src="../js/ShowImageInForm.js"></script>
  <script type="text/javascript" src="../js/VerifyPassEmail.js"></script>
  <script type="text/javascript" src="../js/checkvip.js"></script>
  <script type="text/javascript" src="../js/passcheck.js"></script>
  <?php include '../html/Head.html' ?>
  <style >
  .preview {
  height:100%;
  display:flex;
  align-items:center;
  justify-content:center;
}
.preview  img {
width:10%;
display:none;
margin-top:10px;
}
  </style>
</head>

<body>
  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div>
      <h3>Introduce tus datos</h3>
      <p><span class="error">* Campo obligatorio</span></p>
      <br>
      <form id="registro"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        ¿Eres alumno o profesor ? :
        <select name="tipo" id="nivel">

          <option value="1">Alumno</option>
          <br>
          <option value="2">Profesor</option>
        </select><br><br>
        Email*: <br><input id="email" name="email" size="75" type="text"><br><span id="mail"></span>
        <br>
        Nombre y Apellidos*: <br><input id="nombre" name="nombre" size="75" type="text">
        <br>
        Contraseña*: <br><input id="password" name="password" size="75" type="password"><br><span id="pass"></span>
        <br>
        Repetir contraseña*: <br><input id="passwordr" name="passwordr" size="75" type="password">
        <br>
        Upload Your Image:<br><input type="file" name="image_" value="image_" onchange="showPreview(event);">
        <br>
        <div class="preview">
      <img id="file-ip-1-preview">
    </div>
        <br>
         <input type="submit" name="submit"id="Boton" value="Registrarse">

      </form>


    </div>
  </section>
  <?php include '../html/Footer.html' ?>
  <?php
  if (isset($_POST['submit'])) { //check if form was submitted

    function alert($mensaje)
    {
      echo "<script type='text/javascript'>alert('$mensaje');  window.history.go(-1);</script>";
    }

    function alertredirect($mensaje){
      echo "<script type='text/javascript'>alert('$mensaje'); window.location.href = 'LogIn.php'; </script>";
    }

    function ValidateRegisterPHP($email, $password, $passwordr, $nombre, $tipo)
    {

      if (preg_match("/(((^[a-zA-Z]+)([0-9]{3})@ikasle\.ehu\.(eus|es))|((^[a-zA-Z]+)\.?([a-zA-Z]*)@ehu\.(eus|es)))$/", $email) == 0) {
        alert("Error, el servidor dice que el email no es correcto.");
        return false;
      }

      if (($tipo == 1 && preg_match("/((^[a-zA-Z]+)\.?([a-zA-Z]*)@ehu\.(eus|es))$/", $email) == 1)
        ||($tipo == 2 && preg_match("/((^[a-zA-Z]+)([0-9]{3})@ikasle\.ehu\.(eus|es))$/", $email) == 1)) {
        alert("Error, el servidor dice que el email no concuerda con el tipo de usuario.");
        return false;
      }

      if (preg_match("/.{6,}$/", $password) == 0) {
        alert("Error, el servidor dice que las contraseñas son cortas (min. 6 caracteres).");
        return false;
      }

      if ($password != $passwordr) {
        alert("Error, el servidor dice que las contraseñas no coinciden.");
        return false;
      }

      if (preg_match("/^[A-Za-z]+(\s[A-Za-z]+){1,}$/", $nombre) == 0) {
        alert("Error, el servidor dice que tiene que haber al menos 2 palabras.");
        return false;
      }

      if ($tipo != (1 || 2)) {
        alert("Error, el servidor dice que hay un fallo en el tipo de usuario.");
        return false;
      }

      return true;
    }

    require_once('DbConfig.php');

    $conexion = mysqli_connect($server, $user, $pass, $basededatos);
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $passwordr = $_POST['passwordr'];
    $tipo = $_POST['tipo'];
    //$estado = "ACTIVO";

    if (ValidateRegisterPHP($email, $password, $passwordr, $nombre, $tipo)) {
      $avatar="../images/avatar.jpg";
      if(isset($_FILES['image_']) && !empty($_FILES["image_"]["name"])){
        $error="empty";
        $file_name=$_FILES['image_']['name'];
        $file_size=$_FILES['image_']['size'];
        $file_tmp=$_FILES['image_']['tmp_name'];
        $file_type=$_FILES['image_']['type'];
        $file_ext=strtolower(end(explode('.',$file_name)));
        $extensions=array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions)===false){
          $error="You can only add PNG,JPEG,JPG";
          alert($error);
        }
        if(strcmp ($error,"empty")==0){
          move_uploaded_file($file_tmp,"../images/".$file_name);
          $avatar="../images/".$file_name;
          
        //  alert("image saved");
        }
          else {
            die();
          }
      }
      
      
      $password = md5($password);
        $sql = "INSERT INTO usuario (tipousuario, email , nombre, password,estado,avatar)
        VALUES( '$tipo','$email', '$nombre','$password','ACTIVO','$avatar')";

        if ($conexion->query($sql) === TRUE) {
          alertredirect("Registro completado exitosamente.");
        } else {
          alert("Error, algo salio mal al insertar los datos en la BD.");
        }

    
    } else {
      alert("Error, no cumples los parametros para registrarte.");
    }

    $conexion->close();
  }
  ?>
</body>

</html>
