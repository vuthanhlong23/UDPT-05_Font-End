<?php
class EmployeeHomeController {
    public function index(){
        $VIEW = "./view/home.phtml";
        require("./template/employee_template.phtml");
    }
}

class ManagerHomeController {
    public function index(){
        $VIEW = "./view/home.phtml";
        require("./template/manager_template.phtml");
    }
}

class PresidentHomeController {
    public function index(){
        $VIEW = "./view/home.phtml";
        require("./template/president_template.phtml");
    }
}
?>