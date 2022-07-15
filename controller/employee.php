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
            $result = Employee::GetInformation($idEmployee);
            $data = json_decode($result, true);
            $result = Department::listDepartment();
            $department = json_decode($result, true);
            header("Location: index.php?action=information&idEmployee=$idEmployee");
        }

        $result = Employee::GetInformation($idEmployee);
        $data = json_decode($result, true);
        $result = Department::listDepartment();
        $department = json_decode($result, true);
        $VIEW = "./view/employee_information.phtml";
        require("./template/main_template.phtml");

    }

    public function task(){
        $idEmployee = $_REQUEST['idEmployee'];
        $pageSize = 5;
        $pageIndex = ($_REQUEST['page'] - 1)*$pageSize;
        $status = $_REQUEST['status'];

        $result = Employee::GetInformation($idEmployee);
        $data = json_decode($result, true);
        $result = TaskEmployee::ListTaskEmployees($idEmployee, $pageIndex, $pageSize, $status);
        $listTasks = json_decode($result, true);
        $VIEW = "./view/employee_tasks.phtml";
        require("./template/main_template.phtml");
    }
}
?>