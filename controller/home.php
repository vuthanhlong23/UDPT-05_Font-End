<?php
class HomeController {
    public function home(){
        $VIEW = "./view/home.phtml";
        require("./template/main_template.phtml");
    }
}
?>