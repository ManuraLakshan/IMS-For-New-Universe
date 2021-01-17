<?php include 'Partials/header.php' ?>
	
	<br/><br/>

	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
				  <div class="card-header">
				   	<h4>New Orders</h4>
				  </div>
				  <div class="card-body">
				  	<form id="get_order_data" onsubmit="return false">
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Order Date</label>
				  			<div class="col-sm-6">
				  				<input type="date" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
				  			</div>
				  		</div>
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Due Date</label>
				  			<div class="col-sm-6">
				  				<input type="date" id="order_date" name="order_date" value="<?php echo date("Y-d-m"); ?>">
				  			</div>
				  		</div>
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Sender Name*</label>
				  			<div class="col-sm-6">
				  				<input type="text" id="cust_name" name="cust_name"class="form-control form-control-sm" placeholder="Enter Customer Name" required/>
				  			</div>
				  		</div>


				  		<div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
				  			<div class="card-body">
				  				<h3>Make a order list</h3>
				  				<table align="center" style="width:800px;">
		                            <thead>
		                              <tr>
		                                <th></th>
		                                <th style="text-align:center;">Material Name</th>
		                                 <th style="text-align:center;">Material ID</th>
		                                <th style="text-align:center;">Current Quantity</th>
		                                <th style="text-align:center;">Required Quantity</th>
		                              </tr>
		                            </thead>
		                            <tbody id="invoice_item">
		<tr>
		    <td><b id="number"></b></td>
		    <td>
				<select name="meterial_type" id="meterial_type" class="form-control">
					<option value="">Select Type</option>
					<?php
					$meterialTypes = $this->db->query("SELECT `material_name` FROM `material` GROUP by `material_name`");
					$_SESSION["meterialTypes"]=$meterialTypes->result();
					$meterialTypes_row_count = count($_SESSION["meterialTypes"]);
					$i=0;
					while($meterialTypes_row_count>$i){
						echo "<option value=\"{$_SESSION["meterialTypes"][$i]->material_name}\">{$_SESSION["meterialTypes"][$i]->material_name}</option>";
						?>

						<?php $i++;}?>


				</select>
		    </td>
		    <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
		    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>   
		    <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
		</tr>
		                            </tbody>
		                        </table> <!--Table Ends-->


		                        <center style="padding:10px;">
		                        	<button id="add" style="width:150px;" class="btn btn-success">Add</button>
		                        	<button id="remove" style="width:150px;" class="btn btn-danger">Remove</button>
		                        </center>
				  			</div> 
				  		</div> 

				  	<p></p>
                    <div class="form-group row">
                      <label for="sub_total" class="col-sm-3 col-form-label" align="right">Description</label>
                      <div class="col-sm-6">
                        <input type="text"  class="form-control form-control-sm" id="sub_total" required/>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="payment_type" class="col-sm-3 col-form-label" align="right">Payment Method</label>
                      
                    </div>

                    <center>
                      <input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Order">
                      <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print Invoice">
                    </center>


				  	</form>

				  </div>
				</div>
			</div>
		</div>
	</div>


<?php include 'Partials/footer.php' ?>
