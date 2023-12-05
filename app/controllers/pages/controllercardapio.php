<?php
namespace app\controllers\pages;
use app\util\ViewCardapio;
use app\models\DataBase;

// Retorna a página renderizada do cardápio
class ControllerCardapio{
    private static $IDPROD = [];
    public static function GetCardapio($User = null){
        self::RenderBodyCardapio();
        return ViewCardapio::Render("cardapio",[
            "Header"=> ViewCardapio::RenderHeader(),
            "User"=>$User,
            "Body"=> ViewCardapio::GetContentView("bodycardapio"),
            "QuantidadeSalgados"=>self::QuantSalgados(),
            "QuantidadeBedidas"=>self::QuantBebidas(),
            "QuantidadeDoces"=>self::QuantDoces(),
            "QuantidadeSobremesas"=>self::QuantSobremesas(),
            "Footer"=>ViewCardapio::RenderFooter()
        ]);
    }

    //Responsável por Gravar um conteúdo em HTML no BodyCardapio com os dados dos produtos
    private static function RenderBodyCardapio(){
        $Prod = new DataBase();
        $Name = $Prod->GetNameAllProdutos();
        $Desc = $Prod->GetDescriptionAllProdutos();
        $Price = $Prod->GetNamePrecoProdutos();
        $Image = $Prod->GetPictureNameProd();
        $Type = $Prod->GetTypeProd();
        $ID = $Prod->GetIDProds();
        $ContentHTML = [];
        file_put_contents("app/view/html/bodycardapio.html","");
        for($i=0;$i<count($Name);$i++){
            $ContentHTML[$i] = "
            <div class='card {$Type[$i]}'>
                <img src='app/view/html/img/cards/{$Image[$i]}.jpg'>
                <div>
                    <h2>{$Name[$i]}</h2>
                    <h3>{$Desc[$i]}</h3>
                    <span>R$ {$Price[$i]}</span>
                    <br>                   
                    <a href='carrinho.php?Cod=$ID[$i]&Qt=1'><input type='button' value='Comprar' class='comprar' id='comprar'></a>
                </div>
            </div>

            ";
            file_put_contents("app/view/html/bodycardapio.html",$ContentHTML[$i],FILE_APPEND);
            
        }
       
    }

    //Métodos responsáveis por mostrar a quantidade existente de itens no menu lateral
    private static function QuantSalgados(){
        $Prod = new DataBase();
        $Quant = 0;
        $Result =  $Prod->GetQuantSalgados();
        for($i=0;$i<count($Result);$i++){
            $Quant = $Result[$i];
        }

        return $Quant;
    }

    private static function QuantBebidas(){
        $Prod = new DataBase();
        $Quant = 0;
        $Result =  $Prod->GetQuantBebidas();
        for($i=0;$i<count($Result);$i++){
            $Quant = $Result[$i];
        }

        return $Quant;
    }

    private static function QuantDoces(){
        $Prod = new DataBase();
        $Quant = 0;
        $Result =  $Prod->GetQuantDoces();
        for($i=0;$i<count($Result);$i++){
            $Quant = $Result[$i];
        }

        return $Quant;
    }
    
    private static function QuantSobremesas(){
        $Prod = new DataBase();
        $Quant = 0;
        $Result =  $Prod->GetQuantSObremesas();
        for($i=0;$i<count($Result);$i++){
            $Quant = $Result[$i];
        }

        return $Quant;
    }

   
}
?>