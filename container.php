	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">Alpha MicroFinance Limited</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
               
                <a href="customerregistration.php" class="nav-item nav-link active">Customer Registration</a>
                <a href="customer.php" class="nav-item nav-link active">Customer Data</a>
            </div> 
            <div class="navbar-nav ms-auto">
                <a href="#" class="nav-item nav-link active">Logged in as: <?php echo $_SESSION['Status'];?></a> 
                <a href="logout.php" class="nav-item nav-link active">Logout</a> 
            </div>
        </div>
    </div>
</nav>   


	
	
	 