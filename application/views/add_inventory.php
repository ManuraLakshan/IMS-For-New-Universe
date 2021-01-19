<?php include 'Partials/header.php' ?>


    <div class="col-lg-12">

		<?php if($this->uri->segment(2) == "inserted") {
		?>
			<div class="alert alert-success alert-dismissible fade show hideEle" role="alert">
				Material Add to the Inventory
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<script>
				setTimeout(()=>{
					let ele = document.querySelector('.hideEle');
					ele.style.display = "none";
				},5000);
			</script>
		<?php } elseif($this->uri->segment(2) == "updated"){?>
			<div class="alert alert-warning alert-dismissible fade show hideEle" role="alert">
				Inventory updated!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<script>
				setTimeout(()=>{
					let ele = document.querySelector('.hideEle');
					ele.style.display = "none";
				},5000);
			</script>
		<?php } elseif($this->uri->segment(2) == "alreadyExcites"){?>
			<div class="alert alert-danger alert-dismissible fade show hideEle" role="alert">
				Material is already excites with a different color and type!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<script>
				setTimeout(()=>{
					let ele = document.querySelector('.hideEle');
					ele.style.display = "none";
				},5000);
			</script>
		<?php }?>
		<div class="container mt-5">
        	<div class="card">
            <div class="card-header">
                <strong>Add to inventory</strong>
            </div>
            <form action="<?php echo base_url("index.php/AddInventoryController/addStockToDatabase");?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="card-body card-block">
					<div class="row form-group">
						<div class="col col-md-2"><label for="arrivalDate" class=" form-control-label">Date</label></div>
						<div class="col-12 col-md-3">
							<input type="date" id="arrivalDate" name="arrivalDate" class="form-control" value="<?php date_default_timezone_set('Asia/Kolkata');
							echo date("Y-m-d");?>" min="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d");?>">
							<span class="text-danger"><?php echo form_error('arrivalDate'); ?></span>
						</div>
					</div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="materialId" data-field-name = "material_id" class=" form-control-label">Material ID</label></div>
                        <div class="col-12 col-md-9">
							<input type="hidden" id="base_path" value="<?php echo base_url(); ?>">
                            <input type="text" id="materialId" name="materialId" placeholder="Enter Material ID" class="form-control">
							<span class="text-danger"><?php echo form_error('materialId'); ?></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="materialDesc" class=" form-control-label">Material Description</label></div>
                        <div class="col-12 col-md-9">
							<input type="text" id="materialDesc" name="materialDesc" placeholder="Enter Material Description" class="form-control">
							<span class="text-danger"><?php echo form_error('materialDesc'); ?></span>
						</div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="materialColor" class=" form-control-label">Material Color</label></div>
                        <div class="col-12 col-md-9">
							<input type="text" id="materialColor" name="materialColor" placeholder="Enter Material Color" class="form-control">
							<span class="text-danger"><?php echo form_error('materialColor'); ?></span>
						</div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="materialType" class=" form-control-label">Material Type</label></div>
                        <div class="col-12 col-md-3">
                            <select name="materialType" id="materialType" class="custom-select">
                                <option value="0">Material Type</option>
								<?php if($type->num_rows() > 0)
								{
									foreach ($type->result() as $row)
									{
								?>

										<option value="<?php echo $row->type?>"><?php echo $row->type?></option>

								<?php
									}
								}
								?>
                            </select>
							<span class="text-danger"><?php echo form_error('materialType'); ?></span>
                        </div>
                    </div>
					<div class="row form-group">
						<div class="col col-md-2"><label for="materialUnit" class=" form-control-label">Unit</label></div>
						<div class="col-12 col-md-3">
							<select name="materialUnit" id="materialUnit" class="custom-select">
								<option value="0">Unit Type</option>
								<option value="PCs">PCs</option>
								<option value="Meters">Meters</option>
								<option value="CONS5000">CONS5000</option>
								<option value="Nos">Nos</option>
							</select>
							<span class="text-danger"><?php echo form_error('materialUnit'); ?></span>
						</div>
					</div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="materialQuantity" class=" form-control-label">Quantity</label></div>
                        <div class="col-12 col-md-3">
							<input type="number" id="materialQuantity" name="materialQuantity" placeholder="Material Quantity" class="form-control" min=0>
							<span class="text-danger"><?php echo form_error('materialQuantity'); ?></span>
						</div>
                    </div>
                    <div class="row form-group">
						<div class="col col-md-2"><label for="materialImage" class=" form-control-label">Material Image</label></div>
                        <div class="col-12 col-md-3">
							<input type="file" id="materialImage" name="materialImage" placeholder="Stock Quantity" class="form-control-file" min=0>
							<span class="text-danger"><?php if(isset($upload_error)){echo $upload_error;} ?></span>
						</div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="add" value="submit" class="btn btn-dark btn rounded">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-warning btn rounded">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </form>
        </div>
		</div>
    </div>

<script>
	$(document).ready(function (){
		function handleAutoComplete(){


			$("#materialId").autocomplete({
				source: function (data, cb){
					$.ajax({
						url: "<?php echo base_url("index.php/AddInventoryController/getMaterialDetails");?>",
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

						$('#materialDesc').val(data.material_description);
						$('#materialColor').val(data.color);
						$('#materialType').val(data.material_name);
						$('#materialUnit').val(data.material_unit);
					}
				}
			});
		}

		function registerEvents(){

			$(document).on("focus",'#materialId',handleAutoComplete);
		}

		registerEvents();
	});

	function getDate(element)
	{
		window.onload = (e) =>{
			fetch("http://worldtimeapi.org/api/timezone/Asia/Colombo")
					.then(res => res.json())
					.then(d => {

						let date = d.datetime.split("T");
						element.value = date[0];
						element.min = date[0];
						element.max = date[0];
					});
		};
	}


	const stockDate = document.getElementById("arrivalDate");
	getDate(stockDate);

</script>

<?php include 'Partials/footer.php' ?>
