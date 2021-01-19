<?php include 'Partials/header.php' ?>

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>MORE INFO</h1>
				</div>
			</div>
		</div>
<!--		<div class="col-sm-8">-->
<!--			<div class="page-header float-right">-->
<!--				<div class="page-title">-->
<!--					<ol class="breadcrumb text-right">-->
<!--						<li class="active">View Bom</li>-->
<!--					</ol>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
	</div>

	<div class="content mt-3">

	 <!-- code here --> 
	<!-- dropdown list -->
	 <!-- <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
        <select class="js-select2" id="myMonth">
             <option disabled selected value="a">Select Month</option>
             <option>January</option>
             <option>February</option>
             <option>March</option>
             <option>April</option>
             <option>May</option>
             <option>June</option>
             <option>July</option>
             <option>August</option>
             <option>September</option>
             <option>October</option>
             <option>November</option>
             <option>December</option>
         </select>
          <div class="dropDownSelect2"></div>
    </div> -->

<div id="accordion">

	<div class="card">
		<div class="card-header" id="headingOne">
		<h5 class="mb-0">

			<span style='text-align:left;font-size: 15px;'><?='BOM ID: '.$id?></span>

			<span style='text-align:right;font-size: 15px;'>
			
			<!-- <a href="" class="btn btn-sm btn-danger" style='font-size: 15px;float:right'>Genarate BOM</a> -->

			<a href="<?php echo base_url('index.php/bom_report/Genatate_report/' . $id); ?>" class="btn btn-link " style="color: black; text-decoration: none; float:right"> <h1 class="fa fa-bar-chart ">  Genatate_report  </h1></a>
			<!-- <a href="Genarate BOM"></a> -->
			<!-- <a href="#" class="btn btn-info"  style='font-size: 15px;float:right' role="button">Genarate BOM</a> -->

		</h5>
		</div>

		<!-- <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"> -->
		<div class="card-body">
		<!-- add table -->
		<table>
			
		<tr style='background-color:sage; color:black;  text-align:center; font-weight:bold;'>
                                             <th width="5%">Code</th>
                                              <th width="10%">Material Description</th>
										      <th width="10%">Color</th>
<!-- 										     <th width="5%">Size</th> -->
										      <th width="10%">Waste%</th>
										        <!-- <th width="10%">NEXT SERVICE DATE</th> -->
										      <th width="5%">MOQ</th>
										       <th width="3%"h>Required Qty</th>
										      <th width="3%">Action</th> 
                                         
										  </tr>
					<?php if ($rec==NULL){?>
                      <tr style="background-color:sage; color:black;  text-align:center; ">
                        <td><?='-'?></td>
                        <td><?='-'?></td>
                        <td><?='-'?></td>
                        <td><?='-';?></td>
<!--                         <td><?='-'?></td> -->
                        <td><?='-'?></td>
                        <td><?='-'?></td>
                        <td><?='-'?></td>
                      </tr>				  
                      <?php }else{?> 
					 <?php foreach($rec as $record):?>
                      <tr style='background-color:sage; color:black;  text-align:center; '>
                        <td><?=$record->material_id;?></td>
                        <td><?=$record->material_description;?></td>
                        <td><?=$record->color;?></td><!-- 
                        <td><?=$record->size;?></td> -->
                        <td><?=$record->waste.'%';?></td>
                        <td><?=$record->moq;?></td>
                        <td><?=$record->required_qty;?></td>
                        <td><a class="btn btn-sm btn-danger" href="<?php echo base_url('index.php/ViewBomController/removeMaterial?id=' . $record->material_id.'&style='.$id); ?>">Remove</a></td>
                      </tr>				  
                      <?php endforeach;}?> 
			</table>
			<!-- F01 - 10<br>
			F01 - 10<br>
			F01 - 10<br>
			F01 - 10<br> -->
		</div>
		<!-- </div> -->
	</div>
</div>

        

<?php include 'Partials/footer.php' ?>



<div class="row m-t-30">
