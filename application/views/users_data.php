<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Users List</strong>

                                <strong class="pull-right">
                            		<a href="<?= base_url('index.php/users/add') ?>" class="btn btn-primary btn-sm rounded">
                            			<i class="fa fa-user-plus"> Add Users</i>
                            		</a>
                            	</strong>
                            </div>

                            <!-- <?php if ($this->session->flashdata('status')): ?>
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success" style="font-family: serif; font-size: 15px; "><?= $this->session->flashdata('status'); ?>
                                    </span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?> -->

                            <!-- alert mag -->
                            <?php if ($this->session->flashdata('status')): ?>

                                <script>
                                    swal({
                                        title: "<?= $this->session->flashdata('status'); ?>",
                                        icon: "success",
                                        button: "Ok done",
                                    });
                                </script>
                                
                            <?php endif; ?>

                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>User Name</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>DOB</th>
                                            <th>Mobile</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                            foreach ($user as $item) : ?>
                                            
                                    		<tr>
	                                            <td><?=$no++?>.</td>
                                                <td>
                                                    <img src="<?= base_url('images/avatar/'.$item->avataar) ?>" height="50px" width="50px" alt="user Image" class="rounded">
                                                </td>
	                                            <td><?= $item->user_name ?></td>
                                                <td><?= $item->role ?></td>
                                                <td><?= $item->user_email ?></td>
	                                            <td><?= $item->DOB ?></td>
                                                <td><?= $item->mobile ?></td> 
	                                            <td class="text-center" >
	                                            	<form action="" method="post">
		                                            	<a href="<?= base_url('index.php/users/edit/'.$item->user_id) ?>" class="btn btn-success btn-sm rounded">
	                            							<i class="fa fa-pencil"> Update</i>
	                            						</a>
	                            						<a href="<?= base_url('index.php/users/delete/'.$item->user_id) ?>" class="btn btn-danger btn-sm rounded" onclick="return confirm('Are you sure you want to delete this?')">
	                            							<i class="fa fa-trash"> Delete</i>
	                            						</a>
                            						</form>
                            					</td>
                                        	</tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>