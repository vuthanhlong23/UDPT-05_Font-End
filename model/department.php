<?php
    class Department{
        public static function listDepartment(){
            $method = "GET";
            $url = "http://127.0.0.1:5001/department/list";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
        
            $result = curl_exec($curl); 
        
            curl_close($curl);
            return $result;
        }
    }

?>