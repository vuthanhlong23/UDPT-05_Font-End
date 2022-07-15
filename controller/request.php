<?php
class requestController {
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

    public function addRequestOT() {
        session_start();
        $idEmployee = $_SESSION["idEmployee"];
        $idRequestType = 1; 
        $hourOT = $_REQUEST["hourOT"];
        $reason = $_REQUEST["reason"];

        $dataAddRequestOT = requestModel::addRequestOT($idEmployee, $idRequestType, $hourOT, $reason);
        $dataAllRequest = requestModel::listAllRequest($idEmployee, $idRequestType);
        $VIEW = "./view/employee_OT.phtml";
        require("./template/main_template.phtml");
    }
}
?>