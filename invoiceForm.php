<?php 
session_start();
include('database.php');
include "database_connection.php";

$sql= "SELECT * from companyInvoiceName order by id desc";
$res = mysqli_query($conn,$sql);


if (mysqli_num_rows($res)>0) {
	//$row = mysqli_fetch_assoc($res);
	$rows = mysqli_fetch_all($res,MYSQLI_ASSOC);
	}

/*if(isset($_POST['submit'])){
	echo "<pre>";
	print_r($_POST); 
		$aItems = [];
	foreach ($_POST['sku'] as $key => $value) {
		$aItems[$key]['sku'] = $value;
		$aItems[$key]['item'] = $_POST['item'][$key];
		$aItems[$key]['qty'] = $_POST['qty1'][$key];
		$aItems[$key]['price'] = $_POST['unit_price'][$key];
		$aItems[$key]['discount'] = $_POST['discount_rs'][$key];
		$aItems[$key]['subtotal'] = $_POST['linesubtotal'][$key];
		//echo "<pre>"; print_r($value); echo "<pre>";
	}
	$jsonItems = json_encode($aItems,true);
	$sql= "INSERT into order_list(ClientID,Item)VALUES('".$_POST['clientId']."','$jsonItems')";
	
	if(mysqli_query($conn,$sql)){
		echo "data inserted"; 
	}
	else{
		echo "data not inserted";
	}


	
}*/
?>
<div class="right col-lg-10 col-sm-10 col-xs-10 col-md-10">




	<div class="row ">
		<ul class="breadcrumb">
			<li><a href="index.php"> database</a></li>
			<li><a href=""> invoice-form</a></li>
		</ul>
	</div>
		<div class="row">
			<H2 class="">	Invoices<small> Add New Invoice</small>	</H2><br>
		</div>
		<form class="form-horizontal ">
			<div class="row ">
				<div class="form-group col-lg-6 col-sm-6 ">
					<label class="col-lg-4 col-sm-4">External Reference</label>
					<input type="text" class="col-lg-8 col-sm-8" name="" placeholder="optional" >
				</div>
				<div class="form-group col-lg-3 col-sm-3">
					<label class="col-lg-4 col-sm-4">Number</label>
					<input type="text" class="col-lg-8 col-sm-8" name="" placeholder="number">
				</div>
				<div class="form-group col-lg-3 col-sm-3">
					<label class="col-lg-4 col-sm-4">Status</label><select class="col-lg-8 col-sm-8" id="sel1">
					    <option>Draft</option>
					    <option>Unpaid</option>
					    <option>Paid</option>
					    <option>OverDue</option>
					    <option>cancel</option>
					    <option>refund</option>
					  </select>
					</div>
					</div>
				
			

			<div class="row">
		
				<div class="form-group col-lg-6 col-sm-6 ">
					<label class="col-lg-4 col-sm-4">Invoice To</label>
					<input type="text" class="col-lg-8 col-sm-8" name="" placeholder="optional" >
					<span class="help-block text-center"><a href="#myModal" data-toggle="modal" >Add New Client</a></span>	
				</div>

				<!-- modal -->
				<div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content container-fluid">
			        <div class="modal-header ">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Add New Client</h4>
			          <h5 class="modal-title"> fill in the form to add new client</h5>
			        </div>
			        <div class="modal-body">
			          <form class="form-horizontal">
			          	<div class="form-group">
			          		<label>Name And Company</label>
			          		<input type="text" class="form-control" name="" placeholder="Enter Name">
			          	</div>
			          	<div class="form-group">
			          		<label>Email</label>
			          		<input type="email" class="form-control" name="" placeholder="Enter mail ID">
			          	</div>
			          	<div class="form-group">
			          		<label>Password</label>
			          		<input type="password" class="form-control" name="" placeholder="Enter password">
			          	</div>
			          	<div class="form-group">
			          		<label>Confirm Password</label>
			          		<input type="password" class="form-control" name="" placeholder="enter password again">
			          	</div>

			          </form>
			        </div>
			        <div class="modal-footer">
			          <button type="Submit" class="btn btn-success" data-dismiss="modal">Save</button>
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			      
			    </div>
			  </div>



				<div class="form-group col-lg-3 col-sm-3">
					<label class="col-lg-4 col-sm-4">Date</label>
					<input type="date" class="col-lg-8 col-sm-8" name="" placeholder="date">
				</div>
				<div class="form-group col-lg-3 col-sm-3">
					<label class="col-lg-4 col-sm-4">Due Date</label>
					<input type="date" class="col-lg-8 col-sm-8" name="" placeholder="due date">
				</div>
			</div>

			<div class="row">
				
				<div class="form-group col-lg-6 col-lg-offset-6">
					<label class="col-lg-3 col-sm-3">Frequency</label><div class="dropdown">
					<button class="btn btn-default dropdown-toggle col-lg-8 col-sm-8" type="button" data-toggle = "dropdown">draft <span class="caret"></span></button>
					<ul class="dropdown-menu	">
						<li class=" text-center">once</li>
						<li class="divider"></li>
						<li class=" text-center">week</li>
						<li class="divider"></li>
						<li class=" text-center">monthly</li>
						<li class="divider"></li>
						<li class=" text-center">quaterly</li>
						<li class="divider"></li>
						<li class=" text-center">yearly</li>
					</ul>
					</div>
				</div>
			</div>
	<form name="order" action="invoice.php" method="post">
		<div class="row">
			<div class="col-lg-4">
			<h2> Items And Services</h2>
			<button class="btn btn-lg btn-primary" onclick="return addRow('dataTable')">Add New</button>
			<button class="btn btn-lg btn-danger">Add Tax</button>
			</div>

			<div class="form-group clientName col-lg-6">
				   <?php
				   if (isset($_SESSION["Client"])) {
						$client = $_SESSION["Client"];?>
					<h2 class="text-capitalize text-danger "><?php echo $client;
					
					} ?></h2>
				   <select name="clientId" id="ClientName" class="form-control">
					<option value="">select the Client</option>
					<?php
					
						foreach ($rows as $num => $value) {
				echo "<option value='".$value['id']."'>".$value['Name']."</option>";
								


						}
					?>
				   </select>	
				</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class=" table-responsive">
					<table class="table table-striped table-hover table-condensed ">
						<thead>
							<tr>
								<th>sku</th>
								<th>item</th>
								<th>qty</th>
								<th>Unit Price</th>								
								<th>discount_Rs</th>
								<th>Line Subtotal</th>

		
							</tr>
						</thead>
						<tbody id="dataTable">
							<tr >
								<td>
								<input type="text" name="sku[]" class="form-control" value=""></td>

								<td><input type="text" name="item[]" class="form-control"></td>

 								<td><input type="number"  name="qty1[]" min="0" class="form-control wide qty" onchange="change(this);"></td>
								
								

								<td><div class="input-group-text"><span class="input-group-addon">$</span><input type="number" min="0" name="unit_price[]" class="form-control wide unit-price" onchange="change(this);"></div></td>

								<td><div class="input-group-text"><span class="input-group-addon">$</span><input type="number" min="0" name="discount_rs[]" class="form-control wide discount-rs" onchange="change(this)"></div></td>
								
								

								<td><div class="input-group-text"><span class="input-group-addon">$</span><input type="text" name="linesubtotal[]" class="form-control line-subtotal"></div></td>
								<td>
									<input type="button"  onclick="return delRow('dataTable')" name="deleteTable[]" value="Delete">
								</td>

							</tr>
									
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-lg-6">
			<div class="row"> Notes</div>
			<div class="row"><textarea cols="50" rows="5" placeholder="Add notes"></textarea></div>
			</div>
		<div class="col-sm-6 col-lg-6">
				<div class="input-group-box"><div class="col-sm-4 col-lg-4"> Global Amount</div><div class="input-group col-sm-8 col-lg-8"><span class="input-group-addon">$</span><input type="text" name="gross_total" class="form-control grosstotal">
			</div>

				
			<div class="input-group-box"><div class="col-sm-4 col-lg-4"> Discount Amount</div><div class="input-group col-sm-8 col-lg-8"><span class="input-group-addon">$</span><input type="text" name="discountAmount" class="form-control DiscountAmount">
			</div>
			</div>
		
			
			<div class="input-group-box"><div class="col-sm-4 col-lg-4 ">  Total</div><div class="input-group col-sm-8 col-lg-8"><span class="input-group-addon">$</span><input type="text" name="totalAmount" class="form-control total-sum">
			</div>
			</div>
			
		</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-sm-12 text-left "><div class="checkButton col-lg-5"><input type="checkbox" name="directCheck" class="directCheck "></div>
			<div class="checkButtonText col-lg-7"> click to send client direclty </div>
		</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 ">
				<input class="btn btn-lg btn-outline-success" type="submit" value="Save" name="submit">

				<button class="btn btn-lg btn-outline-danger" type="button" value="cancel"><a href="invoice.php"> cancel</a></button>
			
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-lg-offset-3 ">
				<button class="btn btn-lg btn-outline-warning"><a href="invoice.php"><-Back</a></button>
			</div>
		</div>
		</form>
	</div>
	
