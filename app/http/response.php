<?php
namespace app\http;
use app\controllers\pages\ControllerHome;
use app\controllers\pages\ControllerCardapio;
use app\controllers\pages\ControllerCarrinho;
use app\controllers\pages\ControllerLogin;

class Response{
  private $Content;
  private $Headers;

  //Adiciona os Headers
  private function AddHeaders($Key,$Value){
    $this->Headers[$Key] = $Value;
  }
//Método responsável por executar um response para o Home
  public function SendResponseHome($httpcode,$ContentType,$User=null){
    $this->AddHeaders("Content-Type",$ContentType);
    http_response_code($httpcode);
    foreach($this->Headers as $Key=>$Value){
        header($Key.": ".$Value);
    }

    $this->Content = ControllerHome::GetHome($User);
    return $this->Content;
  }


//Método responsável por dar o Response do conteúdo do Cardapio
  public function SendResponseCardapio($httpcode,$ContentType,$User=null){
    $this->AddHeaders("Content-Type",$ContentType);
    http_response_code($httpcode);
    foreach($this->Headers as $Key=>$Value){
        header($Key.": ".$Value);
    }

    $this->Content = ControllerCardapio::GetCardapio($User);
    return $this->Content;
  }

  public function SendResponseLogin($httpcode,$ContentType){
    $this->AddHeaders("Content-Type",$ContentType);
    http_response_code($httpcode);
    foreach($this->Headers as $Key=>$Value){
        header($Key.": ".$Value);
    }

    $this->Content = ControllerLogin::RenderLogin();
    return $this->Content;
  }
  public function SendResponseCarrinho($httpcode,$ContentType,$User=null){
    $this->AddHeaders("Content-Type",$ContentType);
    http_response_code($httpcode);
    foreach($this->Headers as $Key=>$Value){
        header($Key.": ".$Value);
    }

    $this->Content = ControllerCarrinho::GetCarrinho();
    return $this->Content;
  }
}

?>