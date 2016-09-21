<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>

	<link rel="stylesheet" href="<?php echo static_url('css/brands.css?v='.V); ?>">
	
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container">
				<div class="row">
					<?php foreach($brands as $b): ?>
						<div class="col-sm-4 col-md-3 brand">
							<img alt="<?php echo $b->image; ?>"
								src="<?php echo static_url('uploads/brands/'.$b->image); ?>">
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>
	</div>
</body>
</html>