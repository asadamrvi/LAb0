<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php

       $email= $_GET['email'];
       $question= $_GET['fQuestion'];
       $correct= $_GET['fCorrecta'];
       $wrong1= $_GET['fIncorrecta1'];
       $wrong2= $_GET['fIncorrecta2'];
       $wrong3= $_GET['fIncorrecta3'];
       $complexity= $_GET['complejidad'];
       $tema= $_GET['tema'];
       function ValidateFieldsPHP($email, $pregunta, $respc, $resp1, $resp2, $resp3, $tema, $complejidad)
             {

               if (preg_match("/(((^[a-zA-Z]+)([0-9]{3})@ikasle\.ehu\.(eus|es))|((^[a-zA-Z]+)\.?([a-zA-Z]*)@ehu\.(eus|es)))$/", $email) == 0) {
                 echo "Error, el servidor dice que el email no es correcto. <br>";
                 return false;
               }

               if (preg_match("/.{10,}$/", $pregunta) == 0) {
                 echo "Error, el servidor dice que la longitud de la pregunta no es correcta. <br>";
                 return false;
               }

               if (strlen($respc) == 0 || strlen($resp1) == 0 || strlen($resp2) == 0 || strlen($resp3) == 0 || strlen($tema) == 0) {
                echo "Error, el servidor dice que hay campos vacios. <br>";
                 return false;
               }

               if ($complejidad != (1 || 2 || 3)) {
                 echo "Error, el servidor dice que hay un fallo en la complejidad de la pregunta. <br>";
                 return false;
               }

               return true;
             }
      $alumno ="/(^(\s)*[a-z]+[0-9]{3}(\@ikasle.ehu.){1}(eus|es){1}(\s)*$)|(^(\s)*[a-z]+(\.{1}[a-z]*)?\@ehu.{1}(eus|es){1}(\s)*$)/i";
      function goback()
    {
      echo "<script type='text/javascript'> window.history.go(-1);</script>";
    }

      if (ValidateFieldsPHP($email, $question, $correct, $wrong1, $wrong2, $wrong3, $tema, $complexity)){
         require_once('DbConfig.php');
         $connection=mysqli_connect($server, $user, $pass, $basededatos) or die("Connection Failed");
        $query="INSERT INTO `preguntas` (`Email`, `Question`, `Answer`, `IncorrectAnswer1`, `IncorrectAnswer2`, `IncorrectAnswer3`, `Complexity`, `Tema`) VALUES
        ('{$email}', '{$question}', '{$correct}', '{$wrong1}', '{$wrong2}', '{$wrong3}', '{$complexity}', '{$tema}')";
        $result=mysqli_query($connection,$query) or die("Query Failed");

        mysqli_close($connection);
        echo("Pregunta Insertada correctamente:<a href=../php/ShowQuestions.php?email=$email&cont=1> <h3>Ver Preguntas</h3> </a>");



      }
      else {
        echo("Par&aacute;metros de login incorrectos ");
        echo "<br />";
        echo "<button onclick='goBack()'>Go Back</button>

<script>
function goBack() {
  window.history.go(-1);
}
</script>";



      }

?>














    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
