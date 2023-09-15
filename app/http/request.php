<?php
namespace app\http;

class Request{
    //Método HTTP
    private $HttpMethod;
    //URI,Rota OU Diretório da página
    private $URI;
    //Parâmetros da Página
    private $QueryParams = [];
    //Variáveis recebidas no POST da página.
    private $postvars=[];
    //Cabeçalhos da requisição.
    private $headers=[];

    public function __construct()
    {
        if(isset($_GET)){
            $this->QueryParams = $_GET;
        }
        else{
            $this->QueryParams = null;
        }
        if(isset($_POST)){
            $this->postvars = $_POST;
        }
        else{
            $this->postvars = null;
        }
        $this->headers = getallheaders();

        if(isset($_SERVER["REQUEST_METHOD"])){
            $this->HttpMethod = $_SERVER["REQUEST_METHOD"];
        }
        else{
            $this->HttpMethod = null;
        }
        if(isset($_SERVER["REQUEST_URI"])){
            $this->URI = $_SERVER["REQUEST_URI"];
        }
        else{
            $this->URI = null;
        }
    }

    //Retorna os parametros da página
    public function GetQueryParams(){
        return $this->QueryParams;
    }
    //Retorna a URI ou Diretório da página
    public function GetURI(){
        return $this->URI;
    } 
    //Retorna o Método HTTP
    public function GetHttpMethod(){
        return $this->HttpMethod;
    }
    //Retorna variáveis recebidas no POST da página.
    public function GetPOST(){
        return $this->postvars;
    }
    //Retorna todos os cabecalhos da página.
    public function GetHeaders(){
        return $this->headers;
    }
}

?>