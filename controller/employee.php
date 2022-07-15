<?php
class EmployeeController {
    public function requestWFH(){
        $VIEW = "./view/employee_WFH.phtml";
        require("./template/main_template.phtml");
    }

    public function information(){
        $idEmployee = $_REQUEST['idEmployee'];

        if(isset($_REQUEST['func'])){
            $firstname = $_REQUEST['firstname'];
            $lastname = $_REQUEST['lastname'];
            $idDepartment = $_REQUEST['idDepartment'];
            $position = $_REQUEST['position'];
            $dayOfBirth = $_REQUEST['dayOfBirth'];
            $gender = $_REQUEST['gender'];
            $email = $_REQUEST['email'];
            $phoneNumber = $_REQUEST['phoneNumber'];
            $address = $_REQUEST['address'];
            $maritalStatus = $_REQUEST['maritalStatus'];
            
            $temp = Employee::UpdateInformation($idEmployee, $firstname, $lastname, $idDepartment, $position, $dayOfBirth, $gender, $email, $phoneNumber, $address, $maritalStatus);
        }

        $result = Employee::GetInformation($idEmployee);
        $data = json_decode($result, true);
        $result = Department::listDepartment();
        $department = json_decode($result, true);
        $VIEW = "./view/employee_information.phtml";
        require("./template/main_template.phtml");

    }
}
?>