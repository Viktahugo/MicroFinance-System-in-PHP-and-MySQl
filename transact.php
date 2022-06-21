<?php
  
require('db_connect.php');   
  $msg = ""; 
  if (isset($_POST['Submit'])) {
	$Amount = mysqli_real_escape_string($con,$_POST['Amount']); 
	$Transaction = mysqli_real_escape_string($con,$_POST['Transaction']);
	$CustomerId = $_POST['CID'];
	
	$sql = "SELECT * FROM accountbalance WHERE CustomerId='".$CustomerId."'" or die("Error");
	$result = $con->query($sql) or die ("Eror with query");
	$data = $result->fetch_object(); 
	$bal = $data->Amount; 
	
	$current = ($bal-$Amount);                
	 
	 
	if($Amount < 0) 
	{  
		echo "<script>alert('You can not Withdraw Amount Less than 0 rwf')</script>";
	}
	else
	{	
	           
		if($Transaction == 'Debit') 
		{
			$current =($bal-$Amount);
			if($current>1)
			{
					$Amt = $bal-$Amount;   
					$update = "UPDATE accountbalance SET Amount='".$Amt."' WHERE CustomerId='".$CustomerId."'";
					$updatequery = $con->query($update);     
					$insert = "INSERT INTO transactions(CustomerId,Transaction,Amount,Date) VALUES('$CustomerId','$Transaction','$Amount',NOW())";
					$insertquery = $con->query($insert);
					if($insertquery)
					{
						
						echo "<script type='text/javascript'>alert('Account has Been Debited $Amount Rwf, New Balance is $Amt');
							location='customerprofile.php?id=$CustomerId';    
				  </script>";
					}
					else
					{
						echo "<script>alert('Error with Sql Query!')</script>"; 
					}
			} 
			else
				echo "<script>alert('You Cannot Withdraw an Amount greater than current Deposit!'); 
								location='customerprofile.php?id=$CustomerId;'  
					  </script>";
		    
		}
		
		if ($Transaction == 'Credit')
		{
			$Amt = $bal + $Amount ; 
			$update = "UPDATE accountbalance SET Amount ='".$Amt."'  WHERE CustomerId='".$CustomerId."'";
			$updatequery = $con->query($update);
			if($updatequery)
			{
				$insert = "INSERT INTO transactions(CustomerId,Transaction,Amount,Date) VALUES('$CustomerId','$Transaction','$Amount',NOW())";
				$insertquery = $con->query($insert); 
				
				echo "<script type='text/javascript'>alert('Account has Been Credited $Amount Rwf, New Balance is $Amt');
					location='customerprofile.php?id=$CustomerId';    
					 </script>";
			}
			else
			{
				echo "<script>alert('Error With Credit Query')</script>";
			}
		}
	}
	
	
	}
	
  
	