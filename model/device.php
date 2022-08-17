<?php
class Device {
    public $id;
    public $idDeviceType;
    public $deviceName;
    public $deviceQuota;
    public $deviceStatus;
    public $active;

    function __construct() {
        $this->id = "";
        $this->idDeviceType = "";
        $this->deviceName = "";
        $this->deviceQuota = "";
        $this->deviceStatus = "";
        $this->active = "";
    }

    public static function ListAllDevice(){
        $hosting = new Hosting();
        $url = $hosting->urlHost."device/listAllDevice";
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
            $dList = array();
            foreach($decoded as $row) {
                $d = new DeviceRequest();
                $d->id = $row["id"];
                $d->idDeviceType = $row["idDeviceType"];
                $d->deviceName = $row["deviceName"];
                $d->deviceQuota = $row["deviceQuota"];
                $d->deviceStatus = $row["deviceStatus"];
                $d->active = $row["active"];
                $dList[] = $d; //add an item into array
            }
            curl_close($ch);
            return $dList;
        }
        curl_close($ch);
    }
}

?>