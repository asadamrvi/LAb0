<?php
    session_start();
    if(isset($_POST['username'])){
        $_SESSION['username']=$_POST['username'];
        //$_SESSION['avatar']=$_GET['avatar'];
        //echo("<script>alert('Bienvenido".$_POST['username']."'); location.href='IncreaseGlobalCounter.php';</script>");
    }
?>