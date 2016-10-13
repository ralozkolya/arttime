<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>

	<link rel="stylesheet" href="<?php echo static_url('css/admin/branches.css?v='.V); ?>">

	<script>
		var loc = {
			latitude: <?php echo $branch->latitude; ?>,
			longitude: <?php echo $branch->longitude; ?>,
		}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKjFhr8HXMMYDW5ZMO0sfrmWhkWXdxSvw"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>
	<script src="<?php echo static_url('js/admin/branches.js?v='.V); ?>"></script>
</head>
<body>
	<?php $this->load->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $branch->ka_address; ?></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<h3><?php echo lang('edit_branch'); ?></h3>
					<form method="post">
						<input type="hidden" name="id" value="<?php echo $branch->id; ?>">
						<input type="hidden" name="latitude" id="latitude">
						<input type="hidden" name="longitude" id="longitude">
						<div class="form-group">
							<?php echo lang('ka_location', 'ka_location'); ?>
							<input
								class="form-control"
								name="ka_location"
								id="ka_location"
								value="<?php echo $branch->ka_location; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('en_location', 'en_location'); ?>
							<input
								class="form-control"
								name="en_location"
								id="en_location"
								value="<?php echo $branch->en_location; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('ka_address', 'ka_address'); ?>
							<input
								class="form-control"
								name="ka_address"
								id="ka_address"
								value="<?php echo $branch->ka_address; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('en_address', 'en_address'); ?>
							<input
								class="form-control"
								name="en_address"
								id="en_address"
								value="<?php echo $branch->en_address; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('ka_description', 'ka_description'); ?>
							<textarea
								class="ckeditor"
								name="ka_description"
								id="ka_description">
								<?php echo $branch->ka_description; ?>
							</textarea>
						</div>
						<div class="form-group">
							<?php echo lang('en_description', 'en_description'); ?>
							<textarea
								class="ckeditor"
								name="en_description"
								id="en_description">
								<?php echo $branch->en_description; ?>
							</textarea>
						</div>
						<div class="form-group">
							<?php echo lang('working_hours', 'working_hours'); ?>
							<input
								class="form-control"
								name="working_hours"
								id="working_hours"
								value="<?php echo $branch->working_hours; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('phone', 'phone'); ?>
							<input
								class="form-control"
								name="phone"
								id="phone"
								value="<?php echo $branch->phone; ?>">
						</div>
						<div class="form-group">
							<div id="location-picker"></div>
						</div>
						<div class="form-group">
							<input class="btn btn-default" type="submit" value="<?php echo lang('change'); ?>">
							<a class="btn btn-primary" href="<?php echo base_url('admin/branches'); ?>"><?php echo lang('back'); ?></a>
						</div>
					</form>
				</div>
				<div class="col-sm-6">
					<h3><?php echo lang('gallery'); ?></h3>
					<form action="<?php echo base_url('admin/upload_images'); ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="branch" value="<?php echo $branch->id; ?>">
						<div class="form-group">
							<?php echo lang('upload_recommended', 'image'); ?>
							<input class="form-control" type="file" name="images[]" id="image" multiple required>
						</div>
						<div class="form-group">
							<input class="btn btn-default" type="submit" value="<?php echo lang('upload'); ?>">
						</div>
					</form>
					<br>
					<?php foreach($gallery as $g): ?>
						<div class="thumb">
							<img alt="<?php echo $g->image; ?>" src="<?php echo static_url('uploads/branches/thumbs/'.$g->image); ?>">
							<a href="<?php echo base_url('admin/delete/Branch_gallery/'.$g->id); ?>" class="unstyled delete">
								<span class="glyphicon glyphicon-remove"></span>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>