<?php
session_start();

if (!isset($_SESSION["username"])) {

	echo "<script> alert('Tienes que estar registrado'); window.location.href='Layout.php'; </script>";

} else if ($_SESSION["username"] != 'admin@ehu.es') {

	echo "<script> alert('No eres admin'); window.location.href='Layout.php'; </script>";
}
else {

	require_once('DbConfig.php');

	$username=$_GET['email'];

	$mysql = mysqli_connect($server, $user, $pass, $basededatos);

	$usuarios = mysqli_query( $mysql,"DELETE FROM `usuario` WHERE `email`= '$username'");
	if($usuarios===TRUE){echo "<script>
               alert('Has eliminado al usuario:  ". $username ." ')</script>";}



	mysqli_close($mysql);

	header('Location:HandlingAccounts.php');

	}
