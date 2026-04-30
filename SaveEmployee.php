<?php
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
		if( !isset( $_POST['add_staff'] ) )
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
			$password = $_POST['password'];
			$regdate = date("Y-m-d H:i:s");	
			
			//Prepare SQL query
			$strInsert = "insert into employees(emp_id,gender,firstname,middlename,lastname,age,email,contact,department,staff_leave,role,password,regdate) values('$idnumber', '$gender', '$fname', '$mname', '$lname','$age','$email','$contact','$department','$sleave','$user_role','$password','$regdate')";

			// Check if file already exists
			if  (!mysqli_query($dbConnection, $strInsert))  
			{
				die('Could not execute sql query ' . mysqli_error($dbConnection));
			}
			else
			{				
				echo "<script>alert('Record Successfully Updated');</script>";
     			echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
			}
		}		
	}
	mysqli_close($dbConnection);	
?>
