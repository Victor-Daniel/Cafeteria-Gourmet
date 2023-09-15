<?php
define("DS",DIRECTORY_SEPARATOR);
define("Dir_Class",__DIR__);

spl_autoload_register(
    function($classe){
        $DirBase = Dir_Class.DS. str_replace("\\",DS,$classe).".php";
        if(file_exists($DirBase)){
            require_once $DirBase;
        }
       
    }
);
?>