<?php
class TaskEmployee{
    public static function ListTaskEmployees($idEmployee, $pageIndex, $pageSize, $status){
        $method = "GET";
        $hosting = new Hosting();
        $url = $hosting->urlHost."employee/listtask?idEmployee=$idEmployee&pageIndex=$pageIndex&pageSize=$pageSize&status=$status";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, utf8_decode($url));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
    
        $result = curl_exec($curl); 
    
        curl_close($curl);
        return $result;
    }
}
?>