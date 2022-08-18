<?php
class Hosting{
    public $urlHost;
    function __construct() {
        // $this->urlHost = "http://127.0.0.1:5001/";
        $this->urlHost = "https://gatewayapi-app.herokuapp.com/";
    }
}
class Employee {
    public $id;
    public $idManager;
    public $idDepartment;
    public $idEmployee;
    public $firstName;
    public $lastName;
    public $dayOfBirth;
    public $gender;
    public $email;
    public $phoneNumber;
    public $address;
    public $maritalStatus;
    public $position;
    public $active;

    function __construct() {
        $this->id = "";
        $this->idManager = "";
        $this->idDepartment = "";
        $this->idEmployee = "";
        $this->firstName = "";
        $this->lastName = "";
        $this->dayOfBirth = "";
        $this->gender = "";
        $this->email = "";
        $this->phoneNumber = "";
        $this->address = "";
        $this->maritalStatus = "";
        $this->position = "";
        $this->active = "";
    }

    public static function readRequest() {
        $ch = curl_init();
        $hosting = new Hosting();
        $url = $hosting->urlHost."readrequest?idEmployee=2&idRequestType=1";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 

        $resp = curl_exec($ch);

        if($e=curl_error($ch)){
            echo $e;
        }
        else {
            $decoded = json_decode($resp, true);
            // print_r($decoded);
            $requestList = array();
            foreach($decoded as $row) {
                echo $row["active"], " ",
                     $row["hourOT"], "<br>";
    
    
            }
        }

        curl_close($ch);
    }

    public static function GetInformation($idEmployee){
        $method = "GET";
        $hosting = new Hosting();
        $url = $hosting->urlHost."employee/information?idEmployee=$idEmployee";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
    
        $result = curl_exec($curl); 
    
        curl_close($curl);
        return $result;
    }

    public static function ListEmployeeByManagerId($idManager, $pageIndex, $pageSize){
        $method = "GET";
        $hosting = new Hosting();
        $url = $hosting->urlHost."listemployee?idManager=$idManager&pageIndex=$pageIndex&pageSize=$pageSize";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
    
        $result = curl_exec($curl); 
    
        curl_close($curl);
        return $result;
    }

    public static function UpdateInformation($idEmployee, $firstname, $lastname, $idDepartment, $position, $dayOfBirth, $gender, $email, $phoneNumber, $address, $maritalStatus){
        $hosting = new Hosting();
        $url = $hosting->urlHost."employee/update";
        $curl = curl_init();

        #Set up data send json
        $data = array(
            'id' => $idEmployee, 
            'firstname' => $firstname,
            'lastname' => $lastname,
            'idDepartment' => $idDepartment,
            'position' => $position,
            'dayOfBirth' => $dayOfBirth,
            'gender' => $gender,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            'address' => $address,
            'maritalStatus' => $maritalStatus
        );

        $dataJson = json_encode($data);


        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curl, CURLOPT_POSTFIELDS,$dataJson);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 

        $result = curl_exec($curl); 
    
        curl_close($curl);
        return $result;
    }
    
}

?>