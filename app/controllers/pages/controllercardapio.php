<?php
namespace app\controllers\pages;
use app\util\ViewCardapio;
use app\models\Conection;

// Retorna a página renderizada do cardápio
class ControllerCardapio{
    public static function GetCardapio(){
        return ViewCardapio::Render("cardapio",[
            "Header"=> ViewCardapio::RenderHeader(),
            "Usuario" => Conection::Session(),
            "Body"=>ViewCardapio::RenderBody(),
            "Footer"=>ViewCardapio::RenderFooter()
        ]);;
    }

}
?>