<?php /*

	if (isset($_POST['rememberMe'])) {
		$email = $_POST["email"];
		$password= $_POST["password"];

		if(!isset($_COOKIE['email']) && !isset($_COOKIE['password'])) 
		{
		
		setcookie('email' , $email , time() + (86400*30), "/");
	    
		setcookie('password' , $password , time() + (86400*30), "/");
		echo "enter in not cookie set part";
		}
		else{

		setcookie('email' , $email , time() + (86400*30), "/");
	    
		setcookie('password' , $password , time() + (86400*30), "/");

		/*
			setcookie('email', NULL, 0,"/");
			setcookie('password',NULL, 0,"/");
			echo "enter in deleting part";*/
		

?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
	 		<div class="container-fluid">
			<div class="navbar-header">
	      		<a class="navbar-brand" href="#">Admin Pannel</a>
	   		</div>	
				<ul class="nav navbar-nav pull-right">
			      <li ><a href="#"><span class="glyphicon glyphicon-envelope"></span>country</a></li>
			      <li class="active"><a href="#"><span class="glyphicon glyphicon-face"></span>user</a></li>
			      <li class="active"><a href="signout.php"><span class="glyphicon glyphicon-face"></span>signout</a></li>

			      </ul>
	  		</div>
		</nav>
		<div class="container-fluid" style="padding-left: 0%; margin-top: 50px;">
			<div class="left col-lg-2 col-sm-2 col-xs-2 leftIndex" style="padding: 0%;">
			<ul type="none" class="list-group text-capitalize indexing">
				<li class="list-group-item"> my desk</li>
				<li class="list-group-item"><a href="index.php">Dashboard</a></li>
				<li class="list-group-item">Manage Client</li>
				<li class="list-group-item"><a href="clientDetail.php">Clients</a></li>
				<li class="list-group-item">Items And Services</li>
				<li class="list-group-item"><a href="#data">items</a></li>
				<li class="list-group-item"><a href="#data">Services</a></li>
				<li class="list-group-item"><a href="#data">Providers</a></li>
				<li class="list-group-item"><a href="#data">Update Price</a></li>
				<li class="list-group-item">Invoice & Quotes</li>
				<li class="list-group-item"><a href="invoiceForm.php">Invoices</a></li>
				<li class="list-group-item"><a href="#data">Quotes</a></li>
				<li class="list-group-item"><a href="#data">Time Tracking</a></li>
				<li class="list-group-item"><a href="#data">Credit Notes</a></li>
				<li class="list-group-item">Manage Cost</li>
				<li class="list-group-item"><a href="#data">Purchase order</a></li>

			</ul>
			</div>
			
				
				
				
			