<?php
namespace app\controllers\pages;
use app\util\ViewHome;

class ControllerHome{

    // Método responsável por Retornar o conteúdo da Home do site (VIEW)
    public static function GetHome(){
        
        return ViewHome::RenderHome("index",[
            "Header"=>ViewHome::RenderHeader(),
            "Body"=>ViewHome::RenderBody(),
            "Footer"=> ViewHome::RenderFooter()
        ]);
        
    }
}
?>