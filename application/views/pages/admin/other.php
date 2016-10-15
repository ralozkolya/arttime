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
					<h1><?php echo lang('other'); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<h3><?php echo lang('social'); ?></h3>
					<form method="post" action="<?php echo base_url('admin/change_social'); ?>">
						<div class="form-group">
							<?php echo lang('facebook_swatch', 'facebook_swatch'); ?>
							<input class="form-control"
								type="text"
								id="facebook_swatch"
								name="facebook_swatch"
								value="<?php echo $social['facebook_swatch']; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('facebook_arttime', 'facebook_arttime'); ?>
							<input class="form-control"
								type="text"
								id="facebook_arttime"
								name="facebook_arttime"
								value="<?php echo $social['facebook_arttime']; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('instagram', 'instagram'); ?>
							<input class="form-control"
								type="text"
								id="instagram"
								name="instagram"
								value="<?php echo $social['instagram']; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('youtube', 'youtube'); ?>
							<input class="form-control"
								type="text"
								id="youtube"
								name="youtube"
								value="<?php echo $social['youtube']; ?>">
						</div>
						<div class="form-group">
							<input class="btn btn-default" type="submit"
								value="<?php echo lang('change'); ?>">
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>