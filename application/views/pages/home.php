<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/css/unslider.css">
	<link rel="stylesheet" href="<?php echo static_url('css/unslider-dots.css?v='.V); ?>">
	<link rel="stylesheet" href="<?php echo static_url('css/home.css?v='.V); ?>">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/js/unslider-min.js"></script>
	<script src="<?php echo static_url('js/home.js?v='.V); ?>"></script>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 banner-container">
						<?php $this->load->view('elements/banners'); ?>
					</div>
				</div>
			</div>

			<div class="separator white" id="brands"></div>
			<div class="red-square-container left">
				<div class="red-square"></div>
			</div>

			<div class="container card">
				<div class="row">
					<?php foreach($brands as $b): ?>
						<div class="col-sm-4 col-md-3 brand text-center">
							<?php if(empty($b->link)): ?>
							<img alt="<?php echo $b->image; ?>"
								src="<?php echo static_url('uploads/brands/'.$b->image); ?>">
							<?php else: ?>
								<a  target="_blank" class="unstyled" href="<?php echo $b->link; ?>">
									<img alt="<?php echo $b->image; ?>"
										src="<?php echo static_url('uploads/brands/'.$b->image); ?>">
								</a>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="separator white"></div>
			<div class="red-square-container right">
				<div class="red-square"></div>
			</div>

			<div class="card gray">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3 text-center">
							<img src="<?php echo static_url('img/logo_big.png'); ?>" alt="Art time">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2 text-center">
							<?php echo $page->body; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="separator gray" id="about_us"></div>
			<div class="red-square-container right bottom">
				<div class="red-square"></div>
			</div>

			<div class="card dark-gray">
				<div class="container">
					<div class="row">
						<?php foreach($branches as $b): ?>
							<?php
								$image = $b->image;

								if(!$image) {
									$image = static_url('img/no_image.png');
								}

								else {
									$image = static_url('uploads/branches/thumbs/'.$image);
								}
							?>
							<div class="col-sm-6 col-md-4">
								<a href="<?php echo locale_url("branch/{$b->id}/$b->slug"); ?>"
									class="unstyled">
									<div class="branch text-center">
										<div class="image"
											style="background-image: url('<?php echo $image; ?>')"></div>
										<div class="location caps"><?php echo $b->location; ?></div>
										<div class="address caps"><?php echo $b->address; ?></div>
										<div class="working-hours caps"><?php echo $b->working_hours; ?></div>
										<div class="phone caps"><?php echo $b->phone; ?></div>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>
	</div>
</body>
</html>