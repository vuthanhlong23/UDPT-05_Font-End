<?php
class DeviceRequest {
    public $id;
    public $idEmployee;
    public $idITManager;
    public $idDevice;
    public $requestName;
    public $reason;
    public $type;
    public $noteRequest;
    public $requestDate;
    public $requestStatus;
    public $requestITRejectReason;
    public $requestManagerRejectReason;
    public $active;

    function __construct() {
        $this->id = "";
        $this->idEmployee = "";
        $this->idITManager = "";
        $this->idDevice = "";
        $this->requestName = "";
        $this->reason = "";
        $this->type = "";
        $this->noteRequest = "";
        $this->requestDate = "";
        $this->requestStatus = "";
        $this->requestITRejectReason = "";
        $this->requestManagerRejectReason = "";
        $this->active = "";
    }

    public static function GetNameByID($idEmployee){
        $hosting = new Hosting();
        $url = $hosting->urlHost."employee/information?idEmployee=$idEmployee";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        if($e=curl_error($ch)){
            echo $e;
        }
        else {
            $decoded = json_decode($resp, true);
            $eList = array();
            $eList[] = $decoded;
            // print_r($decoded);
            curl_close($ch);
            return $eList;
        }
        curl_close($ch);
    }

    public static function GetDeviceRequestByID($id){
        $hosting = new Hosting();
        $url = $hosting->urlHost."deviceRequest/listdeviceRequestById?id=$id";
        $ch = curl_init();
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
            $drList = array();
            foreach($decoded as $row) {
                $dr = new DeviceRequest();
                $dr->id = $row["id"];
                $dr->idEmployee = $row["idEmployee"];
                $dr->idITManager = $row["idITManager"];
                $dr->idDevice = $row["idDevice"];
                $dr->requestName = $row["requestName"];
                $dr->reason = $row["reason"];
                $dr->type = $row["type"];
                $dr->noteRequest = $row["noteRequest"];
                $dr->requestDate = $row["requestDate"];
                $dr->requestStatus = $row["requestStatus"];
                $dr->requestITRejectReason = $row["requestITRejectReason"];
                $dr->requestManagerRejectReason = $row["requestManagerRejectReason"];
                $dr->active = $row["active"];
                $drList[] = $dr; //add an item into array
            }
            curl_close($ch);
            return $drList;
        }
        curl_close($ch);
    }

    public static function listDeviceRequestByEmpID($idEmployee) {
        $hosting = new Hosting();
        $url = $hosting->urlHost."deviceRequest/listdeviceRequestByEmpId?idEmployee=$idEmployee";
        $ch = curl_init();
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
            $drList = array();
            foreach($decoded as $row) {
                $dr = new DeviceRequest();
                $dr->id = $row["id"];
                $dr->idEmployee = $row["idEmployee"];
                $dr->idITManager = $row["idITManager"];
                $dr->idDevice = $row["idDevice"];
                $dr->requestName = $row["requestName"];
                $dr->reason = $row["reason"];
                $dr->type = $row["type"];
                $dr->noteRequest = $row["noteRequest"];
                $dr->requestDate = $row["requestDate"];
                $dr->requestStatus = $row["requestStatus"];
                $dr->requestITRejectReason = $row["requestITRejectReason"];
                $dr->requestManagerRejectReason = $row["requestManagerRejectReason"];
                $dr->active = $row["active"];
                $drList[] = $dr; //add an item into array
            }
            curl_close($ch);
            return $drList;
        }
        curl_close($ch);
    }

    public static function addRequestDR($idEmployee, $requestName, $type, $reason, $noteRequest) {
        $hosting = new Hosting();
        $url = $hosting->urlHost."deviceRequest/insert";
        $param = array(
            'idEmployee'=> $idEmployee,
            'requestName'=> $requestName,
            'type'=> $type,
            'reason'=> "$reason",
            'noteRequest'=>"$noteRequest"
        );
        $curl = curl_init();

        $payload = json_encode($param);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
        
        $result = curl_exec($curl);
        
        if($e=curl_error($curl)) {
            echo $e;
        }
        else {
            curl_close($curl);
            return $result;
        }
        curl_close($curl);
    }
    
    public static function UpdateInfoByITManager($id, $idITManager, $requestITRejectReason, $requestStatus){
        $hosting = new Hosting();
        $url = $hosting->urlHost."deviceRequest/update_form/ITManager";
        $param = array(
            'id' => $id,
            'idITManager' => $idITManager,
            'requestITRejectReason' => $requestITRejectReason,
            'requestStatus' => $requestStatus
        );

        $curl = curl_init();

        $payload = json_encode($param);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 

        $result = curl_exec($curl); 
        
        if($e=curl_error($curl)) {
            echo $e;
        }
        else {
            curl_close($curl);
            return $result;
        }
        curl_close($curl);
    }

    public static function UpdateInfoByPresident($id, $requestManagerRejectReason, $requestStatus){
        $hosting = new Hosting();
        $url = $hosting->urlHost."deviceRequest/update_form/Presindent";
        $param = array(
            'id' => $id, 
            'requestManagerRejectReason' => $requestManagerRejectReason,
            'requestStatus' => $requestStatus
        );

        $curl = curl_init();

        $payload = json_encode($param);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 

        $result = curl_exec($curl); 
        
        if($e=curl_error($curl)) {
            echo $e;
        }
        else {
            curl_close($curl);
            return $result;
        }
        curl_close($curl);
    }

    public static function ListDeviceRequestByStatus($requestStatus){
        $hosting = new Hosting();
        $url = $hosting->urlHost."deviceRequest/listdeviceRequestByStatus";
        $param = array(
            'requestStatus'=> $requestStatus
        );
        $ch = curl_init();
        $payload = json_encode($param);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
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
            $drList = array();
            foreach($decoded as $row) {
                $dr = new DeviceRequest();
                $dr->id = $row["id"];
                $dr->idEmployee = $row["idEmployee"];
                $dr->idITManager = $row["idITManager"];
                $dr->idDevice = $row["idDevice"];
                $dr->requestName = $row["requestName"];
                $dr->reason = $row["reason"];
                $dr->type = $row["type"];
                $dr->noteRequest = $row["noteRequest"];
                $dr->requestDate = $row["requestDate"];
                $dr->requestStatus = $row["requestStatus"];
                $dr->requestITRejectReason = $row["requestITRejectReason"];
                $dr->requestManagerRejectReason = $row["requestManagerRejectReason"];
                $dr->active = $row["active"];
                $drList[] = $dr; //add an item into array
            }
            curl_close($ch);
            return $drList;
        }
        curl_close($ch);
    }

    public static function ListAllDeviceRequest(){
        $hosting = new Hosting();
        $url = $hosting->urlHost."deviceRequest/listAllDeviceRequest";
        $ch = curl_init();
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
            $drList = array();
            foreach($decoded as $row) {
                $dr = new DeviceRequest();
                $dr->id = $row["id"];
                $dr->idEmployee = $row["idEmployee"];
                $dr->idITManager = $row["idITManager"];
                $dr->idDevice = $row["idDevice"];
                $dr->requestName = $row["requestName"];
                $dr->reason = $row["reason"];
                $dr->type = $row["type"];
                $dr->noteRequest = $row["noteRequest"];
                $dr->requestDate = $row["requestDate"];
                $dr->requestStatus = $row["requestStatus"];
                $dr->requestITRejectReason = $row["requestITRejectReason"];
                $dr->requestManagerRejectReason = $row["requestManagerRejectReason"];
                $dr->active = $row["active"];
                $drList[] = $dr; //add an item into array
            }
            curl_close($ch);
            return $drList;
        }
        curl_close($ch);
    }
}

?>