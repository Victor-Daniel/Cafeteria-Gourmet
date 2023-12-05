<?php
namespace app\common;
require_once "../../autoload.php"; 
session_start();
use app\controllers\pages\ControllerPainel;

$Dados_Recebidos = file_get_contents('php://input');

if($Dados_Recebidos==null || $Dados_Recebidos==""){
    $Dados = ControllerPainel::ConsultarDados($_SESSION["CPF"]);
    $DadosCliente = [
        "ID"=>$Dados[0],
        "Nome"=>$Dados[1],
        "CPF"=>$Dados[2],
        "Endereco"=>$Dados[3],
        "Numero"=>$Dados[4],
        "Complemento"=>$Dados[5],
        "Bairro"=>$Dados[6],
        "Cidade" => $Dados[7],
        "Estado" => $Dados[8]
    ];

    echo json_encode($Dados);
}
else{
    
}



?>