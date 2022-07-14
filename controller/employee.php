<?php
function handleSubmitRequestWFH()
{
    $method = "GET";
    $idEmployee = intval($_SESSION['idEmployee']);
    $idRequestType = 3;
    $url = "http://127.0.0.1:5001/readrequest?idEmployee=$idEmployee&idRequestType=$idRequestType";
    $databool = false;
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl); 

    curl_close($curl);
    return $result;
}

class EmployeeController {
    public function requestWFH(){
        $VIEW = "./view/employee_WFH.phtml";
        require("./template/main_template.phtml");
    }
}
?>