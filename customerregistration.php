<?php 
include_once("db_connect.php"); 
include("header.php"); 
?> 
<?php
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php'); 
	exit;
}
?>
<html>
    <head>
        <title> ALPHA MICROFINANCE LIMITED </title>
		<link rel="stylesheet" href="alpha.css">
    </head>
    <script type="text/javascript" src="dist/jquery.tabledit.js"></script>
   <?php include('container.php');?>   
    <body style="background:cool-background.png">  
        <div class="container home">
        <center>   
           <h2 style="color:Orange;padding:10px;"> ALPHA MICROFINANCE LIMITED</h2>
		   <h4> Customer Registration 
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
				<path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
				<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
				</svg></h4>
		   		<hr/>
        </center>  
		<div class="row">
			<div class="col-md-3">
			
			</div>
			
        <div class="col-md-6">     
            <form action="register.php" Method="POST" enctype="multipart/form-data" >       
                     <label>First Name: </label>     
                     <input type="text" name="FirstName" class="form-control" placeholder="Enter Customer First Name" pattern='[A-Za-z]{2,}' required>
                     <label>Last Name: </label>
                     <input type="text" name="LastName" class="form-control" placeholder="Enter Customer Second Name" pattern='[A-Za-z]{2,}'required>
                     <label>Date of Birth: </label>
                     <input type="Date" name="DOB" class="form-control" placehoder="Enter Customer Date of Birth" required>   
                     <label>National Id: </label>
                     <input type="text" name="NID" class="form-control" pattern='[0-9]{16}' placeholder="Enter National Id Number" required>  
                     <label>
						Photo:
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
						<path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
						<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						</svg>
						Max-size:2MB
					</label>
                     <input type="file" name="Photo" class="form-control" required>
                     <label>Address: </label>
                     <input type="text" name="Address" class="form-control" placeholder="Enter Customer Address Location" required>
                     <label>Mobile Number: </label>
                     <input type="text" name="Mobile" class="form-control" pattern='[0]{1}[7]{1}[0-9]{8}' placeholder="Enter Customer Mobile Number" required>

                     <input type="Submit" name="Submit" value="Register" class="btn btn-success"> 
             </form>    
        </div>

        <div class="col-md-3">      

        </div>
       
        </div>    
        </div>    
    </body>
</html>