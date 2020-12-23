<?php
session_start();
if (isset($_SESSION['username'])) {
  if ($_SESSION['username'] == "") {
    echo '<script type="text/javascript">
			alert("Create or Login to Your Account");
        window.location.href="Layout.php";
        </script>';
  }
    if ($_SESSION['username'] == "admin@ehu.es") {
    echo '<script type="text/javascript">
        alert("ONly for Profesores");
        window.location.href="Layout.php";
        </script>';
  }
} else {
  echo '<script type="text/javascript">
      alert("Registrate o entra con tu cuenta");
      window.location.href="Layout.php";
      </script>';
}
?>
<html>

<head>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/searchQuestion.js"></script>


  <?php include '../html/Head.html' ?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main">
    <div>

      <br><br>
      <form action="" method="get">
        Introduce Id de Pregunta:*<br><input id="pregunta" name="email" size="75" type="number"><br>


        <br>
        <input type="button" id="search" name="enviar" value="MostrarPregunta">

      </form>
      <br>
      <div id="error"></div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>
