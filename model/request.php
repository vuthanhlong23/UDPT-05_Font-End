<?php
class requestModel {

    public $id; 
    public $idRequestType; 
    public $idCheckinCheckOut; 
    public $idEmployee; 
    public $idCensor; 
    public $requestName; 
    public $hourOT; 
    public $dayOT; 
    public $startDayOFF; 
    public $numberDayOFF; 
    public $noteDayOFF; 
    public $startDayWFH; 
    public $endDayWFH; 
    public $reason; 
    public $requestDate; 
    public $requestStatus; 
    public $requestRejectReason; 
    public $active; 

    function __construct() {
        $this->id = "";
        $this->idRequestType = "";
        $this->idCheckinCheckOut = "";
        $this->idEmployee = "";
        $this->idCensor = "";
        $this->requestName = "";
        $this->hourOT = "";
        $this->dayOT = "";
        $this->startDayOFF = "";
        $this->numberDayOFF = "";
        $this->noteDayOFF = "";
        $this->startDayWFH = "";
        $this->endDayWFH = "";
        $this->reason = "";
        $this->requestDate = "";
        $this->requestStatus = "";
        $this->requestRejectReason = "";
        $this->active = "";
    }

    public static function listAllRequest($idEmployee, $idRequestType) {
        $ch = curl_init();
        $url = "http://127.0.0.1:5001/readrequest?idEmployee=$idEmployee&idRequestType=$idRequestType";

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
                $request = new requestModel();
                $request->id = $row["id"];
                $request->idRequestType = $row["idRequestType"];
                $request->idCheckinCheckOut = $row["idCheckinCheckOut"];
                $request->idEmployee = $row["idEmployee"];
                $request->idCensor = $row["idCensor"];
                $request->requestName = $row["requestName"];
                $request->hourOT = $row["hourOT"];
                $request->dayOT = $row["dayOT"];
                $request->startDayOFF = $row["startDayOFF"];
                $request->numberDayOFF = $row["numberDayOFF"];
                $request->noteDayOFF = $row["noteDayOFF"];
                $request->startDayWFH = $row["startDayWFH"];
                $request->endDayWFH = $row["endDayWFH"];
                $request->reason = $row["reason"];
                $request->requestDate = $row["requestDate"];
                $request->requestStatus = $row["requestStatus"];
                $request->requestRejectReason = $row["requestRejectReason"];
                $request->active = $row["active"];
                $requestList[] = $request; //add an item into array
            }
            curl_close($ch);
            return $requestList;
        }
        curl_close($ch);
    }

    public static function addRequestWFH($idEmployee, $startDayWFH, $endDayWFH,$reason)
    {
        $param = array(
                'idRequestType'=> 3,
                'idEmployee'=> $idEmployee,
                'idCensor'=> 2,
                'startDayWFH'=> "'$startDayWFH'", 
                'endDayWFH'=> "'$endDayWFH'",
                'reason'=> "'$reason'"
        );

        $data = json_encode($param);

        $url = "http://127.0.0.1:5001/employee/addrequestWFH";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($curl);
    
        curl_close($curl);
        
        return ($result);
    }

    public static function addRequestOT($idEmployee, $idRequestType, $hourOT, $dayOT, $reason) {
        $param = array(
            'idEmployee'=> $idEmployee,
            'idRequestType'=> $idRequestType,
            'hourOT'=> $hourOT,
            'dayOT'=> "'$dayOT'",
            'reason'=>"'$reason'"
        );
        $url = "http://127.0.0.1:5001/addrequestOT";
        $curl = curl_init();

        $payload = json_encode($param);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
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
        
    public static function addRequestOFF($idEmployee, $idRequestType, $startDayOFF, $numberDayOFF, $noteDayOFF, $reason) {
        $param = array(
            'idEmployee'=> $idEmployee,
            'idRequestType'=> $idRequestType,
            'startDayOFF'=> "'$startDayOFF'",
            'numberDayOFF'=> $numberDayOFF,
            'noteDayOFF'=> "'$noteDayOFF'",
            'reason'=>"'$reason'"
        );
        $url = "http://127.0.0.1:5001/addrequestOFF";
        $curl = curl_init();

        $payload = json_encode($param);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
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
}

?>