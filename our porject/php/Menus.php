<div id='page-wrap'>
<header class='main' id='h1'>



  <?php
  if (isset($_SESSION['username'])==1) {

    $email=$_SESSION['username'];
    echo "<span class='right'><a href='LogOut.php'>LogOut</a></span>";
    echo " $email";

  }
  else {
    echo "<span class='right'><a href='SignUp.php'>Registro</a></span>";
    echo "  <span class='right'><a href='LogIn.php'>Login</a></span>";
  } 

  ?>


</header>

<nav class='main' id='n1' role='navigation'>

  <?php

if (isset($_SESSION['username'])==1) {

  $email=$_SESSION['username'];

  if ($_SESSION['username']=="admin@ehu.es") {

    echo "<span><a href='Layout.php'>Inicio</a></span>";
    echo "<span><a href='Credits.php'>Creditos</a></span>";
    echo "<span><a href='HandlingAccounts.php'>Gestionar Usuarios</a></span>";
  }

  else
  {
    echo "<span><a href='Layout.php'>Inicio</a></span>";
    echo "<span><a href='Credits.php'>Creditos</a></span>";
    echo "<span><a href='HandlingQuizesAjax.php'> Insertar Preguntas AJax</a></span>";
  }

}

else {

    echo "<span><a href='Layout.php'>Inicio</a></span>";
    echo "<span><a href='Credits.php'>Creditos</a></span>";
}

 ?>

 </nav>

