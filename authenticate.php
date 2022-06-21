<?php
session_start();
require('db_connect.php');

if (!isset($_POST['Username'], $_POST['Password']) )
	{  
	exit('Please fill both the username and password fields!');
}
if ($stmt = $con->prepare('SELECT Id, Password,Status FROM accounts WHERE Username = ?')) {
	$stmt->bind_param('s', $_POST['Username']); 
	$stmt->execute(); 
	$stmt->store_result();
	
	if ($stmt->num_rows > 0) {
	$stmt->bind_result($Id, $Password,$Status);
	$stmt->fetch();
	if (password_verify($_POST['Password'], $Password)) 
	{
		 
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['Username'];
		$_SESSION['id'] = $Id;
		$_SESSION['Status'] = $Status;
		if($Status=='teller') 
		{
			
			header('Location:customerregistration.php');	
		}
		else
		{ 
			header('Location:Manager.php');
		}
		
	} 
	 else 
	    {
		echo "<script type='text/javascript'>alert('Incorrect Username/Password');
					location='index.php';  
		  </script>";
	    }
} else {
	
	echo "<script type='text/javascript'>alert('Incorrect Username/Password');
					location='index.php';  
		  </script>";
}
	$stmt->close();
}
?>