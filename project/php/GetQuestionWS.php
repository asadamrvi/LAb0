<?php

session_start();
if (isset($_SESSION['username'])) {
  if ($_SESSION['username'] == "") {
    echo '<script type="text/javascript">
			alert("Create or Login to Your Account");
        window.location.href="Layout.php";
        </script>';
  }
    if ($_SESSION['username'] == "admin@ehu.es") {
    echo '<script type="text/javascript">
        alert("ONly for Students");
        window.location.href="Layout.php";
        </script>';
  }
} else {
  echo '<script type="text/javascript">
      alert("Registrate o entra con tu cuenta");
      window.location.href="Layout.php";
      </script>';
}
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');


$ns="http://localhost";

$server = new soap_server;
$server->configureWSDL('GetQuestion',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
//The function we are going to use
$server->register('GetQuestion',array('x'=>'xsd:string'),array('a'=>'xsd:string','b'=>'xsd:string','c'=>'xsd:string'),$ns);
//implementamos la función
function GetQuestion ($x){
    require_once('DbConfig.php');

    $conexion = mysqli_connect($server, $user, $pass, $basededatos);
    $sql = "SELECT Email,Question,Answer FROM preguntas where Number ='$x' ";
    $result = $conexion->query($sql);
    $row = mysqli_fetch_array($result);
		if($row["Email"]!=""){

			return (array($row['Email'],$row['Question'],$row['Answer']));
		}else{
			return (array("asad","",""));
		}

}
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>
