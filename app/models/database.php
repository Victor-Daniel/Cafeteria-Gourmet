<?php
namespace app\models;
use app\common\Environment;
use mysqli_sql_exception;
use \mysqli;

// Classe responsável pelas consultas e atualização de registro no banco.
class DataBase{
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
    public function N_Produtos(){
        
        try{
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $result = mysqli_query($Conection,"select qtprodutos from qtprod where id=1");
            $Conection->close();
            while($row = mysqli_fetch_row($result)){
               return $row[0];
            }           
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
       
    }

    public function GetNameAllProdutos(){
        try{
            $NameProd = [];
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $Result = mysqli_query($Conection,"select product_name from produtos");
            $Conection->close();  
            $i=0;    
            while($Content=mysqli_fetch_row($Result)){
                
               $NameProd[$i] = $Content[0];
               $i++;
             }
             return $NameProd;
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }
    public function GetDescriptionAllProdutos(){
        try{
            $DescProd = [];
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $Result = mysqli_query($Conection,"select product_description from produtos");
            $Conection->close();  
            $i=0;    
            while($Content=mysqli_fetch_row($Result)){
                
               $DescProd[$i] = $Content[0];
               $i++;
             }
             return $DescProd;
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }
    public function GetNamePrecoProdutos(){
        try{
            $PrecoProd = [];
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $Result = mysqli_query($Conection,"select preco from produtos");
            $Conection->close();  
            $i=0;    
            while($Content=mysqli_fetch_row($Result)){
                
               $PrecoProd[$i] = $Content[0];
               $i++;
             }
             return $PrecoProd;
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }

    public function GetPictureNameProd(){
        try{
            $ImageProd = [];
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $Result = mysqli_query($Conection,"select imagem_prod from produtos");
            $Conection->close();  
            $i=0;    
            while($Content=mysqli_fetch_row($Result)){
                
               $ImageProd[$i] = $Content[0];
               $i++;
             }
             return $ImageProd;
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }

    public function GetTypeProd(){
        try{
            $TypeProd = [];
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $Result = mysqli_query($Conection,"select type_prod from produtos");
            $Conection->close();  
            $i=0;    
            while($Content=mysqli_fetch_row($Result)){
                
               $TypeProd[$i] = $Content[0];
               $i++;
             }
             return $TypeProd;
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }

    public function GetQuantSalgados(){
        try{
            $QuantSalgado = [];
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $Result = mysqli_query($Conection,"select count(*) from produtos where type_prod='Salgado'");
            $Conection->close();  
            $i=0;    
            while($Content=mysqli_fetch_row($Result)){
                
               $QuantSalgado[$i] = $Content[0];
               $i++;
             }
             return $QuantSalgado;
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }

    public function GetQuantBebidas(){
        try{
            $QuantSalgado = [];
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $Result = mysqli_query($Conection,"select count(*) from produtos where type_prod='Bebida'");
            $Conection->close();  
            $i=0;    
            while($Content=mysqli_fetch_row($Result)){
                
               $QuantSalgado[$i] = $Content[0];
               $i++;
             }
             return $QuantSalgado;
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }

    public function GetQuantDoces(){
        try{
            $QuantDoces = [];
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $Result = mysqli_query($Conection,"select count(*) from produtos where type_prod='Doces'");
            $Conection->close();  
            $i=0;    
            while($Content=mysqli_fetch_row($Result)){
                
               $QuantDoces[$i] = $Content[0];
               $i++;
             }
             return $QuantDoces;
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }

    public function GetQuantSobremesas(){
        try{
            $QuantSobremesas = [];
            //Criando conexão pdo com mysql'
            $Conection = new mysqli($this->Host,$this->UserName,$this->Pass,$this->Database,$this->Port);
            $Result = mysqli_query($Conection,"select count(*) from produtos where type_prod='Sobremesas'");
            $Conection->close();  
            $i=0;    
            while($Content=mysqli_fetch_row($Result)){
                
               $QuantSobremesas[$i] = $Content[0];
               $i++;
             }
             return $QuantSobremesas;
        }
        catch(mysqli_sql_exception $Ex){
            
            die("ERROR: Não foi possível realizar conexão! ".$Ex->getMessage());
        }
    }
}
?>