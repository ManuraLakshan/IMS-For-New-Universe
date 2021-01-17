
<?php include 'Partials/header.php' ?>

		<div class="breadcrumbs">
			<div class="col-sm-4 ">
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

		<div class="content mt-3">
			<div class="animated fadeIn">
				<div class="row">
				<?php
				if (!empty($view_overall_inventory)) {
				if($view_overall_inventory->num_rows() > 0) {

				$_SESSION["fetch_overall_Goods"]=array();
				$_SESSION["fetch_overall_Goods"]=$view_overall_inventory->result();
				$count = count($_SESSION["fetch_overall_Goods"]);
					$i=0;

				?>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<strong class="card-title">Overall Inventory</strong>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th>Material Id</th>
										<th>Material Name</th>
										<th>Material Qty</th>
										<th>Material Colour</th>
										<th>Date</th>
									</tr>
									</thead>
									<tbody>

									<?php
										while($count>$i){
									?>

											<tr>
												<td><?php	echo	$_SESSION["fetch_overall_Goods"][$i]->material_id;	?></td>
												<td><?php	echo	$_SESSION["fetch_overall_Goods"][$i]->material_name;	?></td>
												<td><?php	echo	$_SESSION["fetch_overall_Goods"][$i]->quantity;	?></td>
												<td><?php	echo	$_SESSION["fetch_overall_Goods"][$i]->color;	?></td>
												<td><?php	echo	$_SESSION["fetch_overall_Goods"][$i]->date;	?></td>
											</tr>

									<?php	$i++;}	?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				<?php
						$i++;}}
				?>

				</div>
			</div><!-- .animated -->
		</div><!-- .content -->

<?php include 'Partials/footer.php' ?>
