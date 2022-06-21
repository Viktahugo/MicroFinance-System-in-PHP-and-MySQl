<!Doctype html> 
<?php 
include_once("db_connect.php");
include("header.php"); 

if(!isset($_GET['id']))
{
	header("Location:index.php");
	exit;
}
if($_SESSION['Status']!='teller')
{
	header("Location:index.php");
	exit;
}
$Id=$_GET['id']; 
?>
<html>  
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alpha Microfinance</title>
        <link href='bootstrap.min.css' rel='stylesheet'>
         <link href='customerprofile.css' rel='stylesheet'> 
		<link rel="stylesheet" href="alpha.css">
		 
    </head> 
<?php include('container.php');?>
<body oncontextmenu='return false' class='snippet-body'>
<?php 

$sql = "SELECT * FROM customer WHERE Id='".$Id."'";
if($result = $con -> query($sql)) {
  while ($obj = $result -> fetch_object()) {
	  $balancequery = "SELECT * FROM accountbalance WHERE CustomerId='".$Id."'";
	  $balance = $con->query($balancequery);
	  $ob= $balance->fetch_object()
    
?>		  
 <div class="container">    
	<h2 class="alpha" style="color:Orange;padding:10px;" ><center>Alpha Microfinance Limited</center></h2>                
	<h4><center> Customer Details </center></h4><hr/>
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class=" mt-5" width="150px" alt="Photo goes Here" src="Images/<?php echo $obj->NID; ?>/<?php echo $obj->Photo;?>"><span class="font-weight-bold"><?php echo $obj->FirstName;?></span><span class="text-black-50"><?php echo $obj->LastName; ?></span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
             <form action="update.php" method="POST">           
                <div class="row mt-2"> 
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" name="FirstName" class="form-control" required placeholder="first name" value="<?php echo $obj->FirstName; ?>"></div>
                    <div class="col-md-6"><label class="labels">LastName</label><input type="text" name="LastName" class="form-control" required value="<?php echo $obj->LastName;?>" placeholder="surname"></div>
                </div><input type="hidden" name="Id" value="<?php echo $Id; ?>">
				 <div class="row mt-3"> 
                    <div class="col-md-12"><label class="labels">D.O.B</label><input type="Date" name="DOB" class="form-control" required placeholder="first name" value="<?php echo $obj->DOB; ?>"></div>
                    <div class="col-md-12"><label class="labels">National ID</label><input type="text" name="NID" class="form-control" pattern='[0-9]{*}' required value="<?php echo $obj->NID;?>" placeholder="surname"></div>
                </div> 
				
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="Mobile" class="form-control" pattern='[0]{1}[7]{1}[0-9]{8}'  required placeholder="enter phone number" value="<?php echo $obj->Mobile; ?>"></div>
                    <div class="col-md-12"><label class="labels">Address:</label><input type="text" class="form-control" name="Address" required placeholder="enter address line 1" value="<?php echo $obj->Address; ?>"></div>                    
                </div> 
               
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="Update" type="Submit">Update</button></div>
            </form>
			</div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
			
                <div class="d-flex justify-content-between align-items-center experience"><span></span><span class="border px-3 p-1 add-experience btn-danger"><i class="fa fa-plus"></i>&nbsp;ACCOUNT DETAILS</span></div><br>
                <div class="col-md-12"><label class="labels">Account Number:</label><input type="text" class="form-control" disabled value="<?php echo $obj->AccountNumber; ?>"></div> <br>
                <div class="col-md-12"><label class="labels">Account Balance (Rwf):</label><input type="text" class="form-control" disabled placeholder="additional details" value="<?php echo $ob->Amount;?>"></div> <br/>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $obj->Id; ?>"> TRANSACT </button>
			</div>   
        </div> 
    </div>
</div>  


<div class="modal" id="myModal<?php echo $obj->Id; ?>">  
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      
      <div class="modal-header">
       <center> <h4 class="modal-title">  DEBIT / CREDIT ACCOUNT  </h4> </center>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button> 
      </div>


      <div class="modal-body">
        <div class="row mt-3">
			<form action="transact.php" method="POST">  
                    <div class="col-md-12"><label class="labels">Amount</label><input type="text" name="Amount" class="form-control" required placeholder="Enter Amount" required pattern='[0-9]*' "></div>
                    <div class="col-md-12"><label class="labels">Transaction:</label> 
					<select class="form-control" name="Transaction" required>
						<option value="Debit"> Debit </option>
						<option value="Credit"> Credit </option>
					</select>
					<input type="hidden" name="CID" value="<?php echo $obj->Id;?>" >
					<div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="Submit" type="Submit">Effect Transaction</button></div>

			 
		 </div>
			</form>
			 
      </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>  

<?php 
  }
  $result -> free_result();
}		  

?>



</div>
</div>
                                <script type='text/javascript' src='bootstrap.bundle.min.js'></script>
                                
                                </body>
                            </html>