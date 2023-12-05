<?php
namespace app\models;
use app\common\Environment;
use mysqli_sql_exception;
use \mysqli;

class DatabaseLogin{
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

    public function Authentication($user,$pass){
        try{
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $result = mysqli_query($Conection,"select id,username,permissao,cpf_cliente_user from usuario where username='{$user}' and pass='{$pass}'");
            $Conection->close();
            $Dados = [];
            while($row = mysqli_fetch_row($result)){
                $Dados= array($row);
            }
            if(is_array($Dados)&& (count($Dados)>0)){
                return $Dados;
            }
            else{
                return "<script>alert('Não foi possível realizar o Login!');</script>"; 
            }           
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar Login! ".$Ex->getMessage());
        }
    }
}

?>