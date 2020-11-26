<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
$soapclient = new nusoap_client('https://twisting-advances.000webhostapp.com/lab/php/ClientVerifyPass.php?wsdl',true);
$err = $soapclient->getError();
if ($err) {	echo 'Error' . $err ; }
$resultado = $soapclient->call('password', array('x'=>$_GET['cont'],'y'=>$_GET['ticket']));


echo $resultado;
?>
