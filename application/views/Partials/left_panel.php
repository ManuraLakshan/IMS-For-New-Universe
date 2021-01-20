<?php if($_SESSION["Roll"] == "admin"){ ?>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('index.php/Welcome/logoButton'); ?>"><img src="<?php echo base_url('images/client_logo.png'); ?>" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url('images/logo2.png'); ?>" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url('index.php/Welcome/view_inventory'); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <h3 class="menu-title">Inventory Management</h3>
                    <li class="menu-item-has-children ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Inventory</a>
                        <ul class="sub-menu children dropdown-menu">



							<li><i class="fa ti-package" aria-hidden="true"></i><a href="<?php echo base_url('index.php/Welcome/view_inventory'); ?>">View Inventory</a></li>
							<li><i class="menu-icon fa fa-trash"></i><a href="<?php echo base_url('index.php/Welcome/View_Damaged_Goods'); ?>">View Damaged Goods</a></li>
                            <li><i class="menu-icon fa fa-window-restore"></i><a href="<?php echo base_url('index.php/AddBomController/loadAddBomView'); ?>">Add Bom</a></li>
                            <li><i class="menu-icon fa fa-window-restore"></i><a href="<?php echo base_url('index.php/ViewBomController/loadViewBomView'); ?>">View Bom</a></li>



                      </ul>
                    </li>
					<h3 class="menu-title">Department</h3><!-- /.menu-title -->
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Departments</a>
						<ul class="sub-menu children dropdown-menu">

							<li><i class="menu-icon fa fa-calendar-plus-o"></i><a href="<?= site_url('dep/add')?>">Add Departments</a></li>
							<li><i class="menu-icon fa fa-window-restore"></i><a href="<?= site_url('dep')?>">Manage Departments</a></li>
						</ul>
					</li>

					<h3 class="menu-title">People</h3>
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Users</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="menu-icon fa fa-user-plus"></i><a href="<?= site_url('users/add')?>">Add User</a></li>
							<li><i class="menu-icon fa fa-users"></i><a href="<?php echo site_url('users'); ?>">Manage Users</a></li>
							<li><i class="menu-icon fa fa-user"></i><a href="<?php echo base_url('index.php/LogBookController/loadLogBookView'); ?>">Manage User Logbook</a></li>

						</ul>
						<p style="color: white;" id="user_request"></p>
					</li>


                </ul>
            </div>
        </nav>
    </aside>
<?php }else{ ?>
	<aside id="left-panel" class="left-panel">
		<nav class="navbar navbar-expand-sm navbar-default">

			<div class="navbar-header">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand" href="<?php echo base_url('index.php/Welcome/logoButton'); ?>"><img src="<?php echo base_url('images/client_logo.png'); ?>" alt="Logo"></a>
				<a class="navbar-brand hidden" href="./"><img src="<?php echo base_url('images/logo2.png'); ?>" alt="Logo"></a>
			</div>

			<div id="main-menu" class="main-menu collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="<?php echo base_url('index.php/Welcome/view_inventory'); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
					</li>

					<h3 class="menu-title">Inventory Management</h3>
					<li class="menu-item-has-children ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Inventory</a>
						<ul class="sub-menu children dropdown-menu">



							<li><i class="fa ti-package" aria-hidden="true"></i><a href="<?php echo base_url('index.php/Welcome/view_inventory'); ?>">View Inventory</a></li>
							<li><i class="menu-icon fa fa-trash"></i><a href="<?php echo base_url('index.php/Welcome/View_Damaged_Goods'); ?>">View Damaged Goods</a></li>
							<li><i class="fa ti-import"></i><a href="<?php echo base_url('index.php/AddInventoryController/loadAddInventoryView'); ?>">Add Inventory</a></li>
							<li><i class="menu-icon fa fa-window-restore"></i><a href="<?php echo base_url('index.php/AddBomController/loadAddBomView'); ?>">Add Bom</a></li>
							<li><i class="menu-icon fa fa-window-restore"></i><a href="<?php echo base_url('index.php/ViewBomController/loadViewBomView'); ?>">View Bom</a></li>
							<li><i class="menu-icon fa fa-calendar-plus-o"></i><a href="<?php echo base_url('index.php/Welcome/check_requirement'); ?>">Check Requirement</a></li>
							<li><i class="menu-icon fa fa-retweet"></i><a href="<?php echo base_url('index.php/Welcome/Add_Damaged_Goods'); ?>">Add Damaged Goods</a></li>
							<li><i class="menu-icon fa fa-cubes"></i><a href="<?php echo base_url('index.php/Welcome/Order_Goods'); ?>">Order Goods</a></li>


						</ul>
					</li>
					<!--h3 class="menu-title">Department</h3>
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Departments</a>
						<ul class="sub-menu children dropdown-menu">

							<li><i class="menu-icon fa fa-window-restore"></i><a href="">List Departments</a></li>
							<li><i class="menu-icon fa fa-calendar-plus-o"></i><a href="">Add Departments</a></li>
							<li><i class="menu-icon fa fa-calendar-times-o"></i><a href="">Delete Departments</a></li>
						</ul>
					</li>

					<h3 class="menu-title">People</h3>
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Users</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="menu-icon fa fa-user-plus"></i><a href="<?php //site_url('user/add')?>">Add User</a></li>
							<li><i class="menu-icon fa fa-users"></i><a href="<?php// echo site_url('user'); ?>">Manage Users</a></li>
							<li class="dropdown"><i class="menu-icon fa fa-bell-o abc" ></i><a href="">User Requests</a></li>

						</ul>
						<p style="color: white;" id="user_request"></p>
					</li-->


				</ul>
			</div>
		</nav>
	</aside>
<?php } ?>
	
