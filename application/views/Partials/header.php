<?php


		//sigin in process


		//sign up process

		/*if (isset($_POST["signup"])) {

			$today = date("Y-m-d");
			$encryted_pwd = sha1($_POST['pwd']);

			$reg_new_user_q = "INSERT INTO `user`( `first_name`, `last_name`, `role`, `phone`, `email`, `join_date`, `avatar`, `password` ) VALUES ('{$_POST["fname"]}', '{$_POST["lname"]}', 'customer', '{$_POST["phone"]}', '{$_POST["email"]}', '{$today}', NULL ,'{$encryted_pwd}')";

			//echo $reg_new_user_q;

			if (mysqli_query($reg_new_user_q)) {

				//if user successfuly registerd, then sign in automaticaly
				sign_in($_POST["email"],$_POST['pwd']);

			}
		}*/
	if (!($this->session->userdata('loggedin'))){

		redirect('Welcome/Logging');

	}

?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Universe Garments</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">




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

	<script type="text/javascript" src="<?php echo base_url('vendors/bootstrap/js/dist/sweetalert.min.js'); ?>"></script>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
</head>

<body>
<!-- Left Panel -->
<?php include_once 'left_panel.php'; ?>
<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">


					<?php if($_SESSION["Roll"] == "admin"){ ?>
                    <div class="dropdown for-notification">
						<strong>
							<button href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="bg-danger count" style="border-radius:10px;"><?php	echo $_SESSION['noti_count'];?></span><strong style="font-size: large">User Requested Notifications - </strong>
								<span class="fa fa-bell" style="font-size:18px;"></span>

							</button>

							<ul class="dropdown-menu dropdown-menuw3" ></ul>
						</strong>
                    </div>
					<?php }else{} ?>


                </div>
            </div>

			<div class="col-sm-5">

				<div class="user-area dropdown float-right">

					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<strong style="  font-size: x-large " class="" ><?php echo	$this->session->userdata('user_name');	 ?><?php echo "<small>(<i>".$this->session->userdata('role')."</i>)</small>"; ?>&ensp;

							<img class="user-avatar rounded-circle" height="30" src="<?php echo base_url('images/avatar/'.$this->session->userdata('avataar')); ?>" alt=""></strong>
					</a>

					<div class="user-menu dropdown-menu">




						<a class="nav-link" href="<?php echo base_url('index.php/Form_controller/Logout_user'); ?>"><i class="fa fa-power-off"></i> Logout</a>
					</div>
				</div>
			</div>
        </div>

    </header>
    <!-- Header-->
	<script>
		$(document).ready(function() {

			function load_unseen_notification(view = '') {
				$.ajax({
					url: "<?php echo base_url('index.php/ajax_testControl/fetchdata'); ?>",
					method: "POST",
					data: {view: view},
					dataType: "json",
					success: function (data) {
						$('.dropdown-menuw3').html(data.notification);
						if (data.unseen_notification > 0) {
							$('.count').html(data.unseen_notification);
						}
					}
				});
			}

			load_unseen_notification();
		});
	</script>
