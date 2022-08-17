<?php
class requestController {
    public function listRequestByCenSorship(){
        $idCensorship = $_REQUEST["idCensorship"];
        $page = $_REQUEST["page"];
        $pageSize = 5;
        $pageIndex = ($page - 1) * $pageSize;
        $typeRequest = $_REQUEST["typeRequest"];
        $requestStatus = $_REQUEST["requestStatus"];
        $result = requestModel::ListRequestByCensorshipId($idCensorship, $pageIndex, $pageSize, $typeRequest, $requestStatus);
        $dataListRequestByCensorship = json_decode($result, true);
        $VIEW = "./view/censorship.phtml";
        require("./template/main_template.phtml");
    }

    public function RequestDetailByCensorship(){
        $idCensorship = $_REQUEST["idCensorship"];
        $page = $_REQUEST["page"];
        $pageSize = 5;
        $pageIndex = ($page - 1) * $pageSize;
        $typeRequest = $_REQUEST["typeRequest"];
        $idRequest = $_REQUEST["idRequest"];
        $requestStatus = $_REQUEST["requestStatus"];
        
        if(isset($_REQUEST["func"])){
            $requestStatus = $_REQUEST["requestStatus"];
            $requestRejectReason = $_REQUEST["requestRejectReason"];
            $result = requestModel::UpdateRequestByCensorship($idRequest, $requestStatus, $requestRejectReason);
        }

        $result = requestModel::RequestDetailByIdRequest($idCensorship, $pageIndex, $pageSize, $typeRequest, $idRequest, $requestStatus);
        $data= json_decode($result, true);
        $VIEW = "./view/censorship_detail.phtml";
        require("./template/main_template.phtml");
    }
    
    public function listAllRequestOT() {
        session_start();
        $idEmployee = $_SESSION["idEmployee"];
        $idRequestType = 1; 
        $dataAllRequest = requestModel::listAllRequest($idEmployee, $idRequestType);
        $VIEW = "./view/employee_OT.phtml";
        require("./template/main_template.phtml");
    }

    public function listAllRequestOFF() {
        session_start();
        $idEmployee = $_SESSION["idEmployee"];
        $idRequestType = 2; 
        $dataAllRequest = requestModel::listAllRequest($idEmployee, $idRequestType);
        $VIEW = "./view/employee_OFF.phtml";
        require("./template/main_template.phtml");
    }

    public function listAllRequestWFH() {
        session_start();
        $idEmployee = $_SESSION["idEmployee"];
        $idRequestType = 3; 
        $dataAllRequest = requestModel::listAllRequest($idEmployee, $idRequestType);
        $VIEW = "./view/employee_WFH.phtml";
        require("./template/main_template.phtml");
    }

    public function addRequestWFH() {
        session_start();
        $idRequestType = 3; 
        $idEmployee = $_SESSION["idEmployee"];
        $startDayWFH = $_REQUEST["startDayWFH"];
        $endDayWFH = $_REQUEST["endDayWFH"];
        $reason = $_REQUEST["reason"];

        $dataAddRequestWFH = requestModel::addRequestWFH($idEmployee, $startDayWFH, $endDayWFH,$reason);
        $dataAllRequest = requestModel::listAllRequest($idEmployee, $idRequestType);
        header("Location: index.php?action=requestListWFH");
    }

    public function addRequestOT() {
        session_start();
        $idEmployee = $_SESSION["idEmployee"];
        $idRequestType = 1; 
        $hourOT = $_REQUEST["hourOT"];
        $dayOT = $_REQUEST["dayOT"];
        $reason = $_REQUEST["reason"];

        $dataAddRequestOT = requestModel::addRequestOT($idEmployee, $idRequestType, $hourOT, $dayOT, $reason);
        $dataAllRequest = requestModel::listAllRequest($idEmployee, $idRequestType);
        header("Location: index.php?action=requestListOT");
    }

    public function addRequestOFF() {
        session_start();
        $idEmployee = $_SESSION["idEmployee"];
        $idRequestType = 2; 
        $startDayOFF = $_REQUEST["startDayOFF"];
        $numberDayOFF = $_REQUEST["numberDayOFF"];
        $noteDayOFF = $_REQUEST["noteDayOFF"];
        $reason = $_REQUEST["reason"];

        $dataAddRequestOFF = requestModel::addRequestOFF($idEmployee, $idRequestType, $startDayOFF, $numberDayOFF, $noteDayOFF, $reason);
        $dataAllRequest = requestModel::listAllRequest($idEmployee, $idRequestType);
        header("Location: index.php?action=requestListOFF");
    }
}
?>