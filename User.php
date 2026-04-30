<?php
class User
{
        private $host = 'localhost';
        private $user = 'root';
        private $database = "leave_management";
        private $userTable = 'employees';
        private $dbConnect = false;
        private $port = "3308";
        public function _construct()
        {
            if(!$this->dbConnect)
            {
                $conn = new mysqli("localhost", "root", "", "leave_management");
                if($conn->connect_error)
                {
                    die("Error failed to connect to MySQL:" . $conn->connect_error);
                }
                else
				{
                    $this->dbConnect = $conn;
				}
            }
        }
    
        public function getUser() {
            $sqlQuery = "SELECT emp_id, gender, firstname, middlename, lastname, age, email, contact, department, staff_leave,FROM ".$this->userTable."WHERE id = 1";
            $result = mysqli_query($this->dbConnect, $sqlQuery);
            $data= mysqli_fetch_array($result, MYSQLI_ASSOC);
            return $data;
        }
}
?>