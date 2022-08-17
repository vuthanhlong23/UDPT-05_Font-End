<?php
class Activity {
    public $id;
    public $idActivityType;
    public $activityName;
    public $activityDeadline;
    public $activityDescription;
    public $active;

    function __construct() {
        $this->id = "";
        $this->idActivityType = "";
        $this->activityName = "";
        $this->activityDeadline = "";
        $this->activityDescription = "";
        $this->active = "";
    }

    public static function listAllActivity() {
        $hosting = new Hosting();
        $url = $hosting->urlHost."activity/getall";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        if($e=curl_error($ch)){
            echo $e;
        }
        else {
            $decoded = json_decode($resp, true);
            // print_r($decoded);
            $activityList = array();
            foreach($decoded as $row) {
                $activity = new Activity();
                $activity->id = $row["id"];
                $activity->idActivityType = $row["idActivityType"];
                $activity->activityName = $row["activityName"];
                $activity->activityDeadline = $row["activityDeadline"];
                $activity->activityDescription = $row["activityDescription"];
                $activity->active = $row["active"];
                $activityList[] = $activity; //add an item into array
            }
            curl_close($ch);
            return $activityList;
        }
        curl_close($ch);
    }
    public static function SearchActivity($activityName) {
        $hosting = new Hosting();
        $url = $hosting->urlHost."activity/search";
        $param = array(
            'activityName'=> $activityName
        );
        $ch = curl_init();
        $payload = json_encode($param);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        if($e=curl_error($ch)){
            echo $e;
        }
        else {
            $decoded = json_decode($resp, true);
            // print_r($decoded);
            $activityList = array();
            foreach($decoded as $row) {
                $activity = new Activity();
                $activity->id = $row["id"];
                $activity->idActivityType = $row["idActivityType"];
                $activity->activityName = $row["activityName"];
                $activity->activityDeadline = $row["activityDeadline"];
                $activity->activityDescription = $row["activityDescription"];
                $activity->active = $row["active"];
                $activityList[] = $activity; //add an item into array
            }
            curl_close($ch);
            return $activityList;
        }
        curl_close($ch);
    }

    public static function addRegisterA($idEmployee, $idActivity) {
        $hosting = new Hosting();
        $url = $hosting->urlHost."employeeActivity/register/insert";
        $param = array(
            'idEmployee'=> $idEmployee,
            'idActivity'=> $idActivity
        );
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

    public static function addFollowA($idEmployee, $idActivity) {
        $hosting = new Hosting();
        $url = $hosting->urlHost."employeeActivity/follow/insert";
        $param = array(
            'idEmployee'=> $idEmployee,
            'idActivity'=> $idActivity
        );
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