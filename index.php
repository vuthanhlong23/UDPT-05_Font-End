<?php

require_once("./controller/home.php");

$action = "";
if (isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}

switch ($action){

    default:
        $controller = new HomeController();
        $controller->index();
        break;
}

?>