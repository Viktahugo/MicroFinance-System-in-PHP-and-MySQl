<?php 
include_once("db_connect.php");
include("header.php"); 

if($_SESSION['Status']!='teller')
{
	header("Location:index.php");
	exit;
}

if(isset($_POST['Update']))
{
			$FirstName = mysqli_real_escape_string($con,$_POST['FirstName']);
			$LastName = mysqli_real_escape_string($con,$_POST['LastName']);
			$DOB = mysqli_real_escape_string($con,$_POST['DOB']);   
			$NID = mysqli_real_escape_string($con,$_POST['NID']); 
			$Mobile = mysqli_real_escape_string($con,$_POST['Mobile']);   
			$Address = mysqli_real_escape_string($con,$_POST['Address']);  
			
			$Id = $_POST['Id'];
		
			$update = "UPDATE customer SET FirstName='".$FirstName."', LastName='".$LastName."',DOB='".$DOB."',NID='".$NID."',Mobile='".$Mobile."',Address='".$Address."' WHERE Id='".$Id."'";
			$updatequery = $con->query("$update");
			 
			if($updatequery)
			{
				echo "<script>
						alert('User Information Update Succesfully!');
							location='customer.php'; 
					</script>"; 
				  
			}
			else
				echo "error";

}
?>