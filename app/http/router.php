<?php
namespace app\http;

class Router{
    //URL Completa
    private $URL;
    //Prefixo da URL de rotas
    private $Prefix;
    //Rotas salvas do site
    private $Rotas=[];
    //Instancia de Request
    private $Request;

    public function __construct($URL)
    {
        $this->Request = new Request();
        $this->URL = $URL;
        $this->SetPrefix();
    }

    //Método responsável por definir o Prefixo das rotas
    private function SetPrefix(){
        //Informações da URL Atual 
        $ParseURL = parse_url($this->URL);
        // Define o Prefixo
        if($ParseURL["path"] != ""){
            $this->Prefix = $ParseURL["path"];
        }
    }

}
// VIDEO AULA PAROU NO MINUTO 28:30.
?>