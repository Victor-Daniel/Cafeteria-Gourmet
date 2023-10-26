<?php
require_once "autoload.php"; 
session_start();
use app\http\Router;

$Rota = new Router();
$Content = $Rota -> GetController();
if(isset($_SESSION["User"])){
    header("Location: http://192.168.0.5/Cafeteria-Gourmet/painel.php");
}

echo $Content;
?>