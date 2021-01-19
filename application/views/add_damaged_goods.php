<?php include 'Partials/header.php' ?>

<! Headder pannel indicates the name of page -->

<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Add Damaged Goods</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Add Damaged Goods</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<?php
if ($this->session->flashdata('msg')){?>
<div class=" col-md-10">
	<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
		<span class="badge badge-pill badge-success">Successfully</span>
		<?php
			echo "{$this->session->flashdata('msg')}";

		?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
</div>


<?php
		}else{

	echo"";
}

?>


<! Naming which are the listed items in item panel -->

<div class="container">
	<div class="card">
		<?php	echo validation_errors();	?>
		<?php	echo form_open('form_controller/add_damage_goods');	?>
		<?php
		$meterialTypes = $this->db->query("SELECT `material_name` FROM `material` GROUP by `material_name`");
		$_SESSION["meterialTypes"]=$meterialTypes->result();
		$meterialTypes_row_count = count($_SESSION["meterialTypes"]);
		?>

			<div class="card-body card-block">
				<div class="row form-group">
					<div class="col col-md-3"><label class=" form-control-label">Material ID</label></div>
					<div class="col-12 col-md-9">
						<input type="text" id="meterial_id" name="meterial_id" placeholder="Enter Material ID" class="form-control">
					</div>
				</div>


				<div class="row form-group">
					<div class="col col-md-3"><label for="select" class=" form-control-label">Meterial Type</label></div>
					<div class="col-12 col-md-9">
						<select name="meterial_type" id="meterial_type" class="form-control">
							<option value="">Select Type</option>
							<?php
								$i=0;
								while($meterialTypes_row_count>$i){
									echo "<option value=\"{$_SESSION["meterialTypes"][$i]->material_name}\">{$_SESSION["meterialTypes"][$i]->material_name}</option>";
							?>

							<?php $i++;}?>


						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3"><label class=" form-control-label">Date</label></div>
					<div class="col-12 col-md-9">
						<input type="date" id="date" name="date" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3"><label for="email-input" class=" form-control-label">Quantity</label></div>
					<div class="col-12 col-md-9"><input type="number" id="stock_quantity" name="stock_quantity" placeholder="Stock Quantity" class="form-control" min=0></div>
				</div>

			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary btn rounded" name="add_damage_goods">
					<i class="fa fa-dot-circle-o"></i> Submit
				</button>
				<button type="reset" class="btn btn-danger btn rounded" name="reset_damage_goods">
					<i class="fa fa-ban"></i> Reset
				</button>
			</div>

		<?php	echo form_close();	?>

	</div>
</div>


<?php include 'Partials/footer.php' ?>
