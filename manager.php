<html>
<head>    
<title>ALPHA MICROFINANCE LTD</title>   
<link rel="style.css" href="bootstrap.min.css">   
<link rel="style.css" href="dataTables.bootstrap5.min.css">  
<link rel="style.css" href="alpha.css">   
</head>
<?php 
include_once("db_connect.php");
include("header.php"); 

if (!isset($_SESSION['loggedin'])) { 
	header('Location: index.php');  
	exit;
}

include('container2.php'); 
$totalcredits=0;
$totaldebits=0;     
$overall = "SELECT Transaction, sum(Amount) from transactions  GROUP BY Transaction";  
$result = mysqli_query($con,$overall);
while($row = mysqli_fetch_array($result))
{	
if($row['Transaction']=='Debit')
		{
			  $totaldebits = $row['sum(Amount)'];				  
		}
if($row['Transaction'] =='Credit')
		{
			   $totalcredits = $row['sum(Amount)'];
		}  
}
?>
<div class="container">	 
			<center><h2 style="padding:20px;color:orange;">Alpha Microfinance Limited</h2></center>	   	    
			<center><h4>CREDITS & DEBITS </h4> <hr/></center>
 <div class="row">	 
	<div class="col-md-9" style="border-right:10px;">     
	   <center> <h6>INDIVIDUAL BASIS</h6></center>   
	<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Account Number</th>
                <th>Total Debit (Rwf)</th>
				<th> Total Credit (Rwf) </th>
            </tr>
        </thead>
       <tbody>
			<?php 
			$amt=0;
			$sql_query = "SELECT * FROM customer ";
			$resultset = $con->query($sql_query) or die("database error:". mysqli_error($con));
			while( $developer = $resultset->fetch_object()) {
					$customerId = $developer->Id;  
					
					$sql = "SELECT Transaction, sum(Amount) from transactions WHERE CustomerId='".$customerId."' GROUP BY Transaction";  
					$result = mysqli_query($con,$sql);      
					while($rows = mysqli_fetch_array($result))
					{
					
					if($rows['Transaction']=='Debit')
					{
						  $TD = $rows['sum(Amount)'];
						  
					}
					if($rows['Transaction'] =='Credit')
					{
						$TC = $rows['sum(Amount)'];
					}    
					
					}
			     
			?>
			   <tr id="<?php echo $developer->Id; ?>">
			  
     		   <td><?php echo $developer->Id; ?></td>
			   <td><?php echo $developer->FirstName; ?></td>  
			   <td><?php echo $developer->LastName; ?></td>  
			   <td><?php echo $developer->AccountNumber; ?></td>   
			   <td><?php echo $TD; ?></td>     
			   <td><?php echo $TC; ?></td>      
			   </tr>
			<?php } ?>
		</tbody>
         
          
    </table>
	
</div>
<div class="col-md-3">
	<div class="clients" style="border-left:2px;solid black;">
			<center><h6> ALL CLIENTS </h6></center>
			
	<label> TOTAL CREDIT AMOUNT :</label> <input type="text" class="form-control" disabled value="<?php  echo $totalcredits; ?> Rwf">
	<label> TOTAL DEBIT AMOUNT :</label> <input type="text" class="form-control" disabled value="<?php  echo $totaldebits; ?> Rwf"> 
	</div> 
</div>

</div>
<script type="text/javascript" src="jquery-3.5.1.js"></script>   
<script type="text/javascript" src="jquery.dataTables.min.js"></script>  
<script type="text/javascript" src="dataTables.bootstrap5.min.js"></script>  
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<?php include('footer.php');?> 

</html>