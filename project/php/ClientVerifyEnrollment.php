<?php

require_once('../lib/nusoap.php');


$soapclient = new nusoap_client( 'https://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl',true);

$error = $soapclient->getError();
if ($error) {	echo 'Error ' . $error ; }

$result = $soapclient->call('comprobar', array('x'=>$_GET['email']));
print_r($result);


return $result;

?>
