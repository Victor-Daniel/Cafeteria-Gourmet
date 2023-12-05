<?php
require_once "autoload.php"; 
session_start();

use app\http\Router;
use app\controllers\pages\ControllerPagamento;

$Rota = new Router();
$Content = $Rota -> GetController($_SESSION["User"]);
if(isset($_SESSION["User"])&&($_SESSION["CompraFinal"] != null)){
    ControllerPagamento::ProcessarCompra($_SESSION["CompraFinal"],$_SESSION["CPF"],$_SESSION["UserID"],$_SESSION["User"]);
    file_put_contents("app/view/html/bodycarrinho.html","");
}
else{
    header("http://192.168.0.5/Cafeteria-Gourmet/cardapio.php");
}
    $_SESSION["CompraFinal"] = [];
    $_SESSION["Carrinho"]["Produtos"] = [];
    echo $Content;
?>