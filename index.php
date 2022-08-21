<?php 
require_once("./controller/employee.php");
require_once("./controller/request.php");
require_once("./controller/checkincheckout.php");
require_once("./controller/home.php");
require_once("./controller/loginlogout.php");
require_once("./controller/deviceRequest.php");
require_once("./controller/activity.php");
require_once("./model/request.php");
require_once("./model/checkincheckout.php");
require_once("./model/employee.php");
require_once("./model/department.php");
require_once("./model/task.php");
require_once("./model/device.php");
require_once("./model/activity.php");
require_once("./model/deviceRequest.php");

$action = "";
if (isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
switch ($action){
    case "requestListDR":
        $controller = new deviceRequestController();
        $controller->listAllRequestDRByEmpID();
        break;
    case "addRequestDR":
        $controller = new deviceRequestController();
        $controller->addRequestDR();
        break;
    case "requestListA":
        $controller = new activityController();
        $controller->listAllActivity();
        break;
    case "searchA":
        $controller = new activityController();
        $controller->SearchActivity();
        break;
    case "registerA":
        $controller = new activityController();
        $controller->addRegisterA();
        break;
    case "followA":
        $controller = new activityController();
        $controller->addFollowA();
        break;
    case "listALLDR_ITmanager":
        $controller = new deviceRequestController();
        $controller->listAllRequestDR();
        break;
    case "listALLDR_president":
        $controller = new deviceRequestController();
        $controller->listAllRequestDR_president();
        break;
    case "ITmanager_DR":
        $controller = new deviceRequestController();
        $controller->listDeviceRequestByStatus();
        break;
    case "President_DR":
        $controller = new deviceRequestController();
        $controller->listDeviceRequestByStatus_president();
        break;
    case "listITmanager_formDR":
        $controller = new deviceRequestController();
        $controller->listrequestDRbyITManager();
        break;
    case "updateITmanager_formDR":
        $controller = new deviceRequestController();
        $controller->updaterequestDRbyITManager();
        break;
    case "updatePresident_formDR":
        $controller = new deviceRequestController();
        $controller->updaterequestDRbyPresident();
        break;
    case "listpresident_formDR":
        $controller = new deviceRequestController();
        $controller->listrequestDRbypresident();
        break;
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
    case "censorship":     
        $controller = new requestController();
        $controller->listRequestByCenSorship();
        break;
    case "censorshipdetail":     
        $controller = new requestController();
        $controller->RequestDetailByCensorship();
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
    case "managerEmployee": 
        $controller = new EmployeeController();
        $controller->listEmployee();
        break;
    case "logout":     
        $controller = new LoginLogoutController();
        $controller->Logout();
        break;
    case "task":     
        $controller = new EmployeeController();
        $controller->task();
        break;
    case "taskdetail":     
        $controller = new EmployeeController();
        $controller->taskDetail();
        break;
    case "managertask":     
        $controller = new EmployeeController();
        $controller->managerTask();
        break;
    case "checkinHistory":     
        $controller = new CheckinCheckoutController();
        $controller->checkinHistory();
        break;
    case "checkin":     
        $controller = new CheckinCheckoutController();
        $controller->checkin();
        break;
    case "addCheckin":     
        $controller = new CheckinCheckoutController();
        $controller->addCheckin();
        break;
    case "addCheckout":     
        $controller = new CheckinCheckoutController();
        $controller->addCheckout();
        break;
    case "checkout_late":     
        $controller = new requestController();
        $controller->listAllRequestCheckoutLate();
        break;
    case "addrequestCheckoutLate":     
        $controller = new requestController();
        $controller->addRequestCheckoutLate();
        break;
    default:
        $controller = new LoginLogoutController();
        $controller->index();
        break;
}
?>