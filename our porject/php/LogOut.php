<?php


$email=$_GET['email'];

//echo("<script> alert ('Bye Bye :". $email ."')
//window.location.href='Layout.php';</script>");
echo "<script> alert ('Bye Bye :". $email ."')
window.location.href = 'DecreaseGlobalCounter.php?email=$email'; </script>";
 ?>
