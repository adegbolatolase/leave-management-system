<?php
	session_start();
	require_once('DBController.php');
	$db = new DBController();
	$dbConnection = $db->connectDB();
		
	if( !isset( $_POST['username'] ) )
	{
		//echo 'Welcome to Post error ||| ';
		//echo $_POST['username'];

		header("Location: index.php");
		exit(); 
	}

	// Test Database Connection
	if (!$dbConnection)
	{
		die('Could not connect to Leave Management Database Connection Error');
	}
	else
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		//echo 'Welcome to checking login table ||' . $username . '||| '. $password;

		$viewQuery ="SELECT email,password,role FROM employees where email ='$username' AND password ='$password'";

		$result1 = mysqli_query( $dbConnection, $viewQuery ) or die(mysql_error());						
		$rows1 = mysqli_fetch_assoc( $result1 );
		if ($rows ==1 ) {
	
		
	}
		
		if($rows1['role'] == 'Admin')
		{		
			//echo 'Welcome to Admin';
			$_SESSION['alogin']=$row1['emp_id'];
		    $_SESSION['arole']=$row1['Department'];	
			header("Location: admin.php");	
		}
		else if($rows1['role'] == 'Staff')
		{
			//echo 'Welcome to Staff';
			$_SESSION['alogin']=$row1['emp_id'];
			$_SESSION['arole']=$row1['Department'];
			// $_SESSION['firstname'] = $row1['firstname'];
			// $_SESSION['lastname'] = $row1['lastname'];
			// $_SESSION['email'] = $row1['email'];
			// $_SESSION['staff_leave'] = $row1['staff_leave'];
			header("Location: employee.php");	
		}
		else
		{
			// echo 'Welcome to Role Error |||' . $rows1['role'];
			//echo 'Welcome to Role Error |||' . $rows1['role'] . '||| '. $rows1['username']  . '||| '. $rows1['password'] ;
			$_SESSION['alogin']=$row1['emp_id'];
		    $_SESSION['arole']=$row1['Department'];
			header("Location: index.php");
			//$msg = "Username and Password is incorrect, try again." . " Click here to try again. <a href='login.php'> Home </a>";
			//header ("Location: error.php?message=".$msg);
		}
	}
	$_SESSION['alogin']=$_POST['username'];
	mysqli_close($dbConnection);
?>

