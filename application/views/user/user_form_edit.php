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
                            <li class="active">Edit User</li>
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
                                <strong class="card-title">Edit User</strong>

                                <strong class="pull-right">
                            		<a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                            			<i class="fa fa-undo"> Back</i>
                            		</a>
                            	</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                	<div class="col-sm-4 offset-sm-4">
                                		<form action="" method="post">
                                			<!-- <div class="form-group <?=form_error('uid') ? 'has-error' : null?>">
                                				<label>User Id *</label>

                                				<input type="hidden" name="uid" value="<?=$row->user_id?>">

                                				<input type="text" name="uid" value="<?=$this->input->post('uid') ?? $row->user_id?>" class="form-control">
                                				<?=form_error('uid')?>
                                			</div> -->
                                			<div class="form-group">
                                				<label>User Name *</label>
                                                <input type="hidden" name="uid" value="<?=$row->user_id?>">
                                				<input type="text" name="uname" value="<?=$this->input->post('uname') ?? $row->user_name?>" class="form-control">
                                				<span class="text-danger"><?php echo form_error('uname');?></span>
                                			</div>
                                			<div class="form-group">
                                				<label>Email *</label>
                                				<input type="email" name="email" value="<?=$this->input->post('email') ?? $row->user_email?>" class="form-control">
                                				<span class="text-danger"><?php echo form_error('email');?></span>
                                			</div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select name="role" class="form-control">
                                                    <?php $role = $this->input->post('role') ? $this->input->post('role') : $row->role ?>
                                                    <option>ADMIN</option>
                                                    <option>STAFF</option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('role');?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Date Of Birth *</label>
                                                <input type="date" name="dob" value="<?=$this->input->post('dob') ?? $row->DOB?>" class="form-control">
                                                <span class="text-danger"><?php echo form_error('dob');?></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Mobile *</label>
                                                <input type="text" name="mobile" value="<?=$this->input->post('mobile') ?? $row->mobile?>" class="form-control">
                                                <span class="text-danger"><?php echo form_error('mobile');?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Address *</label>
                                                <textarea name="address" class="form-control"><?=$this->input->post('address') ?? $row->address?></textarea> 
                                                <span class="text-danger"><?php echo form_error('address');?></span>
                                            </div>
                                			<div class="form-group">
                                				<label>Password</label>
                                				<input type="Password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                                				<span class="text-danger"><?php echo form_error('password');?></span>
                                			</div>
                                			<div class="form-group">
                                				<label>Password Conformation</label>
                                				<input type="Password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control">
                                				<span class="text-danger"><?php echo form_error('passconf');?></span>
                                			</div>
                                            <div class="form-group">
                                                <label>Avataar *</label>
                                                <input type="file" name="avataar" value="<?=$this->input->post('avataar')?>">
                                                <span class="text-danger"><?php echo form_error('avataar');?></span>
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