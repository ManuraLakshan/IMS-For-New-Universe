<?php include 'Partials/header.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>New Order</title>

<!--	<//php include 'left_panel.php'?>-->
<!--	<//?php include 'partials/main_header.php'?>-->
<!---->
<!--	< <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script-->
<!--	< <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script> -->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">-->
<!-- 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
 	<script type="text/javascript" src="/order.js"></script>
 </head>
<body>

	
	<br/><br/>

	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
				  <div class="card-header">
				   	<h4>New Orders</h4>
				  </div>
				  <div class="card-body">

				  	<form id="get_order_data" action="<?php echo base_url("index.php/Welcome/insertOrderDetails");?>" method="post">
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Order Date</label>
				  			<div class="col-sm-6">
				  				<input type="text" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
				  			</div>
				  		</div>
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Due Date</label>
				  			<div class="col-sm-6">
				  				<input type="text" id="order_date" name="due_date" value="<?php echo date("Y-d-m"); ?>" >
				  			</div>
				  		</div>
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Sender Name*</label>
				  			<div class="col-sm-6">
				  				<input type="text" id="cust_name" name="sender_name"class="form-control form-control-sm" placeholder="Enter Sender Name" value="<?php echo $this->session->userdata('user_name'); ?>" required/>
				  			</div>
				  		</div>


				  		<div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
				  			<div class="card-body">
				  				<h3>Make a order list</h3>

  								<div class="mb-3">
    							<label for="exampleInputEmail1" class="form-label">Material Name*</label>
    							<input type="text" class="form-control" id="material_name" aria-describedby="emailHelp" name="material_name">
    							<span class="text-danger"><?php echo form_error();?></span>
  								</div>

  								<div class="mb-3">
    							<label for="exampleInputEmail1" class="form-label">Gate Pass Number*</label>
    							<input type="text" class="form-control" id="gatepass" aria-describedby="emailHelp" name="gatepass">
  								</div>

  								<div class="mb-3">
    							<label for="exampleInputEmail1" class="form-label">Material ID*</label>
    							<input type="text" class="form-control" id="material_id" aria-describedby="emailHelp" name="material_id">
  								</div>

  								<div class="mb-3">
    							<label for="exampleInputEmail1" class="form-label">Style*</label>
    							<input type="text" class="form-control" id="style" aria-describedby="emailHelp" name="style">
  								</div>

  								<div class="mb-3">
    							<label for="exampleInputEmail1" class="form-label">Sample Name*</label>
    							<input type="text" class="form-control" id="style" aria-describedby="emailHelp" name="sample_name">
  								</div>

  								<div class="mb-3">
    							<label for="exampleInputEmail1" class="form-label">Sample Details*</label>
    							<input type="text" class="form-control" id="style" aria-describedby="emailHelp" name="sample_details">
  								</div>

  								<div class="mb-3">
    							<label for="exampleInputEmail1" class="form-label">Color*</label>
    							<input type="text" class="form-control" id="style" aria-describedby="emailHelp" name="color">
  								</div>

  								<div class="mb-3">
    							<label for="exampleInputEmail1" class="form-label">Roll No*</label>
    							<input type="text" class="form-control" id="style" aria-describedby="emailHelp" name="rollNo">
  								</div>

  								<!-- <div class="mb-3">
    							<label for="exampleInputEmail1" class="form-label">Current Quantity*</label>
    							<input type="text" class="form-control" id="material_name" aria-describedby="emailHelp" name="current_qty">
  								</div> -->

  								<div class="mb-3">
    							<label for="exampleInputEmail1" class="form-label">Required Quantity*</label>
    							<input type="text" class="form-control" id="requited_qty" aria-describedby="emailHelp" name="required_qty">
  								</div>

  								<div class="mb-3">
    							<label for="exampleInputEmail1" class="form-label">Description</label>
    							<input type="text" class="form-control" id="material_name" aria-describedby="emailHelp" name="description">
  								</div>

				  			</div> 
				  		</div> 

				  	

                    <center>
                      <input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Order Now" >
                      <a href="<?php echo base_url("index.php/Welcome/print_invoice");?>">
                     	 <input type="button" id="print_invoice" style="width:150px;" class="btn btn-info" value="Print Invoice">
					  </a>

                    </center>


				  	</form>
				  	<?php echo form_close();?>

				  </div>
				</div>
			</div>
		</div>
	</div>



	<script>
		$(document).ready(function (){
			function handleAutoComplete(){


				$("#material_id").autocomplete({
					source: function (data, cb){
						$.ajax({
							url: "<?php echo base_url("index.php/Welcome/getRequestData");?>",
							method: 'GET',
							dataType: 'json',
							data: {
								id: data.term,
							},
							success: function (res){

								let result = [
									{
										label: "There is no record related to " + data.term,
										value: '',
									}
								];
								if(res.length){
									result = $.map(res, function (obj){

										return {
											label: obj["material_id"],
											value: obj["material_id"],
											data: obj
										}
									});
								}
								console.log(result);
								cb(result);

							}

						});

					},
					select: function (event,selectData){
						if(selectData && selectData.item && selectData.item.data){
							let data = selectData.item.data;
							//
							// $('#materialDesc').val(data.material_description);
							// $('#materialColor').val(data.color);
							// $('#materialType').val(data.material_name);
							$('#requited_qty').val(data.quentity);
						}
					}
				});
			}

			function registerEvents(){

				$(document).on("focus",'#material_id',handleAutoComplete);
			}

			registerEvents();
		});

	</script>

		<?php include 'Partials/footer.php' ?>
</body>
</html>
