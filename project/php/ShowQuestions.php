<?php
session_start();
if (isset($_SESSION['username'])) {
  if ($_SESSION['username'] == "") {
    echo '<script type="text/javascript">
			alert("Create or Login to Your Account");
        window.location.href="Layout.php";
        </script>';
  }
    if ($_SESSION['username'] == "admin@ehu.es") {
    echo '<script type="text/javascript">
        alert("ONly for Students");
        window.location.href="Layout.php";
        </script>';
  }
} else {
  echo '<script type="text/javascript">
      alert("Registrate o entra con tu cuenta");
      window.location.href="Layout.php";
      </script>';
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style media="screen">
table,thead,tbody,td,th {
  border: 2px solid black;
}
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <h2> Preguntas</h2>
      <?php
      require_once('DbConfig.php');

      $connection= mysqli_connect($server, $user, $pass, $basededatos);
         if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $email=$_GET['email'];
        $query="SELECT * FROM `preguntas`";
        // WHERE Email='$email'"
      $result=mysqli_query($connection,$query) or die("Query Failed");

      if(mysqli_num_rows($result)>0){


       ?>
      <table id="table">
        <thead id="thead">

          <th>Email</th>
          <th>Question</th>
          <th>Correct Answer</th>

        </thead>
        <tbody id="tbody">
          <?php while ($row=mysqli_fetch_assoc($result)) {


           ?>
          <tr>
          <td><?php echo $row['Email'];  ?></td>
          <td><?php echo $row['Question'];  ?></td>
          <td><?php echo $row['Answer'];  ?></td>
        </tr>
        <?php } ?>
        </tbody>

      </table>
    <?php }?>

    </div>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>

