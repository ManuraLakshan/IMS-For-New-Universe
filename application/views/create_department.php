<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Department</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?=site_url('welcome/index')?>">Dashboard</a></li>
                    <li class="active">Add Department</li>
                </ol>
            </div>
        </div>
    </div>
 </div>

<?php if ($this->session->flashdata('status')): ?>
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success" style="font-family: serif; font-size: 15px; "><?= $this->session->flashdata('status'); ?>
        </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>


<div class="col-lg-12">
	<div class="card">

		<div class="card-header">
            <strong class="pull-right">
                <a href="<?= site_url('dep') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Back</i>
                </a>
            </strong>
        </div>

		<div class="card-body card-block">
			<form action="<?= base_url('index.php/dep/add') ?>" method="POST" enctype="multipart/form-data">
				<div class="row form-group">
					<div class="col col-md-3">
						<label class=" form-control-label">Department ID</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="text" name="dep_id" value="<?=set_value('dep_id')?>" placeholder="Enter Department ID" class="form-control">

						<span class="text-danger"><?php echo form_error('dep_id'); ?></span>
					</div>
				</div>

				<div class="row form-group">
					<div class="col col-md-3">
						<label class=" form-control-label">Department Name</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="text" name="dep_name" value="<?=set_value('dep_name')?>" placeholder="Enter Department Name" class="form-control">

						<span class="text-danger"><?php echo form_error('dep_name'); ?></span>
					</div>
				</div>

				<div class="row form-group">
					<div class="col col-md-3">
						<label class=" form-control-label">Email</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="Email" name="dep_email" value="<?=set_value('dep_email')?>" placeholder="Enter Department Email" class="form-control">

						<span class="text-danger"><?php echo form_error('dep_email'); ?></span>
					</div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3">
						<label class=" form-control-label">Contact</label>
					</div>
					<div class="col-12 col-md-9">
						<input type="text" name="dep_contact" value="<?=set_value('dep_contact')?>" placeholder="Enter Contact Number" class="form-control">

						<span class="text-danger"><?php echo form_error('dep_contact'); ?></span>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary btn rounded" name="add_department">
					<i class="fa fa-paper-plane"></i> Save
				</button>
				<button type="reset" class="btn btn-danger btn rounded" name="reset_department">
					<i class="fa fa-ban"></i> Reset
				</button>
			</div>
		</form>

	</div>
</div>




        