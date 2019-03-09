<?php
session_start();
include ('database.php');
include "database_connection.php";

if (isset($_POST['submit'])&& isset($_POST['clientId']) && $_POST['clientId']!=="") {

	$sql= "select * from companyInvoiceName where id ='".$_POST['clientId']."'";
	$res = mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($res)>0){
	$rows = mysqli_fetch_all($res,MYSQLI_ASSOC);
}

?>

<div class="right col-lg-10 col-sm-10 col-xs-10">
<?php
		$aItems = [];
		$jsonItems = '';
		
	 
	foreach ($_POST['sku'] as $key => $value) {
		$aItems[$key]['sku'] = $value;
		$aItems[$key]['item'] = $_POST['item'][$key];
		$aItems[$key]['qty'] = $_POST['qty1'][$key];
		$aItems[$key]['price'] = $_POST['unit_price'][$key];
		$aItems[$key]['discount'] = $_POST['discount_rs'][$key];
		$aItems[$key]['subtotal'] = $_POST['linesubtotal'][$key];
		
		
	}
	$jsonItems = htmlentities(json_encode($aItems)) ;
	

?>
<div class="row">
	<ul class="breadcrumb">
		<li class=" disabled"><a href="index.php"> Dashboard</a></li>
		<li><a href="invoice.php" > invoice</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-lg-12">
		<h2>Invoices<small>	Manage Invoice</small></h2>
	</div>
</div>
<div class="row">
	<div class="col-lg-2">
		<button class="btn btn-lg btn-primary "><a href="invoiceForm.php" style="color:white;">AddNew+</a></button>
	</div>

</div>
<form name="products" action="thankyou.php" method="post">
<input type="hidden" name="jsonItem" value="<?php echo $jsonItems; ?>">
<input type="hidden" name="gross_total" value="<?php echo $_POST['gross_total'] ; ?>">
<input type="hidden" name="discountAmount" value="<?php echo $_POST['discountAmount'] ;?>">
<input type="hidden" name="totalAmount" value="<?php echo $_POST['totalAmount'];  ?>">
<input type="hidden" name="clientId" value="<?php echo $_POST['clientId']; ?>">

<div class="row">
<table class="table table-bordered table-striped table-hover info ">
<tr><td colspan="8"><h1 class="text-center text-primary "> Please Check Your Order</h1></td></tr>
<tr rowspan="5"> <td colspan="2"> Client Name:-</td>
<td colspan="2" class="text-uppercase"><?php echo $rows[0]['Name']?></td>
<td colspan="4"  >
<?php
foreach ($rows as $key => $value) {

 echo"Email Id: ". $value['Email']."<br>";
 echo"PhoneNo : ". $value['PhoneNo']."<br>";
 echo"Address : ". $value['Address']."<br>";
 echo"City : ". $value['City']."<br>";
 echo"Country: ". $value['Country']."<br>";
}
?>
</td>
</tr>	
<!-- if (is_array($values) || is_object($values))
{
    foreach ($values as $value)
    {
      
    }
}
 -->
 <tr>
 	<th>ITEMS</th>
 	<th>SKU</th>
 	<th>ITEM</th>
 	<th>QTY</th>
 	<th>UNIT_PRICE</th>
 	<th>DISCOUNT_RS</th>
 	<th colspan="2">LINE_SUBTOTAL</th>
 	
 </tr>

<?php
	 
		foreach ($aItems as $product => $value) {
echo "<tr>";
		// $sku = $aItems[$product]['sku'];
		// $item = $aItems[$product]['item'];
		// $qty= $aItems[$product]['qty'];
		// $unit_price= $aItems[$product]['price'];
		// $discount_rs= $aItems[$product]['discount'];		
		// $linesubtotal= $aItems[$product]['subtotal'];
		// $gross_total= $aItems[$product]['gross_total'];
		// $discountAmount=$aItems[$product]['discountAmount'];
		// $totalAmount=$aItems[$product]['totalAmount'];
echo "<td>".$product."</td>";
echo "<td>".$value['sku']."</td>";
echo "<td>".$value['item']."</td>";
echo "<td>".$value['qty']."</td>";
echo "<td>".$value['price']."</td>";
echo "<td>".$value['discount']."</td>";
echo "<td colspan="."2".">".$value['subtotal']."</td>";
echo "</tr>";
		}		
		echo "<tr > ";
 
 	
		echo "<th colspan="."7".">GrossTOTAL</th><td>".$_POST['gross_total']."</td></tr>";
		echo "<tr><th colspan="."7".">DiscountAmount</th><td>".$_POST['discountAmount']."</td></tr>";
		echo "<tr><th colspan="."7".">TOTAL_AMOUNT</th><td>".$_POST['totalAmount']."</td>";
		echo "</tr>";
	?>
	</table>
	
</div>



	<button type="submit" class="col-lg-2 col-lg-offset-4 btn btn-danger" >proceed</button>


</form>
</div>

<?php

}
else{
	$_SESSION["Client"] ="please choose the client first";
	header("location:invoiceForm.php");


}
?>
</div>