<?php
namespace app\http;
class Response{
    //Status HTTP
   private $HttpCode;
    //Cabeçalhos do Response
   private $Headers = []; 
    //Tipo de Conteúdo retornado
   private $ContentType;
    //Conteúdo do response
    private $Content;

    //Carregando Dados pelo construtor
    public function __construct($HttpCode,$Content,$ContentType){
        $this->HttpCode = $HttpCode;
        $this->Content = $Content;
        $this->ContentType = $ContentType;
        $this->AddHeader("Content-Type",$ContentType);
    }

    // Método que insere o ContentType nos Headers quando alterado
    public function AddHeader($Key,$Value){
       $this->Headers[$Key] = $Value;
    }

    // Método responsável por enviar a resposta para a tela do usuário
    public function SendResponse(){
        //Envia os headers ao navegador
        $this->SendHeaders();
        //Imprime o conteúdo do Response
        if($this->ContentType=="text/html"){
            echo $this->Content;
        }
    }
    //Método responsável por enviar os Headers para o navegador
    private function SendHeaders(){
        //Enviar status
        http_response_code($this->HttpCode);
        //Enviar Headers
        foreach($this->Headers as $Key=>$Value){
            header($Key.": ".$Value);
        }
    }

}
?>