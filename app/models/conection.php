<?php
namespace app\models;

// Classe responsável por verificar se existe sessão ativa
class Conection{


    public static function Session(){
        $Dados ="";
        //Verifica se tem sessão aberta e retorna dados de usuário
        if(!isset($_SESSION)){
            $Dados = "Entrar/Login";
        }
        else{
            if(session_status()!= PHP_SESSION_ACTIVE){
                $Dados = "Entrar/Login";
            }
            else{
                $Sessao = new Session();
                $Dados = $Sessao->GetUsuario();
            }
        }
        return $Dados;
    }
}
?>