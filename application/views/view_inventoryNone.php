<?php include 'Admin/header.php' ?>

<! Headder pannel indicates the name of page -->

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title" >
					<a href="<?php echo base_url('index.php/Welcome/view_inventory'); ?>" class=" btn btn-link" style="color: black; text-decoration: none;"><h1 class=" ti-package">    View Current Inventory</h1></a>
					<strong class="lead">|</strong>
					<a href="<?php echo base_url('index.php/Welcome/view_overall_inventory'); ?>" class="btn btn-link " style="color: black; text-decoration: none;"> <h1 class="fa fa-bar-chart ">    View Overall Inventory</h1></a>

				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="active"></li>
					</ol>
				</div>
			</div>
		</div>
	</div>

<! Naming which are the listed items in item panel -->

	<div class="col-sm-12 mt-2">

		<!--div class="alert  alert-success alert-dismissible fade show" role="alert">
			<span class="badge badge-pill badge-success">Success</span> Fabric Stock (meters)

		</div-->
		<?php include 'Admin/item_loder.php' ?>



	</div>


<?php include 'Admin/footer.php' ?>
