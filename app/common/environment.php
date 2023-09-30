<?php

namespace app\common;

// CLasse que carrega as variáveis de ambiente
class Environment{
    public static function Load(){
        $Dir = __DIR__."/../../.env";
        if(file_exists($Dir)){
            self::File($Dir);
        }
        else{
            //Tratar das exessoes
        }
    }

    private static function File($Dir){
        $Dados = file($Dir);
        foreach($Dados as $lines){
            putenv(trim($lines));
        }
    }
}

?>