
<?php
$dir_path = "assets/logbook/";

if(is_dir($dir_path)){
	$files =  opendir($dir_path);
	$options = array();
	if($files){
		while(($file_name = readdir($files)) !== FALSE){
			if($file_name != '.' && $file_name !='..'){
				array_push($options,$file_name);
			}
		}
	}
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('vendors/themify-icons/css/themify-icons.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('vendors/flag-icon-css/css/flag-icon.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('vendors/selectFX/css/cs-skin-elastic.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('vendors/jqvmap/dist/jqvmap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css');?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">


	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>

	<title>Document</title>
</head>
<body class="bg-dark">

<div class="container-fluid p-5">

	<h1 class="display-1 text-white pb-5">Log Book <a href="<?php echo base_url("index.php/Welcome/index");?>" class="btn btn-secondary rounded">Sign Out</a> </h1>


	<div class="card rounded">
		<div class="card-body">


				<div class="form-group">
					<label for="exampleFormControlSelect1">Select log file</label>
					<select class="form-control" id="exampleFormControlSelect1">
						<?php
							foreach ($options as $p){
						?>
								<option value="<?php echo $p?>"><?php echo $p?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<button onclick="xx()" class="btn btn-dark rounded">Submit</button>
				</div>

		</div>
	</div>
	<div class="card rounded">
		<div class="card-body">
			<?php if($this->session->tempdata('item')) foreach($this->session->tempdata('item') as $d): ?>
				<p><?php echo $d?></p>
			<?php endforeach; ?>
		</div>
	</div>
</div>


<script>

	function xx() {
		var x = document.getElementById("exampleFormControlSelect1").value;
		window.location="../LogBookController/readme/"+x;
	}


</script>


</body>
</html>

