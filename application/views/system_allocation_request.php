
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/themify-icons/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/flag-icon-css/css/flag-icon.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/selectFX/css/cs-skin-elastic.css'); ?>">

     <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">




    <div class="sufee-login d-flex align-content-center flex-wrap">
		<div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="<?php echo base_url('index.php/Welcome/index2'); ?>">
                        <img class="align-content" src="<?php echo base_url('images/client_logo.png'); ?>" alt="">
                    </a>
                </div>
                <div class="login-form rounded">
					<?php
					if ($this->session->flashdata('Errormag')){?>
						<div class=" col-md-12">
							<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">

								<?php
								echo "{$this->session->flashdata('Errormag')}";

								?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">x</span>
								</button>
							</div>
						</div>


						<?php
					}else{

						echo"";
					}

					?>
					<?php	echo validation_errors();	?>
					<?php	echo form_open('form_controller/user_request');	?>
					<p class="register-link m-t-15 text-center text-danger"><strong>Admin request panel. If you want to be a part of this Inventory system, You can make request to your admin attention.</strong></p>
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="User Name" name="request_user_name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="request_email">
                        </div>
						<div class="row form-group">
							<div class="col col-md-3"><label for="select" class=" form-control-label">User Type</label></div>
							<div class="col-12 col-md-9">
								<select name="user_type" id="user_type" class="form-control">
									<option value=" ">Select Type</option>
									<option value="admin">ADMIN</option>
									<option value="staff">STAFF</option>

								</select>
							</div>
						</div>


                        <br><br>
                        
                        <button href="<?php //echo base_url('index.php/Welcome/dashboard'); ?>" type="submit" class=" btn btn-dark btn-flat m-b-30 m-t-30 rounded" name ="Send">Send</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/popper.js/dist/umd/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>


</body>

</html>
<?php


/*

function sign_in($email_or_phone,$password){

	$encryted_pwd = sha1($password);
	echo $email_or_phone;
	echo $encryted_pwd;

	$signin_user_q = $this->db->query( "SELECT `user_id`, `role`, `user_name`, `avataar` FROM `user` WHERE `user_email` = '{$email_or_phone}' OR `mobile` = '{$email_or_phone}' AND `password` = '{$encryted_pwd }'" );
	// = $this->db->query("SELECT * FROM `material`  GROUP BY `material_name`");
	if ($signin_user_q->num_rows() > 0) {
		$current_user['current_user'] = $signin_user_q->result();
		$_SESSION['usr_id'] = $current_user['current_user']->user_id;
		$_SESSION['usr_name'] = $current_user['current_user']->user_name;

		if ($current_user['current_user']->avataar != NULL){
			$_SESSION['usr_avatar'] = base64_encode($current_user['current_user']->avataar);
		}else{$_SESSION['usr_avatar'] = NULL;}

		$_SESSION['role'] = $current_user['current_user']->role;

		if ($current_user['role']=="admin") {
			header("location:admin.php");
		}else{
			header("location:index.php");
		}
		//echo $_SESSION['usr_id'];
		//echo $_SESSION['usr_name'];

	}else{
		echo "<script>alert('Incorrect email or password.')</script>";
	}

}


if (isset($_POST['signin'])) {
	sign_in($_POST['email_or_phone'], $_POST['pwd']);
	//echo "<p style='color: white;'>456</p>";
}

*/
?>
