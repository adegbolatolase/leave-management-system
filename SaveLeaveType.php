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
		if( !isset( $_POST['add_leave'] ) )
		{
			//Get Form Data
			$levname = $_POST['levname'];
			$description = $_POST['description'];		
			$num_av = $_POST['num_av'];
			
			//Prepare SQL query
			$strInsert = "insert into leaves_type(id,leave_name,description,days_allowed) values('$get_id', '$levname', '$description', '$num_av')";

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
