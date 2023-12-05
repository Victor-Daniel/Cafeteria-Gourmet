<?php
namespace app\models;
use app\common\Environment;
use mysqli_sql_exception;
use \mysqli;

class DatabaseComprar{

    private $Host;
    private $UserName;
    private $Pass;
    private $Database;
    private $Port;
    private $Produtos;
    private $CPF_Cliente;
    private $ID;
    private $Name;
    private $DadosCartao;
    public function __construct($Produtos,$DadosPagamento,$CPF,$ID,$Name)
    {
        Environment::Load();
        $this->Host = getenv("DB_HOST");
        $this->UserName = getenv("DB_USER");
        $this->Pass = getenv("DB_PASS");
        $this->Port = getenv("DB_PORT");
        $this->Database = getenv("DB_DATABASE");

        $this->Produtos = $Produtos;
        $this->DadosCartao = $DadosPagamento;
        $this->CPF_Cliente = $CPF;
        $this->ID = $ID;
        $this->Name = $Name;
    } 

    //$QueryResult[$i] = mysqli_query($Conection,"select quant_estoque from produtos where product_code={$CodProd}");

    private function ConsultarEstoqueAtual(){
        try{
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $ResultMYSQL = [];
            $Result= [];
            for($i = 0; $i < count($this->Produtos); $i++){
                $ResultMYSQL[$i] = mysqli_query($Conection,"select product_name,quant_estoque,preco from produtos where product_code={$this->Produtos[$i][0]}");
                // Processar os resultados (por exemplo, imprimir ou manipular dados)
                while ($linha = mysqli_fetch_assoc($ResultMYSQL[$i])) {
                    // Faça algo com os dados obtidos
                     $Result[$i] = $linha;
                }
                    // Liberar os resultados da memória
                    mysqli_free_result($ResultMYSQL[$i]);
                
            }
            $Conection->close();
            return $Result;       
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }

    private function UpdateEstoque($EstoqueAtual){
        $AtualizarEstoque = [];
        for($i=0;$i<count($this->Produtos);$i++){
            if($EstoqueAtual[$i]["quant_estoque"]>0 ){
                $AtualizarEstoque[$i] = $EstoqueAtual[$i]["quant_estoque"] - $this->Produtos[$i][1];
            }
            else{
                $AtualizarEstoque[$i] = 0;
            }
        }
        return $AtualizarEstoque;
    }
    private function InsertMYSQL($Compra,$Cliente){
        try{
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $Result = [];
            $Result2 = [];
            for($i = 0; $i < count($this->Produtos); $i++){
                $ResultMYSQL = mysqli_query($Conection,"INSERT INTO compras(id_cliente, cpf_cliente_user, cliente_nome, product_name, cod_prod, quantidade, preco_unitario, total, data_compra)VALUES('{$Cliente['ID']}','{$Cliente['CPF']}','{$Cliente['user_name']}','{$Compra[$i]['product_name']}','{$Compra[$i]['product_cod']}','{$Compra[$i]['quant_compra']}','{$Compra[$i]['preco']}','{$Compra[$i]['total']}','{$Compra[$i]['date']}')");
                $Result[$i] = $Conection->affected_rows;
            }
           for($i = 0; $i < count($this->Produtos); $i++){
                $ResultMYSQL = mysqli_query($Conection,"UPDATE produtos set quant_estoque={$Compra[$i]['quant_estoque']} where product_code={$Compra[$i]['product_cod']}");
                $Result2[$i] = $Conection->affected_rows;
            }
            $Conection->close();       
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }       
    }
    public function RealizarCompra(){    
       $infoCompra = $this->InformacoesProdutosCompra();
       $infoCliente = $this->InfoCliente();
        $this->InsertMYSQL($infoCompra,$infoCliente);
    }

    private function InformacoesProdutosCompra(){
        $Informacoesgerais = [];       
        $ProductEstoqueAtual = $this->ConsultarEstoqueAtual();
        $AtualizarEstoque = $this->UpdateEstoque($ProductEstoqueAtual);
        $ProductName = $this->ProductName($ProductEstoqueAtual);

        for($i = 0; $i < count($this->Produtos); $i++){
            $Informacoesgerais[$i]["product_name"] = $ProductName[$i]; 
            $Informacoesgerais[$i]["product_cod"] = $this->Produtos[$i][0];
            $Informacoesgerais[$i]["quant_estoque"] = $AtualizarEstoque[$i];
            $Informacoesgerais[$i]["quant_compra"] = $this->Produtos[$i][1];
            $Informacoesgerais[$i]["preco"] = $ProductEstoqueAtual[$i]["preco"];
            $value = (float)$Informacoesgerais[$i]["quant_compra"] * (float)$Informacoesgerais[$i]["preco"];
            $Informacoesgerais[$i]["total"] = number_format($value,2);
            $Informacoesgerais[$i]["date"] = date("d-m-Y");
        }

        return $Informacoesgerais;
    }
    
    private function ProductName($Produto){
        $ProdNames = [];
        foreach($Produto as $key => $value){
            $ProdNames[$key] = $value["product_name"];
        }

        return $ProdNames;
    }

    private function InfoCliente(){
        $cliente = [
            "user_name" => $this->Name,
            "ID"=>$this->ID,
            "CPF"=>$this->CPF_Cliente
        ];

        return $cliente;

    }

}

/*
id_compra, id_cliente, cpf_cliente_user, cliente_nome, product_name, cod_prod, quantidade, preco_unitario, total, data_compra

*/
?>