<?php
function handleSubmit()
 {
     $username = $_POST['Username'];
     $password = $_POST['Password'];
     $url = "https://gatewayapi-app.herokuapp.com/login?username='$username'&password='$password'";
     $curl = curl_init();

     curl_setopt($curl, CURLOPT_URL, $url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);  

     $result = curl_exec($curl); 

     curl_close($curl);
     return $result;
 }

class LoginLogoutController {
    public function login(){  
        $data = handleSubmit();
        if(empty($data) == false){
            session_start();
            $temp = json_decode($data,true);
            $_SESSION['roleName'] = $temp["roleName"];
            $_SESSION['idEmployee'] = $temp["idEmployee"];
            $_SESSION['username'] = $temp["username"];
            $_SESSION['password'] = $temp["password"];
            $VIEW = "./view/home.phtml";
            require("./template/main_template.phtml");
        }
        else{
            $alert ="<script>alert('Tên tài khoản hoặc mật khẩu không đúng');</script>";
            echo $alert;
            require("./view/loginlogout.phtml");
        }
    }
    public function index(){
        require("./view/loginlogout.phtml");
    }
    public function Logout(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header("Location: index.php");
        // require("./view/loginlogout.phtml");
    }
}
?>