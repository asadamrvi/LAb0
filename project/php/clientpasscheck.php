<?php
require_once('../lib/nusoap.php');
$soapclient = new nusoap_client('https://twisting-advances.000webhostapp.com/lab2/php/ClientVerifyPass.php?wsdl',true);
$err = $soapclient->getError();
if ($err) {	echo 'Error' . $err ; }
$resultado = $soapclient->call('password', array('x'=>$_GET['cont'],'y'=>$_GET['ticket']));


echo $resultado;
?>
