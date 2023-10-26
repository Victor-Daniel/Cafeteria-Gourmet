<?php
namespace app\controllers\pages;
use app\util\ViewHome;
class ControllerHome{

    // Método responsável por Retornar o conteúdo da Home do site (VIEW)
    public static function GetHome($User=null){
        return ViewHome::Render("index",[
            "Header"=>ViewHome::RenderHeader(),
            "User"=>$User,
            "Footer"=> ViewHome::RenderFooter()
        ]);
        
    }

}
?>