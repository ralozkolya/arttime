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
				<br>
				<div class="row">
					<div class="col-xs-12">
						<h2 class="caps"><strong><?php echo lang('service'); ?></strong></h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12">
						<h2 class="caps"><strong><?php echo lang('necessary_info'); ?></strong></h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>
	</div>
</body>
</html>