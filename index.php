<?php

require_once("./controller/home.php");
require_once("./controller/loginlogout.php");
require_once("./controller/employee.php");
require_once("./controller/request.php");
require_once("./model/request.php");
require_once("./model/employee.php");
require_once("./model/department.php");
require_once("./model/task.php");

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

    case "information":     
        $controller = new EmployeeController();
        $controller->information();
        break;
    case "task":     
        $controller = new EmployeeController();
        $controller->task();
        break;
    default:
        $controller = new LoginLogoutController();
        $controller->index();
        break;
}

?>