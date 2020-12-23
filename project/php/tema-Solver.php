<?php 
session_start();

$tema=$_POST['selected_tema'];
//echo "$tema";
require_once('DbConfig.php');
$connection=mysqli_connect($server, $user, $pass, $basededatos) or die("Connection Failed");
$query = "SELECT * FROM preguntas where Tema='$tema'";
$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
//echo "$total_questions";

//echo "<br>$total_questions";
$query2="SELECT DISTINCT Number FROM `preguntas` where Tema='$tema' ";
$result=mysqli_query($connection,$query2) or die("Query Failed");
$ids=array();
if(mysqli_num_rows($result)>0){
  while ($row=mysqli_fetch_assoc($result)) {
    array_push($ids,$row['Number']);
  }
}
else {
  alert("There is No Question with This Tema");
  die();
}
//print_r($ids);

function alert($mensaje)
{
  echo "<script type='text/javascript'>alert('$mensaje');  window.history.go(-1);</script>";
}
  
	$_SESSION['ids']=$ids;
//  $_SESSION['score']=0;
  $_SESSION['tema']=$tema;
  $_SESSION['$total_questions']=$total_questions;
  $index=0;
  $_SESSION['index']=$index;
  $_SESSION['n_of']=$index+1;
  header("LOCATION: SelectOptions.php?n=".$ids[$index]."&of=".'1');
  
  
  




 ?>