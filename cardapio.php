<?php
require_once "autoload.php";
session_start();
use app\http\Router;
use app\http\Request;
$Rota = new Router();
if(isset($_SESSION["User"])){
    $Content = $Rota -> GetController($_SESSION["User"]);
}
else{
    $Content = $Rota -> GetController("Entrar/Login");
}

echo $Content;
?>