<?php
class requestModel {

    public $id; 
    public $idRequestType; 
    public $idCheckinCheckOut; 
    public $idEmployee; 
    public $idCensor; 
    public $requestName; 
    public $hourOT; 
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

    public static function addRequestOT ($idEmployee, $idRequestType, $hourOT, $reason) {
        $param = array(
            'idEmployee'=> 2,
            'idRequestType'=> 1,
            'hourOT'=> 3,
            'reason'=>"cuoi vo"
        );
        $url = "http://127.0.0.1:5001/addrequestOT";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, count($param));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $param); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($curl);
        
        if($e=curl_error($curl)) {
            echo $e;
        }
        else {
            $decoded = json_decode($result);
            return $decoded;
        }

        curl_close($curl);
        
        // return $result;
}
}

?>