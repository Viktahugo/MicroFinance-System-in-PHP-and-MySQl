<?php 
include_once("db_connect.php");
include("header.php"); 

if (!isset($_SESSION['loggedin'])) { 
	header('Location: index.php'); 
	exit;
}
?>
<html>
<head>
<title>ALPHA MICROFINANCE LTD</title>   
<link rel="style.css" href="bootstrap.min.css">   
<link rel="style.css" href="dataTables.bootstrap5.min.css">  
<link rel="stylesheet" href="alpha.css">
 </head>    
<?php include('container.php');?> 
<div class="container home">	 
	<h2 style="color:Orange;padding:10px;"><center>Alpha Microfinance Limited </center>	</h2>	 
	<center><h4>Customers</h4> <hr/></center> 		 
	
	
	<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                
                <th>First Name</th>
                <th>Last Name</th>
                <th>D.O.B</th>
                <th>National ID</th>
                <th>Address</th>
                <th>Mobile</th>  
                <th>Account Number</th>
                <th>Account Statement</th> 
                <th>Action</th>
            </tr>
        </thead>
       <tbody>
			<?php 
			$sql_query = "SELECT * FROM customer ";
			$resultset = $con->query($sql_query) or die("database error:". mysqli_error($con));
			while( $developer = $resultset->fetch_object()) {
			?>
			   <tr id="<?php echo $developer->Id; ?>">
			  
     		   <td><?php echo $developer->Id; ?></td>  
			   <td><?php echo $developer->FirstName; ?></td>
			   <td><?php echo $developer->LastName; ?></td>
			   <td><?php echo $developer->DOB; ?></td>
			   <td><?php echo $developer->NID; ?></td>   
			   <td><?php echo $developer->Address; ?></td> 
			   <td><?php echo $developer->Mobile; ?></td>   
			   <td><?php echo $developer->AccountNumber; ?></td>   
			   <td><a href="statement.php?id=<?php echo $developer->Id;?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
				<path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
				<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
				</svg>
			   </a></td> 
			   <td><a href="customerprofile.php?id=<?php echo $developer->Id;?>"> 
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
				<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
				<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
				</svg> </a></td>
			   </tr>
			<?php } ?>
		</tbody>
         
          
    </table>
	
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



                                                                                                       