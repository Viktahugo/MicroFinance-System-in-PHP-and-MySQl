<html>
<head>
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script> 
<script src="jquery-3.5.1.js"></script> 
<style> 
body{margin-top:20px;
background-color: #f7f7ff;
}
#invoice {
    padding: 0px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #0d6efd
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #0d6efd
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,
.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #0d6efd;
    font-size: 1.2em
}

.invoice table .qty,
.invoice table .total,
.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #0d6efd
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #0d6efd;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid rgba(0, 0, 0, 0);
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}

.invoice table tfoot tr:last-child td {
    color: #0d6efd;
    font-size: 1.4em;
    border-top: 1px solid #0d6efd
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px !important;
        overflow: hidden !important
    }
    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }
    .invoice>div:last-child {
        page-break-before: always
    }
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
} 
<?php   
session_start();
include_once("db_connect.php");
if(!isset($_GET['id']))
{
	header("Location:index.php");
	exit;
}
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php'); 
	exit;
}
$Id=$_GET['id']; 

?>

<?php 
$sql = "SELECT * FROM customer WHERE Id='".$Id."'";
$result = $con -> query($sql);
$obj = $result -> fetch_object();  

$balance = "SELECT * FROM accountbalance WHERE CustomerId='".$Id."'";
$balance1 = $con->query($balance);
$ob = $balance1->fetch_object();	   
?>		  
</style>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:;">
    												<img src="alpha.png" width="80" alt="">
												</a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="javascript:;">
									Alpha Microfinance Limited
									</a>
                                    </h2>
                                    <div>Kigali Rwanda</div>
                                    <div>+250789066369</div>
                                    <div>P.O.BOX #</div>
                                    <div>info@alphamicrofinance.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
						
                         <div class="row contacts">
                                <div class="col invoice-to">   
                                    <div class="text-gray-light">Account Number: # <?php echo $obj->AccountNumber; ?></div>
                                    <h2 class="to"><?php echo $obj->FirstName;?> <?php echo $obj->LastName; ?></h2>
                                    <div class="address">Address: <?php echo $obj->Address;?></div>
                                    <div class="email">Mobile: <?php echo $obj->Mobile; ?></a></div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">ACCOUNT STATEMENT </h1>
                                    <div class="date">Date <?php $Today=Date('y-m-d'); echo $Today; ?></div>
                     
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left">Transaction</th>
                                        <th class="text-right">Date</th>
                                        <th class="text-right">Amount</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
								<?php 

$sql = "SELECT * FROM customer WHERE Id='".$Id."'";
if($result = $con -> query($sql)) {
  while ($obj = $result -> fetch_object()) {
	  $trans = "SELECT * FROM transactions WHERE CustomerId='".$Id."' ORDER BY Id DESC ";
	  $result1 = $con->query($trans); 
	  while ($transdetails = $result1 -> fetch_object())
	  {
	  
    
?>		  
                                    <tr>
                                        <td class="no"></td>
                                        <td class="text-left">
                                            <h3>
                                                <a target="_blank" href="javascript:;">
										<?php echo $transdetails->Transaction; ?>
										</a>
                                            </h3>     
 The Account <?php echo $obj->AccountNumber; ?> was <?php echo $transdetails->Transaction; ?>ed with Amount <?php echo $transdetails->Amount; ?> Rwf </td>      
                                        <td class="unit"><?php echo $transdetails->Date; ?></td> 
                                       
                                        <td class="total"><?php echo $transdetails->Amount; ?>Rwf </td>
                                    </tr>
                               <?php 
  }
  }
  $result -> free_result();
}		  

?>    
                                    
                                    
                                </tbody>
                                <tfoot>
                                    
                                    
                                    <tr>
                                        <td colspan="1"></td>
                                        <td colspan="2">CURRENT BALANCE:</td>
                                        <td><?php echo $ob->Amount;?>Rwf</td>
                                    </tr>
								
                                </tfoot>
                            </table>
                             
                        </main>
                        <footer>&copy; Alpha Microfinance Limited</footer>
                    </div>
                  
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>

