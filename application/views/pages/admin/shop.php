<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
</head>
<body>
	<?php $this->load->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $shop->ka_name; ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<form method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $shop->id; ?>">
						<div class="form-group">
							<?php echo lang('ka_name', 'ka_name'); ?>
							<input type="text"
								class="form-control"
								name="ka_name"
								id="ka_name"
								value="<?php echo $shop->ka_name; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('en_name', 'en_name'); ?>
							<input type="text"
								class="form-control"
								name="en_name"
								id="en_name"
								value="<?php echo $shop->en_name; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('link', 'link'); ?>
							<input type="text"
								class="form-control"
								name="link"
								id="link"
								value="<?php echo $shop->link; ?>">
						</div>
						<div class="form-group">
							<input class="btn btn-default" type="submit" value="<?php echo lang('change'); ?>">
							<a class="btn btn-primary" href="<?php echo base_url('admin/other'); ?>"><?php echo lang('back'); ?></a>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>