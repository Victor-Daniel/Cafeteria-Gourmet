<?php
namespace app\common;
require_once "../../autoload.php"; 
session_start();
use app\controllers\pages\ControllerLogin;

$dados_json = file_get_contents('php://input');
$dados = json_decode($dados_json,true);

$DadosLogin = ControllerLogin::Authentication($dados["Usuario"],$dados["Senha"]);



?>