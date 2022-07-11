<?php
class HomeController {
    public function index(){
        $VIEW = "./view/censorship_detail.phtml";
        require("./template/main_template.phtml");
    }
}
?>