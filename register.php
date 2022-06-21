<?php
 
require('db_connect.php');   
  $msg = "";

 
  if (isset($_POST['Submit'])) {
  	// Get image name
  	$Photo = preg_replace("/([^A-Za-z0-9_\-\.]|[\.]{2})/","",$_FILES['Photo']['name']);  
  	$size = $_FILES['Photo']['size'];   
	$FirstName = mysqli_real_escape_string($con,$_POST['FirstName']);
	$LastName = mysqli_real_escape_string($con,$_POST['LastName']);
	$DOB = mysqli_real_escape_string($con,$_POST['DOB']);
	$NID = mysqli_real_escape_string($con,$_POST['NID']);
	$Address = mysqli_real_escape_string($con,$_POST['Address']);
	$Mobile = mysqli_real_escape_string($con,$_POST['Mobile']);
	
	$Today = strtotime(Date('y-m-d'));
	$DOB1 = strtotime($DOB);
	
	$difference = $Today - $DOB1; 
	
	$digits = '';
	function randomDigits($length)
	{
		$numbers = range(0,9);
		shuffle($numbers);
		for($i = 0; $i < $length; $i++)
		{ 
			global $digits;
			$digits .= $numbers[$i];
		}
     return $digits;
	}
	randomDigits(12);
	$AccountNumber =$digits;  
	
  	// image file directory 
  	$target = "Images/".$NID. "/" .basename($Photo);
    


if($size>2097152)
{
	echo "<script>alert('Upload a Photo that is Less than 2Mbs.')</script>";
}
else
{  
$extension = pathinfo($_FILES["Photo"]["name"], PATHINFO_EXTENSION);
if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif')  
{
	$check = "SELECT * FROM customer WHERE NID='".$NID."'";    
	$checkquery = $con->query($check);  
	$numcheck = $checkquery->num_rows;
	if ($numcheck > 0)
	{
		
		echo "<script type='text/javascript'>alert('National ID Number is Already Registered!');
					location='customerregistration.php';   
		  </script>";
	}
	else if ($difference > 0)
	{      
		
		if (file_exists($target))     
        {
            echo $Photo . " already exists. ";      
        }
        else
        {
			$sql = "INSERT INTO customer (FirstName, LastName,DOB,NID,Photo,Address,Mobile,AccountNumber) VALUES ('$FirstName', '$LastName', '$DOB','$NID','$Photo','$Address','$Mobile','$AccountNumber')";
			if ($con->query($sql) === TRUE)
				{
					$last_id = $con->insert_id; 
					$sql2 = "INSERT INTO accountbalance(Id,CustomerId,Amount,Transaction,Date) VALUES('','$last_id',5000,'Credit',NOW())";
					$result = $con->query($sql2);    
					$sql3 = "INSERT INTO transactions(Id,CustomerId,Transaction,Amount,Date) VALUES('','$last_id','Credit',5000,NOW())";   
					$result2 = $con->query($sql3);       
					if($result2)
						{

							if(!is_dir("Images/". $NID."/")) 
							{
								mkdir("Images/". $NID."/");  
							}
							if (move_uploaded_file($_FILES['Photo']['tmp_name'], $target))
							{
								$msg = "Image uploaded successfully";
							}
							else
								{
									$msg = "Failed to upload image";
								}
							echo "<script type='text/javascript'>alert('Customer Registered Succesfully!');
									location='customer.php';   
								 </script>";
						}
						else
							{
								echo "error with query";
							}
		
				} 
			else 
				{
					echo "Error: " . $sql . "<br>" . $con->error;
				}
        }
		

	}
	else 
		echo "<script type='text/javascript'>alert('Date of Birth has not Reached Yet!, Choose a Valid Date of Birth!');
					location='customerregistration.php';     
		  </script>";
}
else 
	echo "<script>alert('Please Upload A jpg,png or gif Photo')</script>";
  }	
$con->close();	

  }
 
?>