<?php



if (!empty($fetch_fabric_data)) {
	if($fetch_fabric_data->num_rows() > 0) {

		$_SESSION["meterial"]=array();
		$_SESSION["meterial"]=$fetch_fabric_data->result();
		$count = count($_SESSION["meterial"]);

		$i=0;
		while($count>$i){
			?>
			<div id="accordion">
				<div class="card">
					<div class="card-header">
						<h5 class="mb-0">
							<button class="btn btn-link col-lg-12 text-left" data-toggle="collapse" data-target="#collapseOne<?php	echo $_SESSION["meterial"][$i]->material_id;	?>" aria-expanded="true" aria-controls="collapseOne<?php	echo $_SESSION["meterial"][$i]->material_id;	?>">
								<strong><?php	echo $_SESSION["meterial"][$i]->material_name;	?></a></strong>
							</button>
						</h5>
					</div>

					<div id="collapseOne<?php	echo $_SESSION["meterial"][$i]->material_id;	?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body">
							<?php
							$j=0;
							//-----------------SQL SECOND QUERY-------------------------------------------------//
							//$fabricQuery = $this->db->query("SELECT SUM(`quantity`) AS `quantity`,`material_description`,`color`,`material_name` FROM `material` m, `stock` s WHERE m.`material_id`=s.`material_id` AND `material_name`='{$_SESSION["meterial"][$i]->material_name}' GROUP BY m.`material_id`");
							$fabricQuery = $this->db->query("SELECT * FROM `material`  WHERE `material_name`='{$_SESSION["meterial"][$i]->material_name}'");

							$_SESSION["stock"]=$fabricQuery->result();
							$count2 = count($_SESSION["stock"]);
							//----------------------------------------------------------------------------------//




							while($count2>$j){
								$FabQuantity = $_SESSION["stock"][$j]->total_quantity;
								$FabName = $_SESSION["stock"][$j]->material_description;
								$FabColour = $_SESSION["stock"][$j]->color;
								?>
								<div class="col-sm-6 col-lg-3">
									<div class="card text-white bg-flat-color-2">
										<div class="card-body pb-0" style="height: 160px;">
											<h4 class="mb-0" style="padding: 20px -20px 0px 0px; ">
												Quantity : <span class="count" style="font-size: 25px;"><?php	echo $FabQuantity;	?></span><br>
											</h4>
											<h6 class="mb-0 mt-3">
												Fabric Name  : <span class="text-light"><?php	echo $FabName;	?></span><br>
												Fabric Colour : <span class="" style="color: <?php	echo $FabColour;	?>;"><?php	echo $FabColour;	?></span>
											</h6>
											<div class="chart-wrapper px-0" style="height:70px;" height="70">

											</div>

										</div>
									</div>
								</div>


								<?php



								$j++;
							}

							?>
						</div>
					</div>
				</div>
			</div>
			<?php $i++;	}	}	}	?>
