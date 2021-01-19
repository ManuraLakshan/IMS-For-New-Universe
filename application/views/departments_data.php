<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Deparment List</strong>

                                <strong class="pull-right">
                            		<a href="<?= base_url('index.php/dep/add') ?>" class="btn btn-primary btn-sm rounded">
                            			<i class="fa fa-plus-square"> Add Department</i>
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
                                            <th>Department ID</th>
                                            <th>Department Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                            foreach ($department as $item) : ?>
                                            
                                    		<tr>
	                                            <td><?=$no++?>.</td>
	                                            <td><?= $item->dep_id ?></td>
                                                <td><?= $item->dep_name ?></td>
	                                            <td><?= $item->dep_email ?></td>
                                                <td><?= $item->dep_contact ?></td> 
                                                <td class="text-center" >
	                                            	<form action="" method="post">
		                                            	<a href="<?= base_url('index.php/dep/edit/'.$item->dep_id) ?>" class="btn btn-success btn-sm rounded">
	                            							<i class="fa fa-pencil"> Update</i>
	                            						</a>
	                            						<a href="<?= base_url('index.php/dep/delete/'.$item->dep_id) ?>" class="btn btn-danger btn-sm rounded" onclick="return confirm('Are you sure you want to delete this?')">
	                            							<i class="fa fa-trash"> Delete</i>
	                            						</a>

                                                        <!-- <a onclick="deleteData()" class="btn btn-danger btn-sm rounded">
                                                            <i class="fa fa-trash"> Delete</i>
                                                        </a> -->
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
            </div>
        </div>

        

<!-- <script>
    function deleteData()
    {
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
    }
</script>    -->    