<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add User</h1>
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

        <div class="content mt-3 ">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="container">

                        <!-- <?php if ($this->session->flashdata('status')): ?>
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                <span class="badge badge-pill badge-success" style="font-family: serif; font-size: 15px; "><?= $this->session->flashdata('status'); ?>
                                </span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
 -->
                        <div class="card">
                            <div class="card-header">
								<strong class="card-title">Add User</strong>
                                <strong class="pull-right">
                                    <a href="<?= site_url('users') ?>" class="btn btn-warning btn-flat rounded">
                                        <i class="fa fa-undo"> Back</i>
                                    </a>
                                </strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col-sm-4 offset-sm-4">

                                        <form action="<?= base_url('index.php/users/add') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>User Id *</label>
                                                <input type="text" name="uid" value="<?=set_value('uid')?>" class="form-control" placeholder="Enter User Id">
                                                <span class="text-danger"><?php echo form_error('uid'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>User Name *</label>
                                                <input type="text" name="uname" value="<?=set_value('uname')?>" class="form-control" placeholder="Enter User Name">
                                                <span class="text-danger"><?php echo form_error('uname'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="email" name="email" value="<?=set_value('email')?>" class="form-control" placeholder="Enter User Email">
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Role *</label>
                                                <select name="role" class="form-control">
                                                    <option value="<?=set_value('role')?>">- none -</option>
                                                    <option >ADMIN</option>
                                                    <option >STAFF</option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('role'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Date Of Birth *</label>
                                                <input type="date" name="dob" value="<?=set_value('dob')?>" class="form-control" placeholder="mm/dd/yyyy">
                                                <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile *</label>
                                                <input type="text" name="mobile" value="<?=set_value('mobile')?>" class="form-control" placeholder="Enter Contact Number">
                                                <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control" placeholder="Enter Address"><?=set_value('address')?></textarea> 
                                                <span class="text-danger"><?php echo form_error('address'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input type="Password" name="password" value="<?=set_value('password')?>" class ="form-control" placeholder="Enter Password">
                                                <span class="text-danger"><?php echo form_error('password');?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Password Conformation *</label>
                                                <input type="Password" name="passconf" value="<?=set_value('passconf')?>" class="form-control" placeholder="Re Enter Password">
                                                <span class="text-danger"><?php echo form_error('passconf');?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Avataar *</label>
                                                <input type="file" name="user_image" value="<?=set_value('user_image')?>">
                                                <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-flat rounded">
                                                    <i class="fa fa-paper-plane"> Save</i>
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
