<?php
require_once "autoload.php";
session_start();

use app\http\Router;

$Rota = new Router();
$dados_json = file_get_contents('php://input');
$dados = json_decode($dados_json, true);

$_SESSION["Carrinho"]["Pagamento"] = $dados;
// Falta terminar a página de compra realizadas com sucesso, funções de subtração do estoque e funçoes do painel.

?>