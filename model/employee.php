<?php
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
        $url = "http://127.0.0.1:5001/readrequest?idEmployee=2&idRequestType=1";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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
        $url = "http://127.0.0.1:5001/employee/information?idEmployee=$idEmployee";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
        $result = curl_exec($curl); 
    
        curl_close($curl);
        return $result;
    }

    public static function UpdateInformation($idEmployee, $firstname, $lastname, $idDepartment, $position, $dayOfBirth, $gender, $email, $phoneNumber, $address, $maritalStatus){
        $url = "http://127.0.0.1:5001/employee/update";
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

        $result = curl_exec($curl); 
    
        curl_close($curl);
        return $result;
    }
    
}

?>