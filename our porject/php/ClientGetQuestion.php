<?php
require_once('../lib/nusoap.php');
require_once('DbConfig.php');

$soapclient = new nusoap_client('https://twisting-advances.000webhostapp.com/lab2/php/GetQuestionWS.php?wsdl',true);
$err = $soapclient->getError();
if ($err) {	echo 'Error ' . $err ; }
$resultado = $soapclient->call('GetQuestion', array('x'=>$_GET['Question']));

print_r($resultado["a"]);print_r(",");print_r($resultado["b"]);print_r(","); print_r($resultado["c"]);

?>
