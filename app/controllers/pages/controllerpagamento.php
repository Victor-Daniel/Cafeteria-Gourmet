<?php
namespace app\controllers\pages;

use app\util\ViewPagamento;

session_start();

class ControllerPagamento{

    public static function RenderPagamento(){

        return ViewPagamento::GetContentView("Pagamento");
    }

}


?>