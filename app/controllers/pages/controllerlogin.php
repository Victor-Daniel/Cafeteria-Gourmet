<?php
namespace app\controllers\pages;
use app\util\ViewLogin;
use app\models\DatabaseLogin;
class ControllerLogin{

    public static function RenderLogin(){
        return ViewLogin::Render("login",[
           
        ]);
    }

    public static function Authentication($User,$Pass){
        $Login = new DatabaseLogin();
        $Data = [];
        $Resultado = $Login->Authentication($User,$Pass);
        if(is_array($Resultado)){
            for($Row=0; $Row < count($Resultado); $Row++){
                for($Col=0;$Col < count($Resultado[$Row]); $Col++){
                    $Data[$Col] = $Resultado[$Row][$Col];
                }
            }
            return $Data;          
        }
    }
   
}

?>