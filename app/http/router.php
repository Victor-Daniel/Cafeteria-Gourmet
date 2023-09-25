<?php
namespace app\http;
use app\http\Request;
use app\http\Response;
use Exception;

class Router{
        private $Request;
        private $GET;
        private $POST;
        private $Response;
        //inicializa a classe router
        public function __construct()
        {       
            $this->Response = new Response();
            $this->Request = new Request(); 
            $this->SetRouterGET();
        }
        //Verifica a existencia do Controller e retorna o nome dele se ele existir
        private function BrowserController($BrowserController){
                $ControllerFile = __DIR__ . "/../controllers/pages/{$BrowserController}.php";
                if(file_exists($ControllerFile)){
                        return true;
                }
                else{
                        return false;
                }
                
        }
        //Seta a rota do tipo GET
        private function SetRouterGET(){
                $this->GET=[
                        "/"=>"controllerhome",
                        "/cardapio.php"=>"controllercardapio"
                ]; 
        }
        //Método que executa a rota
        private function ExecuteRouter($URI){
              $Content = "";
                switch($URI){
                case "/":
                        $Content = $this->Response->SendResponseHome(200,"text/html");
                        break;
                case "/cardapio.php":  
                        
                        break;
              }  
                return $Content;
        }
        public function GetController(){
                //Pega a URI Atual do Site
                $URI = $this->Request->GetURI();
                $Content="";
                // Verifica se o Méthodo usado foi o GET, se for ele verificará se existe uma rota pra ele e retorna o Conteúdo baseado no tipo de rota
                if($this->Request->GetMethod()=="GET"){
                        //Verifca a existencia da rota no array GET
                        if(array_key_exists($URI,$this->GET)){
                                //Caso exista ele verifica se existe um arquivo de Controller para essa rota
                            if($this->BrowserController($this->GET[$URI])){
                                //Caso exista o controller ele trás o conteúdo passando como parâmetro a URI 
                                $Content = $this->ExecuteRouter($URI);
                            }
                                
                        }
                        else
                        {

                        }

                }
                else{
                      if($this->Request->GetMethod()=="POST"){

                     }
                }
                

                return $Content;

        }


        
}
?>