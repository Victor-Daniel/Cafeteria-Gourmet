<?php
require_once "autoload.php"; 
use app\http\Router;
use app\controllers\pages\ControllerCardapio;
//echo $_GET["IdProd"];

$Rota = new Router();
$Content = $Rota -> GetController("");
echo $Content;
?>