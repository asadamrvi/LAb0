<?php
session_start();

$email = $_SESSION["username"];


$xml = simplexml_load_file("../xml/Counter.xml");
$encontrado = false ;
foreach ($xml->user as $user){
    if ($email== ($user->p)){
        $encontrado = true;
    }
}
if($encontrado==false){
print_r((integer)$xml[0]["contador"]=(integer)$xml[0]["contador"]+1) ;
$child = $xml->addChild("user");
$child-> addChild('p',$_SESSION["username"]);

}


$xml->asXML('../xml/Counter.xml');
$username=$_SESSION["username"];
echo("<script>window.location.href='Layout.php?email=$username&cont=1';</script>");
//header('Location:Layout.php?email=".$username."&cont=1');
exit;

?>
