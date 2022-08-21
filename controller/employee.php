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
            return;
        }

        $result = Employee::GetInformation($idEmployee);
        $data = json_decode($result, true);
        $VIEW = "./view/employee_information.phtml";
        require("./template/main_template.phtml");

    }

    public function task(){
        $idEmployee = $_REQUEST['idEmployee'];
        $pageSize = 5;
        $pageIndex = ($_REQUEST['page'] - 1)*$pageSize;
        $status = $_REQUEST['status'];

        $result = TaskEmployee::ListTaskEmployees($idEmployee, $pageIndex, $pageSize, $status);
        $data = json_decode($result, true);
        $VIEW = "./view/employee_tasks.phtml";
        require("./template/main_template.phtml");
    }

    public function taskDetail(){
        $idEmployee = $_REQUEST['idEmployee'];
        $pageSize = 5;
        $pageIndex = ($_REQUEST['page'] - 1)*$pageSize;
        $status = $_REQUEST['status']; 
        $idTask = $_REQUEST['idTask'];

        if(isset($_REQUEST['func'])){
            $result = TaskEmployee::updateTaskByEmployee($idTask, $status);
            $result = TaskEmployee::TaskDetailById($idEmployee, $pageIndex, $pageSize, $status, $idTask);
            $data = json_decode($result, true);
            header("Location: index.php?action=taskdetail&idEmployee={$idEmployee}&page={$_REQUEST['page']}&status={$status}&idTask={$idTask}");
            return;
        }

        $result = TaskEmployee::TaskDetailById($idEmployee, $pageIndex, $pageSize, $status, $idTask);
        $data = json_decode($result, true);
        $VIEW = "./view/employee_taskdetail.phtml";
        require("./template/main_template.phtml");
    }

    public function managerTask(){
        $idEmployee = $_REQUEST['idEmployee'];
        $pageSize = 10;
        $pageIndex = ($_REQUEST['page'] - 1)*$pageSize;
        $status = $_REQUEST['status']; 

        $result = TaskEmployee::ListTaskManager($idEmployee, $pageIndex, $pageSize, $status);
        $data = json_decode($result, true);
        $VIEW = "./view/manager_task.phtml";
        require("./template/main_template.phtml");
    }
    
    public function listEmployee(){
        $idManager = $_REQUEST['idManager'];
        $pageSize = 10;
        $pageIndex = ($_REQUEST['page'] - 1)*$pageSize;

        $result = Employee::ListEmployeeByManagerId($idManager, $pageIndex, $pageSize);
        $data = json_decode($result, true);
        $VIEW = "./view/employee_list.phtml";
        require("./template/main_template.phtml");
    }
}
?>