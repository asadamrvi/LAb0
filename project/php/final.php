<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/googleSignIn.js"></script>




  <?php include '../html/Head.html' ?>
</head>

<body>
  <?php include '../php/Menus.php' ?>



  <section class="main" id="s1">
      <div>

				<div class="container">
				  <h2>Your Result</h2>
				  <p>Congratulation You have completed this test succesfully.</p>
				  <p>Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?>  </p>
				  <?php unset($_SESSION['score']); ?>
				  
				</div>
        



      </div>
  </section>

  <?php include '../html/Footer.html' ?>
</body>

</html>