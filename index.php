<?php

require_once("./controller/home.php");
require_once("./controller/loginlogout.php");
require_once("./controller/employee.php");
require_once("./controller/request.php");
require_once("./model/request.php");
require_once("./model/employee.php");

$action = "";
if (isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}

switch ($action){
    case "home":
        $controller = new HomeController();
        $controller->home();
        break;
    case "requestListOT":
        $controller = new requestController();
        $controller->listAllRequestOT();
        break;
    case "requestListOFF":
        $controller = new requestController();
        $controller->listAllRequestOFF();
        break;
    case "login":     
        $controller = new LoginLogoutController();
        $controller->login();
        break;
    case "requestWFH":     
        $controller = new EmployeeController();
        $controller->requestWFH();
        break;
    case "addRequestOT":     
        $controller = new requestController();
        $controller->addRequestOT();
        break;
    // case "addRequestOFF":     
    //     $controller = new requestController();
    //     $controller->addRequestOFF();
    //     break;
    case "information":     
        $controller = new EmployeeController();
        $controller->information();
        break;
    default:
        $controller = new LoginLogoutController();
        $controller->index();
        break;
}

?>