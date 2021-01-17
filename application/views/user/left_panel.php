
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""><img src="<?php echo base_url('images/client_logo.png'); ?>" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url('images/logo2.png'); ?>" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href=""> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <h3 class="menu-title">Inventory Management</h3>
                    <li class="menu-item-has-children ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Inventory</a>
                        <ul class="sub-menu children dropdown-menu">




                            <li><i class="fa ti-import"></i><a href="<?php echo base_url('index.php/AddInventoryController/loadAddInventoryView'); ?>">Add Inventory</a></li>
                            <li><i class="menu-icon fa fa-window-restore"></i><a href="<?php echo base_url('index.php/Bom_c/add_bom'); ?>">Add Bom</a></li>
                            <li><i class="menu-icon fa fa-window-restore"></i><a href="<?php echo base_url('index.php/Bom_c/view_bom'); ?>">View Bom</a></li>
                            <li><i class="menu-icon fa fa-calendar-plus-o"></i><a href="<?php echo base_url('index.php/Welcome/check_requirement'); ?>">Check Requirement</a></li>
							<li><i class="menu-icon fa fa-retweet"></i><a href="<?php echo base_url('index.php/Welcome/Add_Damaged_Goods'); ?>">Add Damaged Goods</a></li>
							<li><i class="menu-icon fa fa-cubes"></i><a href="<?php echo base_url('index.php/Welcome/Order_Goods'); ?>">Order Goods</a></li>


                        </ul>
                    </li>

                   

                   <!-- /.menu-title -->



                </ul>
            </div>
        </nav>
    </aside>
