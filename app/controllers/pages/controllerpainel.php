<?php
namespace app\controllers\pages;

use app\util\ViewPainel;
use app\models\DatabasePainel;

class ControllerPainel{
    public static function RenderPainel($User=null){
        return ViewPainel::Render("painel",[
            "Header"=> ViewPainel::RenderHeader(),
            "User"=>$User,
            "Body" => ViewPainel::GetContentView("bodypainel"),
            "Footer"=>ViewPainel::RenderFooter()
        ]);
    }


    public static function ConsultPedidos($CPF=null){
        $Dados = new DatabasePainel();
        $Data = $Dados->ConsultarPedidos($CPF);
        $DadosProcessados = [];
        for($i=0;$i<count($Data);$i++ ){
            $DadosProcessados[$i]["Cliente"] = $Data[$i][0];
            $DadosProcessados[$i]["CPF"] = $Data[$i][1];
            $DadosProcessados[$i]["Produto"] = $Data[$i][2];
            $DadosProcessados[$i]["Codigo"] = $Data[$i][3];
            $DadosProcessados[$i]["Quantidade"] = $Data[$i][4];
            $DadosProcessados[$i]["Preco"] = $Data[$i][5];
            $DadosProcessados[$i]["Valor_Total"] = $Data[$i][6];
            $DadosProcessados[$i]["Data"] = $Data[$i][7];
        }

        return $DadosProcessados;
    }

    public static function ConsultarDados($CPF){
        $Data = new DatabasePainel();
        $Dados = $Data->ConsultarDados($CPF);

        return $Dados;

    }
}
?>