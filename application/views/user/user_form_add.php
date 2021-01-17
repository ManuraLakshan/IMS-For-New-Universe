
<?php include 'header.php' ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?=site_url('welcome/index')?>">Dashboard</a></li>
                            <li class="active">Add User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add User</strong>

                                <strong class="pull-right">
                            		<a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                            			<i class="fa fa-undo"> Back</i>
                            		</a>
                            	</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                	<div class="col-sm-4 offset-sm-4">
                                		<form action="" method="post">
                                			<div class="form-group">
                                				<label>User Id *</label>
                                				<input type="text" name="uid" value="<?=set_value('uid')?>" class="form-control">
                                				<span class="text-danger"><?php echo form_error('uid'); ?></span>
                                			</div>
                                			<div class="form-group">
                                				<label>User Name *</label>
                                				<input type="text" name="uname" value="<?=set_value('uname')?>" class="form-control">
                                				<span class="text-danger"><?php echo form_error('uname'); ?></span>
                                			</div>
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="email" name="email" value="<?=set_value('email')?>" class="form-control">
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Role *</label>
                                                <select name="role" class="form-control">
                                                    <option value="">- none -</option>
                                                    <option >ADMIN</option>
                                                    <option >STAFF</option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('role'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Date Of Birth *</label>
                                                <input type="date" name="dob" value="<?=set_value('dob')?>" class="form-control">
                                                <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile *</label>
                                                <input type="text" name="mobile" value="<?=set_value('mobile')?>" class="form-control">
                                                <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control"><?=set_value('address')?></textarea> 
                                                <span class="text-danger"><?php echo form_error('address'); ?></span>
                                            </div>
                                			<div class="form-group">
                                				<label>Password *</label>
                                				<input type="Password" name="password" value="<?=set_value('password')?>" class="form-control">
                                				<span class="text-danger"><?php echo form_error('password');?></span>
                                			</div>
                                			<div class="form-group">
                                				<label>Password Conformation *</label>
                                				<input type="Password" name="passconf" value="<?=set_value('passconf')?>" class="form-control">
                                				<span class="text-danger"><?php echo form_error('passconf');?></span>
                                			</div>
                                            <div class="form-group">
                                                <label>Avataar *</label>
                                                <input type="file" name="avataar" value="<?=set_value('avataar')?>" class="">
                                                <!-- <span class="text-danger"><?php echo form_error('avataar');?></span> -->
                                            </div>
                                			<div class="form-group">
                                				<button type="submit" class="btn btn-success btn-flat">
                                					<i class="fa fa-paper-plane"> Save</i>
                                				</button>
                                				<button type="reset" class="btn btn-flat">Reset</button>
                                			</div>	
                                		</form>
                                	</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php include 'footer.php' ?>
