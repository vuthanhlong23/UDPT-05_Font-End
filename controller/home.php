<?php
class HomeController {
    public function index(){
        $VIEW = "./view/employee_information.phtml";
        require("./template/main_template.phtml");
    }
}
?>