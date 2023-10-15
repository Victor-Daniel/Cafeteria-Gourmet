<?php
namespace app\controllers\pages;
use app\util\ViewHome;
use app\common\Environment;

class ControllerHome{

    // Método responsável por Retornar o conteúdo da Home do site (VIEW)
    public static function GetHome(){
        return ViewHome::Render("index",[
            "Header"=>ViewHome::RenderHeader(),
            "Footer"=> ViewHome::RenderFooter()
        ]);
        
    }
}
?>