<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>

	<link rel="stylesheet" href="<?php echo static_url('css/contact.css?v='.V); ?>">
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2 class="caps text-center">
							<strong><?php echo $page->title; ?></strong>
						</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 text-center">
						<h3 class="red caps"><strong><?php echo lang('contact_info'); ?></strong></h3>
						<br>
						<br>
						<br>
						<?php echo $page->body; ?>
					</div>
					<div class="col-sm-6">
						<h3 class="red caps"><strong><?php echo lang('contact_us'); ?></strong></h3>
						<?php $this->load->view('elements/messages'); ?>
						<form method="post">
							<div class="form-group">
								<?php echo lang('name', 'name'); ?>
								<input class="form-control" name="name" id="name"
									value="<?php echo set_value('name') ?>">
							</div>
							<div class="form-group">
								<?php echo lang('email', 'email'); ?>
								<input class="form-control" name="email" id="email"
									value="<?php echo set_value('email') ?>">
							</div>
							<div class="form-group">
								<?php echo lang('subject', 'subject'); ?>
								<input class="form-control" name="subject" id="subject"
									value="<?php echo set_value('subject') ?>">
							</div>
							<div class="form-group">
								<?php echo lang('message', 'message'); ?>
								<textarea name="message" id="message" cols="30" rows="10" class="form-control"><?php echo set_value('message'); ?></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="send-button" value="<?php echo lang('send'); ?>">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>
	</div>
</body>
</html>