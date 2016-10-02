<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>

	<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css"
		rel="stylesheet">
	<link rel="stylesheet" href="<?php echo static_url('css/about_us.css?v='.V); ?>">

	<script>
		var urls = {
			branch: '<?php echo locale_url('branch'); ?>',
		};
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWuTWB4wr5HiQsQLEIK7B50R7OU2KSBCc"
    async defer></script>

	<script src="<?php echo static_url('js/about_us.js?v='.V); ?>"></script>

	<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 fotorama-container">
						<?php $this->load->view('elements/branch_images'); ?>
					</div>
					<div class="col-sm-6 text-center">
						<a href="#" class="unstyled address-link">
							<h2 class="address caps"></h2>
							<h3 class="location caps"></h3>
						</a>
						<p class="description"></p>
						<div id="map"></div>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>
	</div>
</body>
</html>