<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>

	<link rel="stylesheet" href="<?php echo static_url('css/post.css?v='.V); ?>">
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-center">
						<img src="<?php echo static_url('uploads/news/'.$post->image); ?>" alt="<?php echo $post->title; ?>">
					</div>
					<div class="col-sm-6">
						<div class="text-right">
							<strong><?php echo date('Y-m-d', strtotime($post->modified)); ?></strong>
						</div>
						<h2 class="caps text-center">
							<strong><?php echo $post->title; ?></strong>
						</h2>
						<br><br>
						<p><?php echo $post->body; ?></p>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>
	</div>
</body>
</html>