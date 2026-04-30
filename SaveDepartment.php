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
		if( !isset( $_POST['add_department'] ) )
		{
			//Get Form Data
			$dpsname = $_POST['dpsname'];
            $dpname = $_POST['dpname'];
            $create_date = date("Y-m-d H:i:s");			
			
			//Prepare SQL query
			$strInsert = "insert into department(id,department_shortname,department_name,create_date) values('$get_id','$dpsname','$dpname','$create_date')";

			if  (!mysqli_query($dbConnection, $strInsert))  
			{
				die('Could not execute sql query ' . mysqli_error($dbConnection));
			}
			else
			{				
				echo "<script>alert('Record Successfully Updated');</script>";
     			echo "<script type='text/javascript'> document.location = 'add_department.php'; </script>";
			}
		}		
	}
	mysqli_close($dbConnection);	
?>
