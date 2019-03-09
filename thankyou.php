<?php
session_start();
include 'database_connection.php';
require 'fpdf.php';



$sql= "INSERT into order_list(ClientID,Item,GrossTotal,Discount,Total) VALUES('".$_POST['clientId']."','".$_POST['jsonItem']."','".$_POST['gross_total']."','".$_POST['discountAmount']."','".$_POST['totalAmount']."') ";
;
if(mysqli_query($conn,$sql)){ 
    $last_id = $conn->insert_id;

    
}
else{
	die("Connection error: " . mysqli_connect_error());

}
$sql = "SELECT * FROM order_list INNER JOIN companyInvoiceName  ON order_list.ClientID=companyInvoiceName.id where order_list.OrderID= $last_id";

$res = mysqli_query($conn,$sql);

if (mysqli_num_rows($res)>0) {
	$row = mysqli_fetch_assoc($res);
	$jsonItems= json_decode($row['Item'],true);
$row['Address']= "43 shilp colony khatipura road jhotwara jaipur rajasthan 302012 india ";
# pdf making
	$pdf = new FPDF();
	$pdf -> AddPage();

// draw opaque red square
$pdf->SetFillColor(255, 0, 0);
$pdf->SetDrawColor(127, 0, 0);
$pdf->Rect(30, 40, 60, 60, 'DF');

// set alpha to semi-transparency
/*$pdf->SetAlpha(0.5);*/

// draw green square



$pdf->Image('jeremy-thomas-79493-unsplash.jpg',00,00,500,0,'JPG');
// personal details


	$pdf -> setfont('Times','B', 30);
	$pdf -> cell(189,40,'purchase History',0,1,'C');

// pdf start


	$pdf -> setfont('Arial','B', 16);
	$pdf -> cell(59,10,'Client Name:-',1,0);
	$pdf -> cell(130,10,$row['Name'],1,1);
	$pdf -> cell(59,10,'Email',1,0);
	$pdf -> cell(130,10,$row['Email'],1,1);
	$pdf -> cell(59,10,'Postal Address:-',0,0);
	$pdf -> MultiCell(130,10,$row['Address'],1,1);
	$pdf -> cell(59,10,'Phone No:-',1,0);
	$pdf -> cell(130,10,$row['PhoneNo'],1,1);
	$pdf -> cell(59,10,'City:-',1,0);
	$pdf -> cell(130,10,$row['City'],1,1);
	$pdf -> cell(59,10,'Country:-',1,0);
	$pdf -> cell(130,10,$row['Country'],1,1);

// free space

$pdf -> setfont('Times','B', 40);
	$pdf -> cell(189,40,'Your Order Details',0,1,'C');


// product details

$pdf -> setfont('Times','B', 16);
	$pdf -> cell(22,10,'Item No',0,0);
	$pdf -> cell(22,10,'SKU',0,0);
	$pdf -> cell(22,10,'Product',0,0);
	$pdf -> cell(22,10,'Quantity',0,0);
	$pdf -> cell(32,10,'Unit Price',0,0);
	$pdf -> cell(32,10,'Discount Rs',0,0);
	$pdf -> cell(32,10,'Line Subtotal',0,1);
foreach ($jsonItems as $num => $value) {
	$pdf -> cell(22,10,$num,1,0);
	$pdf -> cell(22,10,$value['sku'],1,0);
	$pdf -> cell(22,10,$value['item'],1,0);
	$pdf -> cell(22,10,$value['qty'],1,0);
	$pdf -> cell(32,10,$value['price'],1,0);
	$pdf -> cell(32,10,$value['discount'],1,0);
	$pdf -> cell(32,10,$value['subtotal'],1,1);
		




}
	$pdf -> output();

}
?>
