<?php if(!empty($branches)): ?>

<div class="fotorama"
	data-nav="thumbs"
	data-width="100%"
	data-height="400"
	data-arrows="false"
	data-click="false"
	data-fit="cover">
	<?php foreach($branches as $b): ?>
		<img
			alt="<?php echo $b->address; ?>"
			data-id="<?php echo $b->id; ?>"
			data-address="<?php echo $b->address; ?>"
			data-location="<?php echo $b->location; ?>"
			data-description="<?php echo $b->description; ?>"
			data-latitude="<?php echo $b->latitude; ?>"
			data-longitude="<?php echo $b->longitude; ?>"
			src="<?php echo static_url('uploads/branches/'.$b->image); ?>">
	<?php endforeach; ?>
</div>

<script>
	var width = $('.fotorama-container').width() / 3;
	$('.fotorama').attr('data-thumbwidth', width);
	$('.fotorama').attr('data-thumbheight', width * 9 / 16);
</script>

<?php endif; ?>