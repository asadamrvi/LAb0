<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script type="text/javascript" src="../js/ShowQuestionsAjax.js"></script>
  <script type="text/javascript" src="../js/AddQuestionsAjax.js"></script>
  <script type="text/javascript" src="../js/CountQuestionsAjax.js"></script>
  <script type="text/javascript" src="../js/showUsers.js"></script>


    <link rel="stylesheet" type="text/css" href="../styles/ourcss.css"/>


</head>
<body>
  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div class="questionBox" style="align:center">
      <div style="text-align:center; border-color:black; border-style:dotted; width:40%; margin:auto;">
        <p> Mis preguntas / Preguntas totales </p>
        <div id='preg'> </div>
        <br>

        <p>Usuarios conectados</p>
        <div id='contador'></div>
      </div>

	  <table class="tt">
  <tr>
    <td><label>Email*:</label></td>
    <td>


      <?php
      if (isset($_GET['cont'])==1) {

        $email=$_GET['email'];

        echo "<form id='questionForm' name='fquestion' action='AddQuestion.php?email=$email' method='get'>";

        echo "<input type='text' id='email' name='email' value='$email' readonly>";

      }
      else {
        echo "<form id='questionForm' name='fquestion' action='AddQuestion.php' method='get'>";
        echo "<input type='text' id='email' name='email'>";
      }

       ?></td>
       <td><span id="emailerror"></span> </td></tr>
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
  <td><input type="button" value="Ver Preguntas" id="verpreg" onclick="loadDoc()">
    <input type="button" value="Insertar Pregunta" id="insertpreg"  >
    <input type="Reset" value="Reset" id="resett" onclick="rese()"  >
  </td>

  <td><span id="submiterror"></span></td>

  </tr>

  </table>

</form>
<div style="text-align: center; margin:auto;" id="enviar"></div>

    </div>
    <div id="err" ></div>


  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>
