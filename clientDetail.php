<?php
include "database_connection.php";
include "database.php";

$sql= "SELECT * FROM companyInvoiceName
order By id desc";

$res = mysqli_query($conn,$sql);
	if (mysqli_num_rows($res)>0) {
		$row= mysqli_fetch_all($res);
	
	}
?>

<div class="right col-lg-10 col-sm-10 col-xs-10">
<div class="row">
	<ul class="breadcrumb">
		<li><a href="index.php" > Dashboard</a></li>
		<li><a href="clientDetail.php"> Client</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-lg-12">
		<button type="submit" class="btn btn-sm btn-outline-primary" onclick="location.href='clientDetailForm.php'">Add New Customer</button>
	</div>
</div>
<table class="table table-bordered table-striped table-responsive">
<tr>
	<th>ClientId</th>
	<th>ClientName</th>
	<th>ClientEmail</th>
	<th>ClientPhone</th>
	<th>ClientAddress</th>
	<th>ClientCity</th>
	<th>ClientCountry</th>
</tr>
	<?php
/*		foreach ($row as $num => $value) {
			echo "<pre>";
			print_r($value[1]);
*/				?>	
			
<?php
		foreach ($row as $num => $value) {
			echo "<tr>";
			foreach ($value as $key => $output) {
		echo	"<td>". $output."</td>";		
			}echo "</tr>";
		 
}
		
	?>
	
</table>
</div>
</body>
</html>


