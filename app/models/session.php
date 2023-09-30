<?php
namespace app\models;

// Classe responsável por carregar as informações de usuário na sessão
class Session{
    private $Username;
    private $UserPermissions;

    public function __construct()
    {
        $this->Username = $_SESSION["UserName"];
        $this->UserPermissions = $_SESSION["UserPermissions"];
    }

    public function GetUsuario(){
        return $this->Username;
    }
    public function GetPermissoes(){
        return $this->UserPermissions;
    }
}

?>