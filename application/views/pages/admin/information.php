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
					<h1><?php echo lang('information'); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<h3><?php echo lang('existing_news'); ?></h3>
					<table class="table table-striped">
						<?php foreach($information as $i): ?>
							<tr>
								<td><?php echo $i->title; ?></td>
								<td>
								<?php
									switch($i->category) {
										case 1:
											echo lang('news');
											break;

										case 2:
											echo lang('tips');
											break;

										case 3:
											echo lang('service');
											break;
									}
								?>
								</td>
								<td class="glyph-container">
									<a href="<?php echo base_url('admin/post/'.$i->id); ?>">
										<span class="glyphicon glyphicon-edit"></span>
									</a>
								</td>
								<td class="glyph-container">
									<a href="<?php echo base_url('admin/delete/News/'.$i->id); ?>" class="unstyled delete">
										<span class="glyphicon glyphicon-remove"></span>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-sm-6">
					<h3><?php echo lang('add_post'); ?></h3>
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<?php echo lang('category', 'category'); ?>
							<select
								class="form-control"
								name="category"
								id="category">
								<option value="1"><?php echo lang('news') ?></option>
								<option value="2"><?php echo lang('tips') ?></option>
								<option value="3"><?php echo lang('service') ?></option>
							</select>
						</div>
						<div class="form-group">
							<?php echo lang('ka_title', 'ka_title'); ?>
							<input
								class="form-control"
								name="ka_title"
								id="ka_title"
								value="<?php echo set_value('ka_title'); ?>">
						</div>
						<div class="form-group">
							<?php echo lang('en_title', 'en_title'); ?>
							<input
								class="form-control"
								name="en_title"
								id="en_title"
								value="<?php echo set_value('en_title'); ?>">
						</div>
						<div class="form-group">
							<?php echo lang('ka_body', 'ka_body'); ?>
							<textarea
								class="ckeditor"
								name="ka_body"
								id="ka_body">
								<?php echo set_value('ka_body'); ?>
							</textarea>
						</div>
						<div class="form-group">
							<?php echo lang('en_body', 'en_body'); ?>
							<textarea
								class="ckeditor"
								name="en_body"
								id="en_body">
								<?php echo set_value('en_body'); ?>
							</textarea>
						</div>
						<div class="form-group">
							<?php echo lang('image_post', 'image'); ?>
							<input class="form-control" type="file" name="image" id="image">
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