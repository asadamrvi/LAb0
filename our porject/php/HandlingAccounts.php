<?php session_start();
if (isset($_SESSION['username'])) {
  if ($_SESSION['username'] == "") {
    echo '<script type="text/javascript">
        alert("Create or Login to Your Account");
        window.location.href="Layout.php";
        </script>';
  }
  if ($_SESSION['username'] != "admin@ehu.es") {
    echo '<script type="text/javascript">
        alert("You are Not Admin Bro");
        window.location.href="Layout.php";
        </script>';
  }
} else {
  echo '<script type="text/javascript">
	alert("Create or Login to Your Account");
      window.location.href="Layout.php";
      </script>';
}


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<style>

	table, td, th {
  	border: 1px solid #ddd;
  	text-align: left;
	}

	table {
  	border-collapse: collapse;
  	width: 100%;
	}

	th, td {
  	padding: 15px;
	}
	</style>

	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/showUsers.js"></script>

	<script src="../js/ShowQuestionsAjax.js"></script>

	<script src="../js/AddQuestionAjax.js"></script>
	<script src="../js/CountQuestionsAjax.js"></script>


	<?php include '../html/Head.html' ?>
</head>

<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">

		<?php
		require_once('DbConfig.php');

		//$link = mysqli_connect($server, $user, $pass, $basededatos);

		$mysql= mysqli_connect($server, $user, $pass, $basededatos);
       if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

		$query = mysqli_query($mysql, "SELECT * FROM usuario where email!='admin@ehu.es'");

		echo "
				<table>
				<tr>
				<th>Email </th>
				<th>Contraseña</th>
				<th>Estado</th>
				<th>Cambiar Estado</th>
				<th>Borrar Usuario</th>
				</tr>
				";

		while ($datos = mysqli_fetch_array($query)) {
			echo "<tr>
					<td>" . $datos[1] . "</td>
					<td> " .$datos[3] . "</td>
					<td>" . $datos[4] . "</td>
					<td><input type='button' value = 'Cambiar Estado' onclick= ChangeState('" . $datos[1] . "','" . $datos[4] . "')></td>
					<td><input type='button' value = 'Borrar Usuario' onclick= DeleteUser('" . $datos[1] . "')></td>
					<td> </td>
					</tr>";
		}

		echo '</table>';

		mysqli_close($mysql);
		?>

		<script type="text/javascript">

			function ChangeState(email,estado) {
				var confirmacion = confirm("¿Quieres realmente cambiar el estado?");
				if (confirmacion) {
					window.location.href = "../php/ChangeUserState.php?email=" + email+"&estado="+estado;
				}
			}
			function DeleteUser(email) {
				var confirmacion = confirm("¿Seguro que quieres borrar el usuario?");
				if (confirmacion) {
					window.location.href = "../php/RemoveUser.php?email=" + email;
				}
			}


		</script>



	</section>
<?php include '../html/Footer.html' ?>

</body>

</html>
