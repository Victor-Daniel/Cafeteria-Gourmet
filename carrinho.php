<?php
require_once "autoload.php"; 
session_start();
use app\http\Router;
use app\controllers\pages\ControllerCarrinho;

$Rota = new Router();
if(isset($_SESSION["User"])){
    $Content = $Rota -> GetController($_SESSION["User"]);

    $Values = ["Cod"=>$_GET["Cod"], "Quantidade"=>$_GET["Qt"]
    ];
    if(!in_array($Values,$_SESSION["Carrinho"]["Produtos"])){

        array_push($_SESSION["Carrinho"]["Produtos"],$Values);

        $Produtos = $_SESSION["Carrinho"]["Produtos"];

        $NovoCarrinho = array_unique($Produtos,SORT_REGULAR);

        $_SESSION["Carrinho"]["Produtos"] = $NovoCarrinho;

        header('Refresh:0');
    }
    
    echo $Content;
}
else{
   header("Location: http://192.168.0.5/Cafeteria-Gourmet/login.php");
}

?>