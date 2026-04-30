<?php
session_start();
require_once('DBController.php');
$db = new DBController();
$dbConnection = $db->connectDB();

if( !isset( $_POST['apply_leave'] ) )
	// Test Database Connection
	if (!$dbConnection)
	{
		die('Could not connect to Leave Management Database Connection Error');
	}
	else
		{
			if( !isset( $_POST['apply'] ) )
			{
				//Get Form Data
				$empid=$session_id;
				$av_days=$_POST["av_days"];
				$num_taken=$_POST["num_taken"];
				$num_out=$_POST["num_out"];
				$num_request=$_POST["num_request"];
				$leave_type=$_POST["leave_type"];
				$leave_starts=date('Y-m-d', strtotime($_POST["leave_starts"]));
				$leave_ends=date('Y-m-d', strtotime($_POST["leave_ends"]));
				$resume_date=$_POST["resume_date"];
				$description=$_POST["description"];  
				$status=0;
				$isread=0;
				$datePosting = date("Y-m-d");			
				
				if($leave_starts > $leave_ends)
				{
					echo "<script>alert('End Date should be greater than Start Date');</script>";
				}
				elseif($av_days <= 0)
				{
					echo "<script>alert('YOU HAVE EXCEEDED YOUR LEAVE LIMIT. LEAVE APPLICATION FAILED');</script>";
				}
				//Prepare SQL query
				$strInsert = "insert into leaves(av_days,num_taken,num_out,num_request,leave_type,leave_starts,leave_ends,resume_date,description,status,isread,posting_date) values('$av_days','$num_taken','$num_out','$num_request,'$leave_type,'$leave_starts,'$leave_ends,'$resume_date,'$description,'$datePosting)";

				if  (!mysqli_query($dbConnection, $strInsert))  
				{
					die('Could not execute sql query ' . mysqli_error($dbConnection));
				}
				else
				{				
					echo "<script>alert('Leave Successfully');</script>";
					echo "<script type='text/javascript'> document.location = 'apply_leave.php'; </script>";
				}
			}
		}
mysqli_close($dbConnection);	
?>