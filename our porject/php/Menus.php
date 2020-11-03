<div id='page-wrap'>
<header class='main' id='h1'>



  <?php
  if (isset($_GET['cont'])==1) {
    $email=$_GET['email'];
    echo "<span class='right'><a href='LogOut.php?email=$email'>LogOut</a></span>";
    echo " $email";

  }
  else {
    echo "<span class='right'><a href='SignUp.php'>Registro</a></span>";
    echo "  <span class='right'><a href='LogIn.php'>Login</a></span>";
  } ?>


</header>
<nav class='main' id='n1' role='navigation'>
  <?php

if (isset($_GET['cont'])==1) {
  $email=$_GET['email'];

  echo "<span><a href='Layout.php?email=$email&cont=1'>Inicio</a></span>";

  echo "<span><a href='QuestionForm.php?email=$email&cont=1'> Insertar Pregunta</a></span>";
  echo "<span><a href='ShowQuestions.php?email=$email&cont=1'> Ver Preguntas</a></span>";
  echo "<span><a href='Credits.php?email=$email&cont=1'>Creditos</a></span>";



}
else {
  echo "<span><a href='Layout.php'>Inicio</a></span>";
  echo "<span><a href='Credits.php'>Creditos</a></span>";
}
   ?>



</nav>
