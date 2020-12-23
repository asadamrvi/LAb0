<?php session_start();
$email=$_SESSION['username'];

session_destroy();
?>

<?php


echo "<script> alert ('Bye Bye :". $email ."')
window.location.href = 'DecreaseGlobalCounter.php?email=$email'; </script>";
 ?>
