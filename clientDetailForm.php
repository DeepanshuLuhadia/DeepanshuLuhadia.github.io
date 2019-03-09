<?php  
include('database_connection.php');
include "database.php";

$cityName=["jaipur","jodhpur","indore","chennai","haryana","Babol	","Babruysk","Bacabal","Bacău","Bacolod	","Badajoz	","Badalona","Badlapur","Bafoussam","Bagalkot","Baghdad","Baghlan","Bago","Bahawalnagar","Bahía Blanca","Baise"];
$CountryName=["Iran","Belarus","Brazil","Romania","Philippines","Spain","India","Cameroon","Iraq","Afghanistan","Myanmar"];

	$error=0;
	$ClientName=$ClientEmail=$ClientNum=$ClientAddress=$City=$Country ="";

	$ClientNameError=$ClientEmailError=$ClientNumError=$ClientAddressError=$CityError=$CountryError="";

function testInput($data)
	{
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripslashes($data);
		return $data;
	}
if (($_SERVER['REQUEST_METHOD']=="POST") && isset($_POST['Submit']))
 {


	

	if (empty($_POST['ClientName'])) {
		$ClientNameError="please fill the client name";
		$error = 1;
	}
	else{
		$ClientName= testInput($_POST['ClientName']);
	}
	if (empty($_POST['ClientEmail'])) {
		$ClientEmailError="please fill the client email";
		$error = 1;
	}
	else{
		$ClientEmail= testInput($_POST['ClientEmail']);
	}
	if (empty($_POST['ClientNum'])) {
		$ClientNumError="please fill the client number";
		$error = 1;
	}
	else{
		$ClientNum= testInput($_POST['ClientNum']);
	}
	if (empty($_POST['ClientAddress'])) {
		$ClientAddressError="please fill the client address";
		$error = 1;
	}
	else{
		$ClientAddress= testInput($_POST['ClientAddress']);

	}
	if (empty($_POST['City'])) {
		$CityError="please choose the client city";
		$error = 1;
	}
	else{
		$City= testInput($_POST['City']);
	}
	if (empty($_POST['Country'])) {
		$CountryError="please fill the client country";
		$error = 1;
	}
	else{
		$Country= testInput($_POST['Country']);
	}
	if(! $error)
	{
		$sql= "select * from companyInvoiceName where (email='".$_POST['ClientEmail']."')";
		$res = mysqli_query($conn,$sql);
		if (mysqli_num_rows($res) > 0) {
			$ClientEmailError = "Email alerady Exists";
		}
		else{
			$sql = "INSERT INTO companyInvoiceName(Name,Email,PhoneNo,Address,City,Country) VALUES('$ClientName','$ClientEmail','$ClientNum','$ClientAddress','$City','$Country')";
	
			if(mysqli_multi_query($conn,$sql)){
			 
				$ClientName=$ClientEmail=$ClientNum=$ClientAddress=$city=$Country="";
				header('location: clientDetail.php');
			}
		}
	}
}
?>



<style >
	span{
		color: red;
		font-size: 18px;
	}
</style>
<script>
function Validation() {
	
	var error=false;

	var ClientName=	document.getElementById('ClientName').value;
	
	var ClientEmail=	document.getElementById('ClientEmail').value;

	var ClientNum=		document.getElementById('ClientNum').value;

	var ClientAddress=	document.getElementById('ClientAddress').value;
	var ClientCity=		document.getElementById('ClientCity').value;

	var ClientCountry=	document.getElementById('ClientCountry').value;
	

		document.getElementById('NameErrors').innerHTML="";
		document.getElementById('EmailErrors').innerHTML="";
		document.getElementById('NumErrors').innerHTML="";
		document.getElementById('AddressErrors').innerHTML="";
		document.getElementById('CityErrors').innerHTML="";
		document.getElementById('CountryErrors').innerHTML="";

	if (ClientName=="") {

		
		 document.getElementById('NameErrors').innerHTML= "please fill the name";
		error=true; 
	}
	if (ClientEmail=="") {
		  document.getElementById('EmailErrors').innerHTML= "please fill the email";
		 error=true;
	}
	if (ClientNum=="") {
		  document.getElementById('NumErrors').innerHTML= "please fill the number";
		 error=true;
	}
	if (ClientAddress=="") {
		  document.getElementById('AddressErrors').innerHTML= "please fill the Address";
		 error=true;
	}
	if (ClientCity=="") {
		  document.getElementById('CityErrors').innerHTML= "please Select the city";
		 error=true;
	}
	if (ClientCountry=="") {
		  document.getElementById('CountryErrors').innerHTML= "please select the country";
		 error=true;
	}
	if(error){
		return false;
	}
	else{
		return true;
	}
}
</script>
<div class="right col-lg-10 col-sm-10 col-xs-10">
<div class="row">
	<ul class="breadcrumb">
		<li><a href="index.php" > Dashboard</a></li>
		<li><a href="clientDetail.php"> Client</a></li>
		<li><a href="clientDetailForm.php">Add Client</a></li>
	</ul>
</div>
<form name="clientDetailForm" action="" method="post" onsubmit="return Validation()">
	<div class="row">
		<div class="col-lg-3">Name</div>
		<div class="col-lg-9"><input type="text" name="ClientName" placeholder="Enter Name" id="ClientName" class="form-control" value="<?php echo $ClientName; ?>"><span id="NameErrors"><?php echo $ClientNameError; ?></span></div>
	</div>
	<div class="row">
		<div class="col-lg-3">Email</div>
		<div class="col-lg-9"><input type="email" name="ClientEmail" placeholder="Enter Email" id="ClientEmail" class="form-control" value="<?php echo $ClientEmail; ?>"><span id="EmailErrors"><?php echo $ClientEmailError; ?></span></div>
	</div>
	<div class="row">
		<div class="col-lg-3">PhoneNo</div>
		<div class="col-lg-9"><input type="text" name="ClientNum" placeholder="Enter Number" id="ClientNum" class="form-control" value="<?php echo $ClientNum;?>"><span id="NumErrors"><?php echo $ClientNumError; ?></span></div>
	</div>
	<div class="row">
		<div class="col-lg-3">Address</div>
		<div class="col-lg-9"><textarea name="ClientAddress" id="ClientAddress" placeholder="Enter Your Address" class="form-control" ><?php	echo $ClientAddress; ?></textarea><span id="AddressErrors"><?php echo $ClientAddressError; ?></span></div>
	</div>
	<div class="row">
		<div class="col-lg-3">City</div>
		<div class="col-lg-9">
		<select name="City" class="form-control" id="ClientCity">
			<option value="" >Select City</option>
			<?php foreach ($cityName as $city => $value)
			{
				echo "<option value='".$value."'".(isset($_POST['City'])&& !empty($_POST['City'])&& $_POST['City']==$value?"selected":'').">".$value."</option>";
			}
			 ?>
							
		</select><span id="CityErrors"><?php echo $CityError; ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">Country</div>
		<div class="col-lg-9">
			<select name="Country" class="form-control" id="ClientCountry">
				<option value="">Select Country</option>
				<?php
					foreach ($CountryName as $Country => $value) {
						echo "<option value='".$value."'".(isset($_POST['Country']) && !empty($_POST['Country'])&& $_POST['Country']==$value?"selected":'').">".$value."</option>";
					}
				?>
			</select><span id="CountryErrors"><?php echo $CountryError; ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<input type="submit" name="Submit" value="Submit">
			<input type="reset" name="reset" Value="reset">
		</div>
	</div>
	
</form>
</div>
</body>
</html>