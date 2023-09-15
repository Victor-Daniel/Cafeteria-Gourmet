<?php
require_once "autoload.php"; 

use app\controllers\pages\ControllerHome;
use app\http\Router;

define('URL','http://localhost/Cafeteria-Gourmet');

$OBJ = new Router(URL);
echo "<pre>";
print_r($OBJ);
echo "</pre>";

exit;

echo ControllerHome::GetHome();




?>