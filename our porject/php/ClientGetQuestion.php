
<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
require_once('DbConfig.php');

$soapclient = new nusoap_client('https://twisting-advances.000webhostapp.com/lab/php/GetQuestionWS.php?wsdl',true);
$err = $soapclient->getError();
if ($err) {	echo 'Error ' . $err ; }
$result = $soapclient->call('GetQuestion', array('x'=>$_GET['Question']));

print_r($result["z"]);print_r(",");print_r($result["a"]);print_r(","); print_r($result["u"]);


?>
