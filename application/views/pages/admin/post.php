<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<script>
		var category = <?php echo $post->category; ?>;
	</script>
	<script src="<?php echo static_url('js/admin/post.js?v='.V); ?>"></script>
</head>
<body>
	<?php $this->load->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $post->ka_title; ?></h1>
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
						<input type="hidden" name="id" value="<?php echo $post->id; ?>">
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
								value="<?php echo $post->ka_title; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('en_title', 'en_title'); ?>
							<input
								class="form-control"
								name="en_title"
								id="en_title"
								value="<?php echo $post->en_title; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('ka_body', 'ka_body'); ?>
							<textarea
								class="ckeditor"
								name="ka_body"
								id="ka_body">
								<?php echo $post->ka_body; ?>
							</textarea>
						</div>
						<div class="form-group">
							<?php echo lang('en_body', 'en_body'); ?>
							<textarea
								class="ckeditor"
								name="en_body"
								id="en_body">
								<?php echo $post->en_body; ?>
							</textarea>
						</div>
						<div class="form-group">
							<?php echo lang('image_post', 'image'); ?>
							<input class="form-control" type="file" name="image" id="image">
						</div>
						<div class="form-group">
							<input class="btn btn-default" type="submit" value="<?php echo lang('change'); ?>">
							<a class="btn btn-primary" href="<?php echo base_url('admin/information'); ?>"><?php echo lang('back'); ?></a>
						</div>
					</form>
				</div>
				<div class="col-sm-6">
					<img alt="<?php $post->image; ?>" src="<?php echo static_url('uploads/news/'.$post->image); ?>">
				</div>
			</div>	
		</div>
	</div>
</body>
</html>