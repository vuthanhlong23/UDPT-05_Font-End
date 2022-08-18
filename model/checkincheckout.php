<?php
class CheckinCheckoutModel {
    public $id; 
    public $idEmployee; 
    public $startTime; 
    public $endTime; 
    public $date; 
    public $status; 
    public $active; 

    function __construct() {
        $this->id = "";
        $this->idEmployee = "";
        $this->startTime = "";
        $this->endTime= "";
        $this->date = "";
        $this->status = "";
        $this->active = "";
    }

    public static function listCheckinHistory($idEmployee, $pageno) {
        $ch = curl_init();
        $hosting = new Hosting();
        $url = $hosting->urlHost."employee/checkin_history?idEmployee=$idEmployee&pageno=$pageno";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        if($e=curl_error($ch)){
            echo $e;
        }
        else {
            $decoded = json_decode($resp, true);
            // print_r($decoded);
            $checkinHistoryList = array();
            foreach($decoded as $row) {
                $checkin = new CheckinCheckoutModel();
                $checkin->id = $row["id"];
                $checkin->idEmployee = $row["idEmployee"];
                $checkin->startTime = $row["startTime"];
                $checkin->endTime = $row["endTime"];
                $checkin->date = $row["date"];
                $checkin->status = $row["status"];
                $checkin->active = $row["active"];
                $checkinHistoryList[] = $checkin; //add an item into array
            }
            curl_close($ch);
            return $checkinHistoryList;
        }
        curl_close($ch);
    }

    public static function addCheckin($idEmployee, $startTime)
    {
        $param = array(
                'idEmployee'=> $idEmployee,
                'startTime'=> "$startTime"
        );

        $data = json_encode($param);
        $hosting = new Hosting();
        $url = $hosting->urlHost."employee/checkin";

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

    public static function addCheckout($idEmployee)
    {
        $param = array(
                'idEmployee'=> $idEmployee
        );

        $data = json_encode($param);
        $hosting = new Hosting();
        $url = $hosting->urlHost."employee/checkout";

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
}

?>