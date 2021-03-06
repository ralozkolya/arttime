<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>

	<link rel="stylesheet" href="<?php echo static_url('css/admin/branches.css?v='.V); ?>">

	<script>
		var loc = {
			latitude: 41.720910728527635,
			longitude: 44.78495669364929,
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
					<h1><?php echo lang('branches'); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<h3><?php echo lang('existing_branches'); ?></h3>
					<table class="table table-striped">
						<?php foreach($branches as $b): ?>
							<tr>
								<td><?php echo $b->location; ?></td>
								<td><?php echo $b->address; ?></td>
								<td class="glyph-container">
									<a href="<?php echo base_url('admin/branch/'.$b->id); ?>">
										<span class="glyphicon glyphicon-edit"></span>
									</a>
								</td>
								<td class="glyph-container">
									<a href="<?php echo base_url('admin/delete/Branch/'.$b->id); ?>" class="unstyled delete">
										<span class="glyphicon glyphicon-remove"></span>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-sm-6">
					<h3><?php echo lang('add_branch'); ?></h3>
					<form method="post" enctype="multipart/form-data">
						<input type="hidden" name="latitude" id="latitude">
						<input type="hidden" name="longitude" id="longitude">
						<div class="form-group">
							<?php echo lang('ka_location', 'ka_location'); ?>
							<input
								class="form-control"
								name="ka_location"
								id="ka_location"
								value="<?php echo set_value('ka_location'); ?>">
						</div>
						<div class="form-group">
							<?php echo lang('en_location', 'en_location'); ?>
							<input
								class="form-control"
								name="en_location"
								id="en_location"
								value="<?php echo set_value('en_location'); ?>">
						</div>
						<div class="form-group">
							<?php echo lang('ka_address', 'ka_address'); ?>
							<input
								class="form-control"
								name="ka_address"
								id="ka_address"
								value="<?php echo set_value('ka_address'); ?>">
						</div>
						<div class="form-group">
							<?php echo lang('en_address', 'en_address'); ?>
							<input
								class="form-control"
								name="en_address"
								id="en_address"
								value="<?php echo set_value('en_address'); ?>">
						</div>
						<div class="form-group">
							<?php echo lang('ka_description', 'ka_description'); ?>
							<textarea
								class="ckeditor"
								name="ka_description"
								id="ka_description">
								<?php echo set_value('ka_description'); ?>
							</textarea>
						</div>
						<div class="form-group">
							<?php echo lang('en_description', 'en_description'); ?>
							<textarea
								class="ckeditor"
								name="en_description"
								id="en_description">
								<?php echo set_value('en_description'); ?>
							</textarea>
						</div>
						<div class="form-group">
							<?php echo lang('images', 'images'); ?>
							<input
								class="form-control"
								name="images[]"
								id="images"
								type="file" multiple>
						</div>
						<div class="form-group">
							<?php echo lang('working_hours', 'working_hours'); ?>
							<input
								class="form-control"
								name="working_hours"
								id="working_hours"
								value="<?php echo set_value('working_hours'); ?>">
						</div>
						<div class="form-group">
							<?php echo lang('phone', 'phone'); ?>
							<input
								class="form-control"
								name="phone"
								id="phone"
								value="<?php echo set_value('phone'); ?>">
						</div>
						<div class="form-group">
							<div id="location-picker"></div>
						</div>
						<div class="form-group">
							<input class="btn btn-default" type="submit" value="<?php echo lang('add'); ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>