</body>
<script>
	 var totalDiscount=total=Gross_Total=0;
	function change(element) {

	var rowIndexValue = (element.closest('tr').rowIndex)-1;
	var qty= document.getElementsByClassName('qty')[rowIndexValue].value;
	 var unit_price= document.getElementsByClassName('unit-price')[rowIndexValue].value;
	 var discount_rs=document.getElementsByClassName('discount-rs')[rowIndexValue].value;

	 if (qty!=="" && unit_price!=="" && discount_rs!=="") {
	 var total = parseInt(qty) * parseInt(unit_price) - parseInt(discount_rs);
	
	 var grossTotal = parseInt(qty)*parseInt(unit_price);
	
	 var totalDiscount= parseInt(discount_rs);

	 var subtotal= document.getElementsByClassName('line-subtotal')[rowIndexValue].value= parseFloat(total);
	 

	 TotalDiscount(totalDiscount);
	 totalSum(total,grossTotal);
	 }
	}
	 
	 function TotalDiscount(totalDiscounts) {

/*
	 var table = document.getElementById('dataTable');	
	 var rowCount = table.rows.length;
	 */
	 	/*if(totalDiscounts!=="")
	 	{
	 		var totalDiscounts= document.getElementsByClassName('discount-rs')[i].value;
	 		var totalDiscount= 	 parseInt(totalDiscount)+parseInt(totalDiscounts) ;
		
		 document.getElementsByClassName('DiscountAmount')[0].value= parseInt(totalDiscount);
	 	}*/
	 if(totalDiscounts!=="")
	 	{
	 			 totalDiscount += totalDiscounts;
		
		  document.getElementsByClassName('DiscountAmount')[0].value= parseInt(totalDiscount);
	 	
	 
	}
}
	function totalSum(totalSub,gross_total) 
	{
				if(totalSub!=="")
				{
				total+=totalSub;

				 document.getElementsByClassName('total-sum')[0].value =  parseInt(total) ;
				}
				if (gross_total!=="") 
				{
					Gross_Total += gross_total;
					document.getElementsByClassName('grosstotal')[0].value =  parseInt(Gross_Total) ;
				}

	} 


				

	function addRow(tableRow) {

		var table= document.getElementById(tableRow);
		var rowCount= table.rows.length;
		var row =table.insertRow(rowCount);

		var colCount = table.rows[0].cells.length;
		for(var i=0;i<colCount;i++){
			var newCell= row.insertCell(i);

			newCell.innerHTML= table.rows[0].cells[i].innerHTML;

		}


		return false;

	}
	function delRow(tableRow1) {
  
	var rowCount = document.getElementById('dataTable').rows.length;
	if(rowCount>1){
      var td = event.target.parentNode; 
      var tr = td.parentNode; // the row to be removed
      tr.parentNode.removeChild(tr);
      totalDiscount=total=Gross_Total=0;
      update();
     }
     else{
     	alert('cant delete all rows');
     }

/*
  document.getElementById("deleteTables").deleteRow();*/
		}
		function update() {/*
			total=grossTotal=totalDiscount=subtotal=qty=unit_price=discount_rs=0;*/
			var rowCount = document.getElementById('dataTable').rows.length;
			for(i=0;i<rowCount;i++)
			{

				var qty= document.getElementsByClassName('qty')[i].value;
			 	var unit_price= document.getElementsByClassName('unit-price')[i].value;
				var discount_rs=document.getElementsByClassName('discount-rs')[i].value;

				if (qty!=="" && unit_price!=="" && discount_rs!=="") {
					console.log("qty is"+qty+" unit price is"+unit_price+" discountrs"+discount_rs);
					 var total = parseInt(qty) * parseInt(unit_price) - parseInt(discount_rs);
					
					 var grossTotal = parseInt(qty)*parseInt(unit_price);
					
					 var totalDiscount= parseInt(discount_rs);

					 var subtotal= document.getElementsByClassName('line-subtotal')[i].value= parseFloat(total);

					 TotalDiscount(totalDiscount);
					 totalSum(total,grossTotal);

					 }

			}

		}
</script>
<?php
unset($_SESSION["Client"]);
?>
</html>