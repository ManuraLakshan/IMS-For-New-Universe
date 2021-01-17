
<?php include 'Partials/header.php' ?>

		<div class="breadcrumbs">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>View Damaged Goods</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">

					</div>
				</div>
			</div>
		</div>

		<div class="content mt-3">
			<div class="animated fadeIn">
				<div class="row">
				<?php
				if (!empty($fetch_Damaged_Goods)) {
				if($fetch_Damaged_Goods->num_rows() > 0) {

				$_SESSION["fetch_Damaged_Goods"]=array();
				$_SESSION["fetch_Damaged_Goods"]=$fetch_Damaged_Goods->result();
				$count = count($_SESSION["fetch_Damaged_Goods"]);
					$i=0;

				?>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<strong class="card-title">Damaged Goods List</strong>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th>Material Id</th>
										<th>Material Name</th>
										<th>Damage Qty</th>
										<th>Date</th>
									</tr>
									</thead>
									<tbody>

									<?php
										while($count>$i){
									?>

											<tr>
												<td><?php	echo	$_SESSION["fetch_Damaged_Goods"][$i]->material_id;	?></td>
												<td><?php	echo	$_SESSION["fetch_Damaged_Goods"][$i]->material_name;	?></td>
												<td><?php	echo	$_SESSION["fetch_Damaged_Goods"][$i]->damage_qty;	?></td>
												<td><?php	echo	$_SESSION["fetch_Damaged_Goods"][$i]->Date;	?></td>
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
