<?php
session_start();

	if (isset($_SESSION["email"])) {

		header('location:index.php');
	}
	else{


$email="deepanshujain388@gmail.com";
$password ="123456789";
$error="";
if (($_SERVER['REQUEST_METHOD']=="POST") && isset($_POST['submit'])) {
	if ($_POST['email']==$email && $_POST['password']==$password) {
		
		$_SESSION["email"]=$email;
		$_SESSION["password"]=$password;
		header("location:index.php");
	}
	else{
		$error = "invalid user  or password";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	 <title></title>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="style.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	 <script>
	 function validation() {

		
	 	var userEmail= document.getElementById('email').value;
	 	var userPassword = document.getElementById('password').value;
	 	var email="deepanshujain388@gmail.com";
		var password= "123456789";

		if (userEmail==email && userPassword==password) {
			alert('valid');
			return true;
		}
		else{
			document.getElementById('error').innerHTML="invalid user name or password";
			return false;
		}
	 }
	 </script>
</head>
<body style="background-image: linear-gradient(black ,#4d4d79) ">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center text-lg adminPanel text-danger"><h1>Admin Pannel</h1></div>
		</div>
		<div class="row ">
			<div class="col-lg-3"></div>
			<div class="col-lg-6 login_panel_form">
				<form name="login_page" class="bg-default container" action="" method="post" onsubmit="return validation()" >
					<div class="form-group">
					<h2 class="text-danger" id="error" > <?php echo $error; ?></h2>
						<h2 class="text-center"> Login</h2>
					</div>
					<div class="form-group">

						<label class="sr-only" for="email">Email Address:-</label>
						<input type="email" name="email" class="form-control text-lg" id="email" value="">
					</div>
					<div class="form-group">
						<label class="sr-only" for="password">Password:-</label>
						<input type="password" name="password" class="form-control" id="password" value="">
					</div>
					<div class="form-group">
						<input type="checkbox" name="rememberMe"  id="rememberMe">
						<label  for="email">remember me:-</label>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-outline-primary col-lg-2 login" value="submit" name="submit">
						<p class=" col-lg-10 form-control-static text-right"> <a href="forgetpassword.php">forgot your password:</a></p>
					</div>

				</form>
			</div>
			<div class="col-lg-3"></div>
		</div>
	</div>
</body>
</html>
<?php
}
?>