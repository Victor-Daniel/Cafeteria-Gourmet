<?php
namespace app\controllers\pages;
use app\util\ViewHome;
use app\models\Conection;

class ControllerHome{

    // Método responsável por Retornar o conteúdo da Home do site (VIEW)
    public static function GetHome(){
        
        return ViewHome::Render("index",[
            "Header"=>ViewHome::RenderHeader(),
            "Usuario"=> Conection::Session(),
            "Body"=>ViewHome::RenderBody(),
            "Footer"=> ViewHome::RenderFooter()
        ]);
        
    }
}
?>