<?php
namespace app\controllers\pages;
use app\util\ViewCarrinho;
use app\models\DatabaseCarrinho;

class ControllerCarrinho{

    public static function GetCarrinho($User=null){
        return ViewCarrinho::Render("carrinho",[
            "Header"=>ViewCarrinho::RenderHeader(),
            "User"=>$User,
            "Body" =>self::BodyCarrinho(),
            "Footer"=> ViewCarrinho::RenderFooter()
        ]);
    }

    private static function BodyCarrinho(){
        $Prod = new DatabaseCarrinho();
        $data = [];
        $File = "";
        file_put_contents("app/view/html/bodycarrinho.html",""); 
        for($i = 0; $i < count($_SESSION["Carrinho"]["Produtos"]); $i++){
            
            $data[$i] = $Prod->ConsultaCarrinho($_SESSION["Carrinho"]["Produtos"][$i]["Cod"]);            
        }
        
        for($i = 0; $i < count($data); $i++){
            $ProdName = $data[$i][0];
            $Price = $data[$i][1];
            $Estoq = $data[$i][2];
            $Cod = $data[$i][3];

            $File = "
            <div class='CardCarrinho'>
                <div class='Prod'>
                    <h3 class='Cod'>Cod: {$Cod} </h3>
                    <h3 class='ProdName'>{$ProdName}</h3>
                    <h4 class='Price'>R$ {$Price}</h4>
                </div>
                <div class='QuantCompra'>
                    <div class='QuantItens'>
                        <label for='Quantidade'><h4>Quant</h4></label>
                        <div class='QuantProd'>
                            <span id='Diminuir' class='Diminuir'> < </span>
                            <input type='text' name='Quant' id='Quantidade' class='Quantidade' value='1' readonly>
                            <span id='Aumentar' class='Aumentar'> > </span>
                        </div>
                    </div>
                    <div class='QuantEstoque'>
                        <h4>Estoque</h4>
                        <p class='Estoque'>{$Estoq}</p>
                    </div>
                </div>
            </div>
            
            ";    
            file_put_contents("app/view/html/bodycarrinho.html",$File,FILE_APPEND);
            
        }
         return ViewCarrinho::GetContentView("bodycarrinho");
    }

}



?>