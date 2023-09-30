<?php
require_once "autoload.php"; 
use app\http\Router;

$Rota = new Router();
$Content = $Rota -> GetController();
echo $Content;
?>