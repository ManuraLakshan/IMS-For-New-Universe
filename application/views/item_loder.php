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
								$FabId = $_SESSION["stock"][$j]->material_id;
								$FabQuantity = $_SESSION["stock"][$j]->total_quantity;
								$FabName = $_SESSION["stock"][$j]->material_description;
								$FabColour = $_SESSION["stock"][$j]->color;
								$Fabimg = $_SESSION["stock"][$j]->item_image;
								$FabUnit = $_SESSION["stock"][$j]->material_unit;
								$FabType = $_SESSION["stock"][$j]->material_name;
								?>

								<div class="col-xl-3 col-lg-6">
									<section class="card">
										<div class="twt-feed <?php if(strtoupper($FabType) == "FABRIC") {
											echo "bg-warning";
										}elseif (strtoupper($FabType) == "THREAD"){
											echo "bg-info";
										}elseif (strtoupper($FabType) == "BUTTON"){
											echo "bg-danger";
										}else{
											echo "bg-success";
										}
											?>">
											<div class="corner-ribon black-ribon">
												<i class=""><img class=" mr-3" alt="" style="margin-left: 15px; width:100px; height:18px; " src="<?php echo base_url('images/client_logo.png'); ?>"></i>
											</div>
											<div class=" wtt-mark"></div>

											<div class="media">
												<a href="#">
													<img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt=""  src="<?php echo $Fabimg; ?>">
												</a>
												<div class="media-body">
													<h4 class="text-white" style="margin-top: 20px;" ><strong><?php	echo $FabId;	?></strong></h4>
													<h3 class="text-white display-7" style="margin-top: 20px;" ><strong><?php	echo $FabName;	?></strong></h3>

												</div>
											</div>
										</div>
										<div class="weather-category twt-category">
											<ul>
												<li class="active">
													<h4><?php	echo $FabQuantity;	?></h4>
													Quantity
												</li>
												<li class="active">
													<h4><?php	echo $FabColour;	?></h4>
													Colour
												</li>
												<li class="active">
													<h4><?php	echo $FabUnit;	?></h4>
													Unit
												</li>

											</ul>
										</div>

										<footer class="twt-footer">
											<a href="#"><i class=""></i></a>
											<a href="#"><i class="fa fa-map-marker"></i></a>
											NEW UNIVERSE, MATARA

										</footer>
									</section>
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
