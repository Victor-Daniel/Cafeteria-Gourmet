<?php
namespace app\controllers\pages;
use app\util\ViewCarrinho;

class ControllerCarrinho{

    public static function GetCarrinho($User=null){
        return ViewCarrinho::Render("carrinho",[
            "Header"=>ViewCarrinho::RenderHeader(),
            "User"=>$User,
            "Footer"=> ViewCarrinho::RenderFooter()
        ]);
    }
}
?>