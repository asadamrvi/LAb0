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
