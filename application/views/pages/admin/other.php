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
					<h3><?php echo lang('shops'); ?></h3>
					<?php if(!empty($shops)): ?>
						<table class="table table-striped">
							<?php foreach($shops as $s): ?>
								<tr>
									<td><?php echo $s->name; ?></td>
									<td class="glyph-container">
										<a href="<?php echo base_url('admin/shop/'.$s->id); ?>">
											<span class="glyphicon glyphicon-edit"></span>
										</a>
									</td>
									<td class="glyph-container">
										<a href="<?php echo base_url('admin/delete/Shop/'.$s->id); ?>" class="unstyled delete">
											<span class="glyphicon glyphicon-remove"></span>
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					<?php else: ?>
						<h4><?php echo lang('nothing_found'); ?></h4>
					<?php endif; ?>
				</div>
				<div class="col-sm-6">
					<h3><?php echo lang('add_shop'); ?></h3>
					<form method="post">
						<div class="form-group">
							<?php echo lang('ka_name', 'ka_name'); ?>
							<input type="text"
								class="form-control"
								name="ka_name"
								id="ka_name"
								value="<?php echo set_value('ka_name'); ?>">
						</div>
						<div class="form-group">
							<?php echo lang('en_name', 'en_name'); ?>
							<input type="text"
								class="form-control"
								name="en_name"
								id="en_name"
								value="<?php echo set_value('en_name'); ?>">
						</div>
						<div class="form-group">
							<?php echo lang('link', 'link'); ?>
							<input type="text"
								class="form-control"
								name="link"
								id="link"
								value="<?php echo set_value('link'); ?>">
						</div>
						<div class="form-group">
							<input class="btn btn-default" type="submit" value="<?php echo lang('add'); ?>"
						</div>
					</form>
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