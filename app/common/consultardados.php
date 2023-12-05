<?php
namespace app\common;
require_once "../../autoload.php"; 
use app\controllers\pages\ControllerPainel;
session_start();

header('Content-Type: application/json');

if($_SESSION["Permission"] < 3){
    echo json_encode(ControllerPainel::ConsultPedidos($_SESSION["CPF"]));
}
else{
    echo json_encode(ControllerPainel::ConsultPedidos($_SESSION["CPF"]));
}




?>