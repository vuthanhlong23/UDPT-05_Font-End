<?php
class CheckinCheckoutController {
    public function checkinHistory(){
        $VIEW = "./view/checkincheckout_history.phtml";
        require("./template/main_template.phtml");
    }
    public function checkin(){
        $VIEW = "./view/checkincheckout.phtml";
        require("./template/main_template.phtml");
    }
}
?>