<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<script src="<?php echo static_url('js/admin/pages.js?v='.V); ?>"></script>
	<script src="<?php echo static_url('js/admin/page.js?v='.V); ?>"></script>
</head>
<body>
	<?php $this->load->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $page->title; ?></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<form method="post">
						<input type="hidden" name="id" value="<?php echo $page->id; ?>">
						<div class="form-group">
							<?php echo lang('ka_title', 'ka_title'); ?>
							<input class="form-control" type="text" name="ka_title" value="<?php echo $page->ka_title; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('en_title', 'en_title'); ?>
							<input class="form-control" type="text" name="en_title" value="<?php echo $page->en_title; ?>">
						</div>
						<div class="form-group">
							<?php echo lang('priority_description', 'priority'); ?>
							<input class="form-control" type="text" name="priority" value="<?php echo $page->priority; ?>">
						</div>
						<?php if($page->editable): ?>
							<div class="form-group">
								<?php echo lang('ka_body', 'ka_body'); ?>
								<textarea class="form-control ckeditor" name="ka_body"><?php echo $page->ka_body; ?></textarea>
							</div>
							<div class="form-group">
								<?php echo lang('en_body', 'en_body'); ?>
								<textarea class="form-control ckeditor" name="en_body"><?php echo $page->en_body; ?></textarea>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<input class="btn btn-default" type="submit" value="<?php echo lang('change'); ?>">
							<a href="<?php echo base_url('admin/pages'); ?>" class="btn btn-primary"><?php echo lang('back'); ?></a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>