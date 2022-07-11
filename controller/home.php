<?php
class HomeController {
    public function index(){
        $VIEW = "./view/home.phtml";
        require("./template/main_template.phtml");
    }
}
?>