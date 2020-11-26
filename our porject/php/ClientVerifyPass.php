<?php

require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$ns="http://localhost";

$server = new soap_server;
$server->configureWSDL('password',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
//The function we are going to use
$server->register('password',array('x'=>'xsd:string','y'=>'xsd:int'),array('z'=>'xsd:string'),$ns);
//implementamos la función
function password ($x,$y){

    $archivo = fopen("../txt/toppasswords.txt", "r") or die("cant open");
	$valido = true;
	if($y == 1010){

    while(!feof($archivo)){
			if(strcmp($x, str_replace(array("\r", "\n"), '', fgets($archivo))) == 0) {
				$valido = false;
				break;
            }

		}

		fclose($archivo);
		if($valido){

			return "VALID";
		}else{
			return "INVALID";
		}
	}else{
		return "SIN SERVICIO";
	}

}
//llamamos al método service de la clase nusoap antes obtenemos los valores de los parámetros
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>
