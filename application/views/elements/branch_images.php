<?php if(!empty($gallery)): ?>

<div class="fotorama"
	data-nav="thumbs"
	data-width="100%"
	data-height="400"
	data-arrows="false"
	data-click="false"
	data-fit="cover">
	<?php foreach($gallery as $g): ?>
		<img
			alt="<?php echo $g->image; ?>"
			src="<?php echo static_url("uploads/branches/{$g->image}"); ?>">
	<?php endforeach; ?>
</div>

<script>
	var width = $('.fotorama-container').width() / 3;
	$('.fotorama').attr('data-thumbwidth', width);
	$('.fotorama').attr('data-thumbheight', width * 9 / 16);
</script>

<?php endif; ?>