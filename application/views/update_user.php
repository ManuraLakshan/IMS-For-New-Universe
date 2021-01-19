<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?=site_url('welcome/index')?>">Dashboard</a></li>
                            <li class="active">Update User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="container">

                        <!-- <?php if ($this->session->flashdata('status')): ?>
                            <div class="alert alert-success">
                                <?= $this->session->flashdata('status'); ?>
                            </div>
                        <?php endif; ?> -->

                        <div class="card">
                            <div class="card-header">
								<strong class="card-title">Update User</strong>
                                <strong class="pull-right">
                                    <a href="<?= site_url('users') ?>" class="btn btn-warning btn-flat rounded">
                                        <i class="fa fa-undo"> Back</i>
                                    </a>
                                </strong>
                            </div>    
                        </div>
                        <div class="card-body card-block">
                        	<!-- avataar -->
                            <div>
                    			<img src="<?= base_url('images/avatar/'.$user->avataar) ?>" width = "130px" height = "130px" class="d-block mx-auto rounded-circle" alt="Image">
                    			<br>
                    				<!-- <h5 class="text-center text-danger" style="font-family: monospace;"><b><?= $user->role; ?></b>
                    				</h5> -->
                    		</div>
                                <div class="row form-group">
                                    <div class="col-sm-4 offset-sm-4">

                                        <form action="<?= base_url('index.php/users/update/'.$user->user_id) ?>" method="POST" enctype="multipart/form-data">
                                            
                                            <div class="form-group">
                                                <label>User Name *</label>
                                                <input type="hidden" name="uid" value="<?= $user->user_id?>">
                                                <input type="text" name="uname" value="<?=$this->input->post('uname') ?? $user->user_name; ?>" class="form-control" placeholder="Enter User Name">
                                                <span class="text-danger"><?php echo form_error('uname'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="email" name="email" value="<?=$this->input->post('email') ?? $user->user_email; ?>" class="form-control" placeholder="Enter User Email">
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Role *</label>
                                                <select name="role" class="form-control">
												<?php $role = $this->input->post('role') ? $this->input->post('role') : $user->role ?>
                                                    <option >ADMIN</option>
                                                    <option >STAFF</option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('role'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Date Of Birth *</label>
                                                <input type="date" name="dob" value="<?=$this->input->post('dob') ?? $user->DOB; ?>" class="form-control" placeholder="Enter Date of Birth">
                                                <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile *</label>
                                                <input type="text" name="mobile" value="<?=$this->input->post('mobile') ?? $user->mobile; ?>" class="form-control" placeholder="Enter Phone Number">
                                                <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control" placeholder="Enter Address"><?=$this->input->post('address') ?? $user->address; ?></textarea> 
                                                <span class="text-danger"><?php echo form_error('address'); ?></span>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label>Password *</label>
                                                <input type="Password" name="password" value="" class ="form-control" placeholder="Enter Password">
                                                <span class="text-danger"><?php echo form_error('password');?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Password Conformation *</label>
                                                <input type="Password" name="passconf" value="" class="form-control" placeholder="Re Enter Password">
                                                <span class="text-danger"><?php echo form_error('passconf');?></span>
                                            </div> -->
                                            <div class="form-group">
                                                <label>Avataar *</label>
                                                <input type="hidden" name="old_user_image" value="<?= $user->avataar; ?>">
                                                <input type="file" name="user_image" >
                                                <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="user_update" class="btn btn-success btn-flat rounded">
                                                    <i class="fa fa-edit"> Update</i>
                                                </button>
                                                <button type="reset" class="btn btn-danger btn rounded">
                                                    <i class="fa fa-ban"> Reset</i>
                                                </button>
                                            </div>  
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
