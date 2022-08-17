<?php
class activityController {
    public function listAllActivity() {
        $dataAllRequest = Activity::listAllActivity();
        $VIEW = "./view/employee_A.phtml";
        require("./template/main_template.phtml");
    }
    public function SearchActivity() {
        $activityName = $_REQUEST["activityName"];
        $dataAllRequest = Activity::SearchActivity($activityName);
        $VIEW = "./view/employee_A.phtml";
        require("./template/main_template.phtml");
    }
    public function addRegisterA() {
        session_start();
        $idEmployee = $_SESSION["idEmployee"];
        $idActivity =  $_REQUEST["idActivity"];
        $dataAllRequest = Activity::addRegisterA($idEmployee, $idActivity);
        header("Location: index.php?action=requestListA");
    }

    public function addFollowA() {
        session_start();
        $idEmployee = $_SESSION["idEmployee"];
        $idActivity =  $_REQUEST["idActivity"];
        $dataAllRequest = Activity::addFollowA($idEmployee, $idActivity);
        header("Location: index.php?action=requestListA");
    }
    
}
?>