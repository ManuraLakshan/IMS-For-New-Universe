<?php include 'Partials/header.php' ?>

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>VIEW BOM</h1>
				</div>
			</div>
		</div>
<!--		<div class="col-sm-8">-->
<!--			<div class="page-header float-right">-->
<!--				<div class="page-title">-->
<!--					<ol class="breadcrumb text-right">-->
<!--						<li class="active">view Bom</li>-->
<!--					</ol>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
	</div>


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
<!--	 -->

<div id="accordion">
	<div class="card m-3">
		<?php foreach ($result as $r): ?>
			<div class="col-xl-3 col-lg-6 col-md-3">
				<section class="card m-3">
					<div class="twt-feed bg-success">
						<div class="corner-ribon black-ribon">
							<i class=""><img class=" mr-3" alt="" style="margin-left: 15px; width:100px; height:18px; " src="<?php echo base_url('images/client_logo.png'); ?>"></i>
						</div>
						<div class=" wtt-mark"></div>

						<div class="media">
							<div class="media-body">
								<h3 class="text-white display-7" style="margin-top: 20px;" ><strong></strong></h3>
								<h4><?php echo strtoupper($r->style_id); ?></h4>
								<h2><?php echo strtoupper($r->style_name); ?></h2>
							</div>
						</div>
					</div>
					<div class="weather-category twt-category">
						<ul>
							<li class="active">
								<h4><?php echo $r->num_of_pieces;  ?></h4>
								Quantity
							</li>
							<li class="active">
								<h4><?php echo $r->due_date;  ?></h4>
								Due Date
							</li>
							<li class="active">
								<h4><a href="<?php echo base_url('index.php/ViewBomController/viewBom?id='.$r->style_id); ?>">More Info</a></h4>
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
		<?php endforeach; ?>
	</div>
</div>

<?php include 'Partials/footer.php' ?>




