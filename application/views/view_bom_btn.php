<?php include 'Partials/header.php' ?>

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>ADD BOM</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="active">Add Bom</li>
					</ol>
				</div>
			</div>
		</div>
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
	
				<?php 
                  $i=1;
                  foreach($result as $rec):?>
                  <a href="<?php echo base_url('index.php/ViewBomController/viewBom/'.$rec->style_id); ?>">
                    <div class="col-lg-6 mb-4">
                      <div class="card bg-gradient-info text-white"  style="background-color: blue;">
                        <div class="card-body">
                          <?='Product name : '.$rec->style_name;?>
                          <div class="text-white-50 small">Bom ID: <?=$rec->style_id;?></div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php endforeach;?>




		
	
  </div>
	</div>
        

<?php include 'Partials/footer.php' ?>



<div class="row m-t-30">
                            