<?php
namespace app\models;

use app\common\Environment;
use mysqli_sql_exception;
use \mysqli;
class DatabasePainel{

    private $Host;
    private $UserName;
    private $Pass;
    private $Database;
    private $Port;

    public function __construct()
    {
        Environment::Load();
        $this->Host = getenv("DB_HOST");
        $this->UserName = getenv("DB_USER");
        $this->Pass = getenv("DB_PASS");
        $this->Port = getenv("DB_PORT");
        $this->Database = getenv("DB_DATABASE");
    } 

    public function ConsultarPedidos($CPF){
        if($CPF==null){
            $Data = [];
            try{
                //Criando conexão pdo com mysql'
                $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
                $result = mysqli_query($Conection,"select  cliente_nome,cpf_cliente_user,product_name,cod_prod,quantidade,preco_unitario, total, data_compra from compras");
                $Conection->close();
                $i=0;
                while($row = mysqli_fetch_row($result)){
                    $Data[$i] = $row;
                    $i++;
                }   
                return $Data;        
            }
            catch(mysqli_sql_exception $Ex){
            
                die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
            }
        }
        else{
            $Data = [];
            try{
                //Criando conexão pdo com mysql'
                $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
                $result = mysqli_query($Conection,"select  cliente_nome,cpf_cliente_user,product_name,cod_prod,quantidade,preco_unitario, total, data_compra from compras where cpf_cliente_user='{$CPF}'");
                $Conection->close();
                $i=0;
                while($row = mysqli_fetch_row($result)){
                    $Data[$i] = $row;
                    $i++;
                }   
                return $Data;        
            }
            catch(mysqli_sql_exception $Ex){
            
                die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
            }
        }
    
    }


    public function ConsultarDados($CPF){
        $Data = [];
            try{
                //Criando conexão pdo com mysql'
                $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
                $result = mysqli_query($Conection,"select * from clientes where cpf_cliente_usuario='{$CPF}'");
                $Conection->close();
                $i=0;
                while($row = mysqli_fetch_row($result)){
                    $Data = $row;
                    $i++;
                }   
                return $Data;        
            }
            catch(mysqli_sql_exception $Ex){
            
                die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
            }
    }

    public function UpdateDados(){
        $Data = [];
        try{
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $result = mysqli_query($Conection,"");
            $Conection->close();
            $i=0; 
            return $Data;        
        }
        catch(mysqli_sql_exception $Ex){
        
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }
}

?>