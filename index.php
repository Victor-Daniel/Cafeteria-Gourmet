<?php
require_once "autoload.php"; 
session_start();
use app\http\Router;
use app\controllers\pages\ControllerLogin;
$Rota = new Router();
if((isset($_POST["tbuser"]))&&(isset($_POST["tbpass"]))){
        $Data=ControllerLogin::Authentication($_POST["tbuser"],$_POST["tbpass"]);
        $_SESSION["UserID"] = $Data[0];
        $_SESSION["User"] = $Data[1];
        $_SESSION["Permission"] = $Data[2];
        $Content = $Rota -> GetController($_SESSION["User"]);
}
else{
        $Content = $Rota -> GetController("Entrar/Login");
}

echo $Content;
/*
        echo "<pre>";
        print_r();
        echo "</pre>";

*/


?>