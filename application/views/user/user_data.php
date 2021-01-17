<?php include 'header.php' ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Users</strong>

                                <strong class="pull-right">
                            		<a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                            			<i class="fa fa-user-plus "> Create</i>
                            		</a>
                            	</strong>
                            </div>

                            <?php
                                if ($this->session->flashdata('pass')){?>
                                <div class=" col-md-12">
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Successfully</span>
                                        <?php
                                            echo "{$this->session->flashdata('pass')}";

                                        ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>

                                <?php
                                        }else{

                                    echo"";
                                }
                            ?>

                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>DOB</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php $no = 1;
                                    		foreach ($row->result() as $key => $data) { ?>

                                    		<tr>
	                                            <td><?=$no++?>.</td>
                                                <!--  <td><?=$data->user_id?>.</td> -->
	                                            <td><?=$data->user_name?></td>
	                                            <td><?=$data->user_email?></td>
                                                <td><?=$data->DOB?></td>
                                                <td><?=$data->mobile?></td>
                                                <td><?=$data->address?></td>
                                                <td><?=$data->role?></td>
	                                            <td class="text-center" >
	                                            	<form action="<?=site_url('user/del')?>" method="post">
		                                            	<a href="<?=site_url('user/edit/'.$data->user_id)?>" class="btn btn-primary btn-xs">
	                            							<i class="fa fa-pencil"> Update</i>
	                            						</a>
                            						
                            							<input type="hidden" name="user_id" value="<?=$data->user_id?>">
	                            						<button onclick="return confirm('Delete Record')" class="btn btn-danger btn-xs">
	                            							<i class="fa fa-trash"> Delete</i>
	                            						</button>
                            						</form>
                            					</td>
                                        	</tr>

                                    	<?php
                                    		} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php include 'footer.php' ?>

