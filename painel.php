<?php
require_once "autoload.php";
session_start();

use app\http\Router;

$Rota = new Router();
if(isset($_SESSION["User"])){
    $Content = $Rota -> GetController($_SESSION["User"]);
    
}
else{
    $Content = $Rota -> GetController("Entrar/Login");
}

echo $Content;
?>