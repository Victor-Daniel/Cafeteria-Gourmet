<?php
namespace app\http;

class Request{


    
    Private $URI;
    Private $Method;
    private $Prefix;
    public function __construct()
    { 
        $this->Method = $_SERVER["REQUEST_METHOD"];
        $this->SetPrefix();
        $this->SetURI();    
    }
    // Atribui um Prefix através da url
    private function SetPrefix(){
        $Prefix = parse_url("http://localhost/Cafeteria-Gourmet");
        $this->Prefix = $Prefix["path"];

    }
    //Seta a URI
    private function SetURI(){
        $URI = $_SERVER["REQUEST_URI"];
        $this->URI = explode($this->Prefix,$URI);
        $this->URI = end($this->URI);
    }
    // Retorna a URI Atual.
    public function GetURI(){
        return $this->URI;
    }
    //Retorna o tipo de método que foi feito o request
    public function GetMethod(){
        return $this->Method;
    }

}

?>