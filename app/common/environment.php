<?php

namespace app\common;

use Exception;

// CLasse que carrega as variáveis de ambiente
class Environment{
    public static function Load(){
        $Dir = __DIR__."/../../.env";
        if(file_exists($Dir)){
            self::File($Dir);
        }
        else{
            die("Não foi possível encontrar o arquivo '.env'");
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