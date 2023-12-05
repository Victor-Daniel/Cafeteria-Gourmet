<?php
require_once "../../autoload.php"; 
session_start();
use app\controllers\pages\ControllerPagamento;


$dados_json = file_get_contents('php://input');
$dados = json_decode($dados_json,true);

$Compra = [
    "Produtos"=>[],
    "Pagamento"=>[]
];
 
for($i=0;$i < count($dados["Produtos"]); $i++){
    $Compra["Produtos"][$i] = $dados["Produtos"][$i];
}

for($i=0; $i < count($dados["Pagamento"]);$i++){
    $Compra["Pagamento"][$i] = $dados["Pagamento"][$i];
}

$_SESSION["CompraFinal"] = $Compra;

?>