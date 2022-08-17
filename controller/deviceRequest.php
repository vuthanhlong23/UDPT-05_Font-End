<?php
class deviceRequestController {
    public function listAllRequestDRByEmpID() {
        session_start();
        $idEmployee = $_SESSION["idEmployee"];
        $dataAllRequest = DeviceRequest::listDeviceRequestByEmpID($idEmployee);
        $VIEW = "./view/employee_DR.phtml";
        require("./template/main_template.phtml");
    }
    public function addRequestDR() {
        session_start();
        $idEmployee = $_SESSION["idEmployee"];
        $requestName = $_REQUEST["requestName"];
        $type = $_REQUEST["type"];
        $reason = $_REQUEST["reason"];
        $noteRequest = $_REQUEST["noteRequest"];
        $dataAddRequestDR = DeviceRequest::addRequestDR($idEmployee, $requestName, $type, $reason, $noteRequest);
        $dataAllRequest = DeviceRequest::listDeviceRequestByEmpID($idEmployee);
        header("Location: index.php?action=requestListDR");
    }
    public function listDeviceRequestByStatus(){
        $requestStatus = $_REQUEST["requestStatus"];
        $dataAllRequest = DeviceRequest::ListDeviceRequestByStatus($requestStatus);
        //$dataAllRequest = json_decode($result, true);
        $dataAllRequestDevice = Device::ListAllDevice();
        $VIEW = "./view/ITmanager_DR.phtml";
        require("./template/main_template.phtml");
    }
    public function listAllRequestDR() {
        $dataAllRequest = DeviceRequest::ListAllDeviceRequest();
        $dataAllRequestDevice = Device::ListAllDevice();
        $VIEW = "./view/ITmanager_DR.phtml";
        require("./template/main_template.phtml");
    }
    public function listrequestDRbyITManager() {
        $id = $_REQUEST["id"];
        $dataAllRequest = DeviceRequest::GetDeviceRequestByID($id);
        $dataAllRequestt = DeviceRequest::GetNameByID($dataAllRequest[0]->idEmployee);
        $VIEW = "./view/ITmanager_formDR.phtml";
        require("./template/main_template.phtml");
    }
    public function updaterequestDRbyITManager() {

        if (isset($_REQUEST['formDR_temp'])) {
            session_start();
            $id = $_REQUEST["id"];
            $idITManager = $_SESSION["idEmployee"];
            $requestStatus = $_REQUEST["formDR_temp"];
            $dataUpdate = DeviceRequest::UpdateInfoByITManager($id, $idITManager, '', $requestStatus);
            header("Location: index.php?action=listALLDR_ITmanager");
        }
        elseif (isset($_REQUEST['formDR_defuse'])) {
            session_start();
            $id = $_REQUEST["id"];
            $idITManager = $_SESSION["idEmployee"];
            $requestStatus = $_REQUEST["formDR_defuse"];
            $requestITRejectReason= $_REQUEST["requestITRejectReason"];
            $dataUpdate = DeviceRequest::UpdateInfoByITManager($id, $idITManager, $requestITRejectReason, $requestStatus);
            header("Location: index.php?action=listALLDR_ITmanager");
        }
    }
    public function listAllRequestDR_president() {
        $dataAllRequest = DeviceRequest::ListAllDeviceRequest();
        $VIEW = "./view/president_DR.phtml";
        require("./template/main_template.phtml");
    }
    public function listDeviceRequestByStatus_president(){
        $requestStatus = $_REQUEST["requestStatus"];
        $dataAllRequest = DeviceRequest::ListDeviceRequestByStatus($requestStatus);
        $VIEW = "./view/president_DR.phtml";
        require("./template/main_template.phtml");
    }
    public function listrequestDRbypresident() {
        $id = $_REQUEST["id"];
        $dataAllRequest = DeviceRequest::GetDeviceRequestByID($id);
        $dataAllRequestt = DeviceRequest::GetNameByID($dataAllRequest[0]->idEmployee);
        $dataAllRequesttt = DeviceRequest::GetNameByID($dataAllRequest[0]->idITManager);
        $VIEW = "./view/president_formDR.phtml";
        require("./template/main_template.phtml");
    }
    public function updaterequestDRbyPresident() {
        if (isset($_REQUEST['formDR_success'])) {
            $id = $_REQUEST["id"];
            $requestStatus = $_REQUEST["formDR_success"];
            $dataUpdate = DeviceRequest::UpdateInfoByPresident($id, '', $requestStatus);
            header("Location: index.php?action=listALLDR_president");
        }
        elseif (isset($_REQUEST['formDR_defuse'])) {
            $id = $_REQUEST["id"];
            $requestStatus = $_REQUEST["formDR_defuse"];
            $requestManagerRejectReason= $_REQUEST["requestManagerRejectReason"];
            $dataUpdate = DeviceRequest::UpdateInfoByPresident($id, $requestManagerRejectReason, $requestStatus);
            header("Location: index.php?action=listALLDR_president");
        }
    }
}
?>