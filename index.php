<?php

require_once("./controller/home.php");
require_once("./controller/loginlogout.php");
require_once("./controller/employee.php");

$action = "";
if (isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}

switch ($action){
    case "home":     
        $controller = new HomeController();
        $controller->home();
        break;
    case "login":     
        $controller = new LoginLogoutController();
        $controller->login();
        break;
    case "requestWFH":     
        $controller = new EmployeeController();
        $controller->requestWFH();
        break;
    default:
        $controller = new LoginLogoutController();
        $controller->index();
        break;
}

?>