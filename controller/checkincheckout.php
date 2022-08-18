<?php
class CheckinCheckoutController {
    public function checkinHistory(){
        session_start();
        $idEmployee = $_SESSION["idEmployee"];
        $pageno = $_REQUEST["pageno"];
        $dataCheckinHistory = CheckinCheckoutModel::listCheckinHistory($idEmployee, $pageno);
        $VIEW = "./view/checkincheckout_history.phtml";
        require("./template/main_template.phtml");
    }
    public function checkin(){
        $VIEW = "./view/checkincheckout.phtml";
        require("./template/main_template.phtml");
    }

    public function addCheckin(){
        session_start();
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $idEmployee = $_SESSION["idEmployee"];
        $startTime = date("H:i:sa");

        $dataAddCheckin = CheckinCheckoutModel::addCheckin($idEmployee, $startTime);

        $VIEW = "./view/checkincheckout.phtml";
        require("./template/main_template.phtml");
    }
    public function addCheckout(){
        session_start();
        $idEmployee = $_SESSION["idEmployee"];

        $dataAddCheckout = CheckinCheckoutModel::addCheckout($idEmployee);

        $VIEW = "./view/checkincheckout.phtml";
        require("./template/main_template.phtml");
    }
}
?>