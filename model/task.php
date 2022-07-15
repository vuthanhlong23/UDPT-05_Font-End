<?php
class TaskEmployee{
    public static function ListTaskEmployees($idEmployee, $pageIndex, $pageSize, $status){
        $method = "GET";
        $url = "http://127.0.0.1:5001/employee/listtask?idEmployee=$idEmployee&pageIndex=$pageIndex&pageSize=$pageSize&status=$status";
        
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, utf8_decode($url));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
        $result = curl_exec($curl); 
    
        curl_close($curl);
        return $result;
    }
}
?>