<?php include 'Partials/header.php' ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js" integrity="sha512-oHBLR38hkpOtf4dW75gdfO7VhEKg2fsitvHZYHZjObc4BPKou2PGenyxA5ZJ8CCqWytBx5wpiSqwVEBy84b7tw==" crossorigin="anonymous"></script>

<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Check Requriment</h1>
			</div>
		</div>
	</div>
</div>



<div class="container" >


	<h6 class="text-center my-3">Allocating Table</h6>
	<table  id="bootstrap-data-table-export" class="table table-striped table-bordered">
		<thead>
		<tr>

			<th>Material_ID</th>
			<th>Quantity</th>
			<th>Total_Quantity</th>
			<th>Status</th>
			<th>Action</th>


		</tr>
		</thead>
		<tbody>
		<?php

		$load_data['load_data']=$get_quantity;

		foreach($load_data['load_data'] as $value) {
			if($value->required_qty>$value->total_quantity){
				$quantity_stock="Not enough";
			}else{
				$quantity_stock="Enough";
			}
			?>

			<tr>
				<td> <?php echo  $value->material_id;?></td>
				<td id="item_qua"> <?php echo $value->required_qty;?></td>
				<td id="item_qua"> <?php echo $value->total_quantity;?></td>
				<td><?php echo $quantity_stock;?></td>
				<td>
					<?php if($value->required_qty > $value->total_quantity){ ?>
						<a href="<?php echo base_url('index.php/Welcome/request_quantity/'.$value->material_id.'/'.$value->required_qty.'/'.$value->total_quantity.'/'.$value->bom_id.'/'.$value->style_id);?>"><input class="btn btn-warning" type="button" value="Request" id="btn1" class="btn" <?php if($value->is_issued == 3) echo 'disabled';?>></a>
					<?php } else { ?>
						<a href="<?php echo base_url('index.php/Welcome/ready_take/'.$value->material_id.'/'.$value->required_qty.'/'.$value->bom_id);?>"><input class="btn btn-primary" type="button" value="Take" id="btn1" class="btn" ></a>
					<?php } ?>
				</td>
				<!-- <td><input type="button" value="check quantity" onclick="btn(<php echo $value->quantity;?>,<php echo $value->total_quantity;?>)" id="btn1" class="btn" ></td> -->
			</tr>
		<?php };?>
		</tbody>
	</table>
</div>


<div class="container">

	<h6 class="text-center my-3">Confirming Table </h6>
	<table id="bootstrap-data-table-export" class="table  table-bordered">
		<thead>
		<tr>
			<th>Material_ID</th>
			<th>Quantity</th>
			<th>Total_Quantity</th>
			<th>Action</th>

		</tr>
		</thead>
		<tbody>
		<?php

		$load_data['load_data'] ?>

		<?php foreach($load_quantity as $value) :?>

			<tr>
				<td> <?php echo  $value->material_id;?></td>
				<td id="item_qua"> <?php echo $value->required_qty;?></td>
				<td><?php echo  $value->total_quantity;?></td>
				<td><a href="<?php echo base_url('index.php/Welcome/reduas_quantity/'.$value->material_id.'/'.$value->required_qty.'/'.$value->bom_id);?>"><input class="btn btn-success" type="button" value="Conform" id="btn1" class="btn"></a></td>
			</tr>
		<?php endforeach;?>

		</tbody>
	</table>
</div>







<div class="container">

	<h6 class="text-center my-3">Request Table </h6>
	<table id="bootstrap-data-table-export" class="table  table-bordered">
		<thead>
		<tr>
			<th>BOM_ID</th>
			<th>Material_ID</th>
			<th>Quantity</th>

		</tr>
		</thead>
		<tbody>
		<?php if(count($get_requset)):?>
			<?php foreach($get_requset as $value):?>
				<tr>
					<td><?php echo  $value->bom_id;?></td>
					<td><?php echo  $value->material_id;?></td>
					<td><?php echo  $value->quentity;?></td>
				</tr>
			<?php endforeach;?>
		<?php endif;?>

		</tbody>
	</table>
</div>

<?php include 'Partials/footer.php' ?>

