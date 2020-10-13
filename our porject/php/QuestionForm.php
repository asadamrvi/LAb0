<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style>

.questionBox {
  background-color: rgb(211,211,211);
  //width: 300px;
  border: 15px groove;
  padding: 50px;
  margin: 20px;
}

  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div class="questionBox">
      <form id='questionForm' name='fquestion' action='AddQuestion.php'>
  <label>Email*:</label>
    <input type="text" id="fEmail" name="fEmail"> <br>
  <label>Enunciado de la pregunta*:</label>
    <input type="text" id="fQuestion" name="fQuestion"> <br>
  <label>Respuesta Correcta*:</label>
    <input type="text" id="fCorrecta" name="fCorrecta"> <br>
  <label>Respuesta Incorrecta*:</label>
    <input type="text" id="fIncorrecta1" name="fIncorrecta1"> <br>
  <label>Respuesta Incorrecta*:</label>
    <input type="text" id="fIncorrecta2" name="fIncorrecta2"><br>
  <label>Respuesta Incorrecta*:</label>
    <input type="text" id="fIncorrecta3" name="fIncorrecta3"><br>
  <label>Complejidad:</label>
     <select id="complejidad">
        <option value="baja">Baja</option>
        <option value="mediana">Media</option>
        <option value="alta">Alta</option>
     </select> <br><br>

  <input type="submit" value="Enviar Solicitud" id="submit">
</form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
