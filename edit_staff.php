<?php
    session_start(); 

	//Add Database Connection
	require_once('DBController.php');
	$db = new DBController();
	$dbConnection = $db->connectDB();


	// Test Database Connection
if (!$dbConnection)
{
	die('Could not connect to Leave Manangement database');
}
	else
	{
		if( !isset( $_POST['edit_staff'] ) )
		{
			//Get Form Data
			$idnumber = $_POST['idnumber'];
			$gender = $_POST['gender'];		
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$age = $_POST['age'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
			$department = $_POST['department'];
			$sleave = $_POST['sleave'];
			$user_role = $_POST['user_role'];	
			$username = $_POST['username'];
			$password = $_POST['password'];
			$regdate = date("Y-m-d H:i:s");		
			
			//Prepare SQL query
			$strInsert =  mysqli_query($dbConnection,"update employees set firstname='$fname', lastname='$lname', email='$email', gender='$gender', department='$department', Av_leave='$leave_days', role='$user_role', contact='$contact' where emp_id='$get_id'         
            "); 		
             if ($result)
             {
                echo "<script>alert('Record Successfully Updated');</script>";
                echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
             } 
             else
             {
                die(mysqli_error());
             }
		}		
	}
	mysqli_close($dbConnection);	
?>
