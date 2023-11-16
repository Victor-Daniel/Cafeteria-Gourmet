<?php
namespace app\models;
use app\common\Environment;
use mysqli_sql_exception;
use \mysqli;

class DatabaseCarrinho{
    private $Host;
    private $UserName;
    private $Pass;
    private $Database;
    private $Port;
    public function __construct()
    {   Environment::Load();
        $this->Host = getenv("DB_HOST");
        $this->UserName = getenv("DB_USER");
        $this->Pass = getenv("DB_PASS");
        $this->Port = getenv("DB_PORT");
        $this->Database = getenv("DB_DATABASE");
    }

    public function ConsultaCarrinho($Cod){
        $Data = [];
        try{
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $result = mysqli_query($Conection,"select product_name,preco,quant_estoque,product_code from produtos where product_code={$Cod}");
            $Conection->close();
            $i=0; 
            while($row = mysqli_fetch_row($result)){
                $Data = $row;
                //$i++;
            }   
            return $Data;        
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }
}
?>