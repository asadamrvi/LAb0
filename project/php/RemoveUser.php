<?php
session_start();

if (isset($_SESSION['username'])) {
  if ($_SESSION['username'] == "") {
    echo '<script type="text/javascript">
			alert("Create or Login to Your Account");
        window.location.href="Layout.php";
        </script>';
  }
    if ($_SESSION['username'] != "admin@ehu.es") {
    echo '<script type="text/javascript">
        alert("Not Admin");
        window.location.href="Layout.php";
        </script>';
  }
} else {
  echo '<script type="text/javascript">
      alert("Registrate o entra con tu cuenta");
      window.location.href="Layout.php";
      </script>';
}
function alert($mensaje)
{
  echo "<script type='text/javascript'>alert('$mensaje');  </script>";
}
	require_once('DbConfig.php');

	$username=$_GET['email'];
  if($username=="admin@ehu.es"){alert("You can not remove Admin");die();}

	$mysql = mysqli_connect($server, $user, $pass, $basededatos);

	$usuarios = mysqli_query( $mysql,"DELETE FROM `usuario` WHERE `email`= '$username'");
	if($usuarios===TRUE){echo "<script>
               alert('Has eliminado al usuario:  ". $username ." ');
               </script>";}



	mysqli_close($mysql);

	header('Location:HandlingAccounts.php');

	
?>