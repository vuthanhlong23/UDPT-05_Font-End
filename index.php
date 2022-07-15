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
    case "requestListWFH":
        $controller = new requestController();
        $controller->listAllRequestWFH();
        break;
    case "login":     
        $controller = new LoginLogoutController();
        $controller->login();
        break;
    case "addRequestWFH":     
        $controller = new requestController();
        $controller->addRequestWFH();
        break;
    case "addRequestOT":     
        $controller = new requestController();
        $controller->addRequestOT();
        break;
    case "addRequestOFF":     
        $controller = new requestController();
        $controller->addRequestOFF();
        break;
    case "information":     
        $controller = new EmployeeController();
        $controller->information();
        break;
    case "logout":     
        $controller = new LoginLogoutController();
        $controller->Logout();
        break;
    case "task":     
        $controller = new EmployeeController();
        $controller->task();
        break;
    case "checkin":     
        $controller = new CheckinCheckoutController();
        $controller->checkin();
        break;
    default:
        $controller = new LoginLogoutController();
        $controller->index();
        break;
}

?>