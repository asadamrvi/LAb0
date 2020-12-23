<?php
$email = $_GET["email"];

function cambiar(){
   echo "<script type='text/javascript'>window.location.href = 'Layout.php'; </script>";
 }
$xml = simplexml_load_file("../xml/Counter.xml");

$encontrado = false ;
foreach ($xml->user as $user){
    if ($_GET["email"]== ($user->p)){
     $encontrado = true ;
     print_r($user);
     $dom=dom_import_simplexml($user);
     $dom->parentNode->removeChild($dom);


    }
}
if($encontrado==true){

print_r((integer)$xml[0]["contador"]=(integer)$xml[0]["contador"]-1) ;
}

$xml->asXML('../xml/Counter.xml');
cambiar();
?>
