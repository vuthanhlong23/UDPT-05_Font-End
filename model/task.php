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

    public static function TaskDetailById($idEmployee, $pageIndex, $pageSize, $status, $idTask){
        $method = "GET";
        $hosting = new Hosting();
        $url = $hosting->urlHost."employee/taskdetail?idEmployee=$idEmployee&pageIndex=$pageIndex&pageSize=$pageSize&status=$status&idTask=$idTask";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, utf8_decode($url));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
    
        $result = curl_exec($curl); 
    
        curl_close($curl);
        return $result;
    }

    public static function updateTaskByEmployee($idTask, $status){
        $hosting = new Hosting();
        $url = $hosting->urlHost."/employee/task/update";
        $curl = curl_init();

       #Set up data send json
       $data = array(
        'idTask' => $idTask, 
        'status' => $status
        );

        $dataJson = json_encode($data);


        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curl, CURLOPT_POSTFIELDS,$dataJson);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 

        $result = curl_exec($curl); 

        curl_close($curl);
        return $result;
    }

    public static function ListTaskManager($idEmployee, $pageIndex, $pageSize, $status){
        $method = "GET";
        $hosting = new Hosting();
        $url = $hosting->urlHost."manage/listtask?idEmployee=$idEmployee&pageIndex=$pageIndex&pageSize=$pageSize&status=$status";
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