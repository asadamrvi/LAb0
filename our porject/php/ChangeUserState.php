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
        alert("No eres Admin");
        window.location.href="Layout.php";
        </script>';
  }
} else {
  echo '<script type="text/javascript">
      alert("Registrate o entra con tu cuenta");
      window.location.href="Layout.php";
      </script>';
}



	require_once('DbConfig.php');

	$username=$_GET['email'];
	$estado=$_GET['estado'];


	$mysql = mysqli_connect($server, $user, $pass, $basededatos);

	$usuarios = mysqli_query( $mysql,"SELECT * FROM `usuario` WHERE `email`= '$username'");

	$datos = mysqli_fetch_array($usuarios);

	if($estado=='ACTIVO'){
	$query = mysqli_query($mysql, "UPDATE `usuario` SET estado='DESACTIVADO' WHERE `email`= '$username'");
	if($query===TRUE){echo "<script>
               alert(' has cambiado el estado de ". $username ." ')</script>";}
							 mysqli_close($mysql);
							 header('Location:HandlingAccounts.php');
							 exit;

	}
	if($estado=='DESACTIVADO'){
	$query = mysqli_query($mysql, "UPDATE `usuario` SET estado='ACTIVO' WHERE `email`= '$username'");
	if($query===TRUE){echo "<script>
               alert(' has cambiado el estado de ". $username ." ')</script>";}
							 mysqli_close($mysql);
							 header('Location:HandlingAccounts.php');
							 exit;

	}




 ?>
