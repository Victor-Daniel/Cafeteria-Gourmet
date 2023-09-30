<?php
namespace app\util;
use app\common\Environment;

// Carrega o bady do Cardápio
class ViewCardapio extends ViewHome{  
    public static function RenderBody(){
        self::Body();
        return self::GetContentView("bodycardapio");
    }

    public static function Body(){
        Environment::Load();
    }
}
?>