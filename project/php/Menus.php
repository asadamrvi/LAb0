<meta name="google-signin-client_id" content="530036943347-3uu97ujs8ncnbikukpnp3nva2d63deld.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer>
gapi.load('auth2', function() {
  gapi.auth2.init();
});
</script>
<div id='page-wrap'>
<header class='main' id='h1'>


  <?php
  if (isset($_SESSION['username'])==1) {

    $email=$_SESSION['username'];
  
    echo "<span><img src=".$_SESSION['avatar']." alt='Avatar' width='5%' height='5%'></span>";
    echo "<br>";
    echo " $email ";
    echo "<span class='right'><a href='LogOut.php'>LogOut</a></span>";

  }
  else {
    echo "<span class='right'><a href='SignUp.php'>Registro</a></span> &nbsp &nbsp  ";
    echo "  <span class='right'><a href='LogIn.php'>Login</a></span>  &nbsp &nbsp ";
    echo "<span class='right'><a href='sendCode.php'>Modificar Contraseña</a></span>";
    echo("<span class='g-signin2' data-onsuccess='onSignIn'></span>");
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
    if (preg_match("/((^[a-zA-Z]+)\.?([a-zA-Z]*)@ehu\.(eus|es))$/", $email) == 1)

  {
    echo "<span><a href='searchQuestions.php?email=$email&cont=1'>Buscar Preguntas</a></span> ";

  }

  }

}

else {

    echo "<span><a href='Layout.php'>Inicio</a></span>";
    echo "<span><a href='Credits.php'>Creditos</a></span>";
    echo "<span><a href='quiz_tema.php'>Jugar</a></span>";
    
}

 ?>

 </nav>

