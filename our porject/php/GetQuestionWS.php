<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');


$ns="http://localhost";

$server = new soap_server;
$server->configureWSDL('GetQuestion',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('GetQuestion',array('x'=>'xsd:string'),array('z'=>'xsd:string','a'=>'xsd:string','u'=>'xsd:string'),$ns);
function GetQuestion ($x){
    require_once('DbConfig.php');

    $conexion = mysqli_connect($server, $user, $pass, $basededatos);
    $sql = "SELECT Email,Question,Answer FROM preguntas where Numberr ='$x' ";
    $result = $conexion->query($sql);
    $row = mysqli_fetch_array($result);
		if($row["Email"]!=""){

			return (array($row['Email'],$row['Question'],$row['Answer']));
		}else{
			return (array("","",""));
		}

}
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>
