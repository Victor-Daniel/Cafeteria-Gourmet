<?php
namespace app\util;

class ViewHome{
    

    //Método responsável por retornar o conteúdo exato do Arquivo HTML da view.
    public static function GetContentView($NameView){
        $File = __DIR__."/../view/html/".$NameView.".html";
        if(file_exists($File)){
            return file_get_contents($File);
        }
        else{
            return "Arquivo não encontrado!";
        }
    }
    //Método responsável por retornar o conteúdo Renderizado.
    public static function Render($NameView,$vars=[]){
        $Render = self::GetContentView($NameView);
        // Substituindo o valor das chaves no documento pelos valores do array
        //Pegando as chaves do array recebido
        $chave = array_keys($vars);
        //criando um novo array com as chaves editadas do array recebido
        $chave = array_map(function($item){
            return "{{".$item."}}";
        },$chave);
        //substituindo e retornando e os valores da home.
        return str_replace($chave,array_values($vars),$Render);
    }
    //Renderiza o conteúdo do Header
    public static function RenderHeader(){
        return self::GetContentView("header");
    }
    //Renderiza o conteúdo do footer.
    public static function RenderFooter(){
        return self::GetContentView("footer");
    }
}

?>