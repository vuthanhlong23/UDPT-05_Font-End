<?php
class HomeController {
    public function index(){
        $VIEW = "./view/employee_OT.phtml";
        require("./template/main_template.phtml");
    }
}
?>