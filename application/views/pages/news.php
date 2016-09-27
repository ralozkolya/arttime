<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>

	<link rel="stylesheet" href="<?php echo static_url('css/news.css?v='.V); ?>">
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2 class="caps"><strong><?php echo lang('news'); ?></strong></h2>
					</div>
				</div>
				<div class="row">
					<?php foreach($news as $i=>$n): ?>
						<div class="col-sm-6">
							<a href="<?php echo locale_url('post/'.$n->id.'/'.$n->slug); ?>" class="unstyled">
								<div class="news clearfix">
									<?php if(floor($i / 2) % 2 === 0): ?>
										<div class="image"
											style="background-image: url('<?php echo static_url('uploads/news/thumbs/'.$n->image); ?>')"></div>
										<div class="description">
											<div class="image" style="background-image: url('<?php echo static_url('uploads/news/thumbs/'.$n->image); ?>')"></div>
											<div class="text">
												<h4 class="caps"><strong><?php echo $n->title; ?></strong></h4>
												<br>
												<div class="text-center"><?php echo $n->body; ?></div>
											</div>
										</div>
									<?php else: ?>
										<div class="description">
											<div class="image" style="background-image: url('<?php echo static_url('uploads/news/thumbs/'.$n->image); ?>')"></div>
											<div class="text text-right">
												<h4 class="caps"><strong><?php echo $n->title; ?></strong></h4>
												<br>
												<div class="text-center"><?php echo $n->body; ?></div>
											</div>
										</div>
										<div class="image"
											style="background-image: url('<?php echo static_url('uploads/news/thumbs/'.$n->image); ?>')"></div>
									<?php endif; ?>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h2 class="text-center">Under Construction</h2>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>
	</div>
</body>
</html>