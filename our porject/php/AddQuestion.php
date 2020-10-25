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

       $email= $_POST['fEmail'];
       $question= $_POST['fQuestion'];
       $correct= $_POST['fCorrecta'];
       $wrong1= $_POST['fIncorrecta1'];
       $wrong2= $_POST['fIncorrecta2'];
       $wrong3= $_POST['fIncorrecta3'];
       $complexity= $_POST['complejidad'];
       $tema= $_POST['tema'];
       require_once('DbConfig.php');
      $connection=mysqli_connect($server, $user, $pass, $basededatos) or die("Connection Failed");
      $query="INSERT INTO `preguntas` (`Email`, `Question`, `Answer`, `IncorrectAnswer1`, `IncorrectAnswer2`, `IncorrectAnswer3`, `Complexity`, `Tema`) VALUES
      ('{$email}', '{$question}', '{$correct}', '{$wrong1}', '{$wrong2}', '{$wrong3}', '{$complexity}', '{$tema}')";
      $result=mysqli_query($connection,$query) or die("Query Failed");

      mysqli_close($connection);

       ?>
        <a href="../php/ShowQuestions.php"> <h3>Ver Preguntas</h3> </a>



    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
