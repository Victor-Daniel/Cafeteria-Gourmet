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
            $this->SetRouterPOST();
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
                        "/cardapio.php"=>"controllercardapio",
                        "/carrinho.php"=>"controllercarrinho",
                        "/login.php"=>"controllerlogin",
                        "/pagamento.php"=>"controllerpagamento",
                        "/painel.php"=>"controllerpainel"
                ]; 
        }

        private function SetRouterPOST(){
                $this->POST=[
                       "/"=>"controllerhome",
                       //"/pagamento.php"=>"controllerpagamento"
                ];
        }
        //Método que executa a rota
        private function ExecuteRouter($URI,$User){
              $Content = "";
                switch($URI){
                case "/":
                        $Content = $this->Response->SendResponseHome(200,"text/html",$User);
                        break;        
                case "/cardapio.php":  
                        $Content = $this->Response->SendResponseCardapio(200,"text/html",$User);
                        break;
                case "/carrinho.php":
                        $Content = $this->Response->SendResponseCarrinho(200,"text/html",$User);
                        break;
                case "/login.php":
                        $Content = $this->Response->SendResponseLogin(200,"text/html");
                        break;
                case "/pagamento.php":
                        $Content = $this->Response->SendResponsePagamentos(200,"text/html",$User); 
                case "/painel.php":
                        $Content =  $this->Response->SendResponsePainel(200,"text/html",$User);  

              }  
                return $Content;
        }
        //Método retorna o conteúdo da rota atual
        public function GetController($User=null){
                //Pega a URI Atual do Site
                $UriPersonalisada = parse_url($this->Request->GetURI());
                $URI = $UriPersonalisada["path"];
                $Content="";
                // Verifica se o Méthodo usado foi o GET, se for ele verificará se existe uma rota pra ele e retorna o Conteúdo baseado no tipo de rota
                if($this->Request->GetMethod()=="GET"){
                        //Verifca a existencia da rota no array GET
                        if(array_key_exists($URI,$this->GET)){
                                //Caso exista ele verifica se existe um arquivo de Controller para essa rota
                            if($this->BrowserController($this->GET[$URI])){
                                //Caso exista o controller ele trás o conteúdo passando como parâmetro a URI 
                                $Content = $this->ExecuteRouter($URI,$User);
                            }
                            else{
                                die("Controller não encontrado!");
                            }
                                
                        }

                }
                else{
                      if($this->Request->GetMethod()=="POST"){
                        if(array_key_exists($URI,$this->POST)){
                                //Caso exista ele verifica se existe um arquivo de Controller para essa rota
                            if($this->BrowserController($this->POST[$URI])){
                                //Caso exista o controller ele trás o conteúdo passando como parâmetro a URI 
                                $Content = $this->ExecuteRouter($URI,$User);
                            }
                            else{
                                die("Controller não encontrado!");
                            }
                                
                        }
                        else{
                             die("Rota não encontrada!");   
                        }
                     }
                }
                

                return $Content;

        }


        
}
?>