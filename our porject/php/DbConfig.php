<?php
$local=1; //0 para la nube
if ($local==1){
    $server="localhost";
    $user="root";
    $pass="";
    $basededatos="quiz";
    $basededatos_registro="registro";

}
else{
    $server="localhost";
    $user="";
    $pass="";
    $basededatos="";
    $basededatos_registro="registro";
}
?>
