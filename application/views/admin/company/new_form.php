<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/company/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/company/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Name*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" placeholder="Company name" />
								<div class="invalid-feedback">
									<?php echo form_error('company_name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Phone Number*</label>
								<input class="form-control <?php echo form_error('phone_number') ? 'is-invalid':'' ?>"
								 type="number" name="phone_number" min="0" placeholder="Company phone number" />
								<div class="invalid-feedback">
									<?php echo form_error('phone_number') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Address*</label>
								<textarea class="form-control <?php echo form_error('address') ? 'is-invalid':'' ?>"
								 name="address" placeholder="Company address..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('company_address') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Logo</label>
								<input class="form-control-file <?php echo form_error('logo') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<div class="invalid-feedback">
									<?php echo form_error('logo') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
