<?php
namespace app\controllers\pages;
use app\util\ViewPagamento;
use app\models\DatabaseComprar;

class ControllerPagamento{

    public static function RenderPagamento($User=null){

        return ViewPagamento::Render("pagamento",[
            "Header"=> ViewPagamento::RenderHeader(),
            "User"=>$User,
            "BodyPagamento"=>ViewPagamento::GetContentView("bodypagamento"),
            "Footer"=>ViewPagamento::RenderFooter()
        ]);
    }

    public static function ProcessarCompra($arrayCompras,$CPF,$ID,$UserName){
        $Produtos = [];
        $DadosCartao = [];

        for($i =0; $i < count($arrayCompras["Produtos"]); $i++){
            $Produtos[$i] = $arrayCompras["Produtos"][$i];
        }
        
        for($i =0; $i < count($arrayCompras["Pagamento"]); $i++){
            $DadosCartao[$i] = $arrayCompras["Pagamento"][$i];
        }
        $RealizarPedido = new DatabaseComprar($Produtos,$DadosCartao,$CPF,$ID,$UserName);
        $RealizarPedido->RealizarCompra();
    }


}


?>