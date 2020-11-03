<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link rel="stylesheet" type="text/css" href="../styles/ourcss.css"/>


</head>
<body>
  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div class="questionBox" style="align:center">
      <form id='questionForm' name='fquestion' action="AddQuestion.php" method="get">
	  <table class="tt">
  <tr><td><label>Email*:</label></td>
    <td><input type="text" id="email" name="email"></td> <td><span id="emailerror"></span> </td></tr>
  <tr>
  <td><label>Enunciado de la pregunta*:</label></td>
    <td><input type="text" id="fQuestion" name="fQuestion"> </td>
	<td><span id="preguntacheck"></span> <br></td>
	</tr>

	<tr>
 <td> <label>Respuesta Correcta*:</label></td>
  <td>  <input type="text" id="fCorrecta" name="fCorrecta"> </td>
  <td><span id="respuestacheck"></span> <br></td>

	</tr>



	<tr>
 <td> <label>Respuesta Incorrecta*:</label></td>
 <td>   <input type="text" id="fIncorrecta1" name="fIncorrecta1"> </td>
 <td><span id="incorrectcheck1"></span> </td>
	</tr>

	<tr>
 <td> <label>Respuesta Incorrecta*:</label></td>
   <td> <input type="text" id="fIncorrecta2" name="fIncorrecta2"></td>
   <td><span id="incorrectcheck2"></span> </td>
	</tr>

	<tr>
 <td> <label>Respuesta Incorrecta*:</label></td>
  <td>  <input type="text" id="fIncorrecta3" name="fIncorrecta3"> </td>
     <td><span id="incorrectcheck3"></span> </td>
</tr>

<tr>
<td> <label>Tema*:</label></td>
<td><input type="text"  id ="tema"name="tema"></td>
<td><span id="temaspan"></span></td>

</tr>

<tr>
 <td> <label>Complejidad:</label></td>
    <td> <select name="complejidad" id="complejidad">
        <option value="1">1-Baja</option>
        <option value="2">2-Media</option>
        <option value="3">3-Alta</option>
     </select></td>
<td><span id="complexcheckerror"></span> </td>
</tr>
  <tr>
  <td> <label>Insertar Pregunta:</label></td>
  <td><input type="submit" value="Enviar Solicitud" id="submit"></td>
  <td><span id="submiterror"></span></td>

  </tr>

  </table>
</form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
