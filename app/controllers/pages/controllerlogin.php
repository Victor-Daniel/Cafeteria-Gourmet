<?php
namespace app\controllers\pages;
use app\util\ViewLogin;
use app\models\DatabaseLogin;
class ControllerLogin{

    //Método responsável por Carregar o conteúdo do html do login
    public static function RenderLogin(){
        return ViewLogin::Render("login",[
           
        ]);
    }
    //Método que Solicita o login a classe databaselogin e Retorna um array de informações 
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