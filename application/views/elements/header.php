<div class="header clearfix caps">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="text-right">
					<a href="#" class="online-shop-button unstyled">
						<span class="glyphicon glyphicon-shopping-cart"></span>
						<?php echo lang('online_shop') ?>	
					</a>
					<strong>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</strong>
					<div class="lang pull-right">
						<div>
							<a href="<?php echo lang_link(EN); ?>" class="unstyled">Eng</a>
						</div>
						<div>
							<a href="<?php echo lang_link(GE); ?>" class="unstyled">ქარ</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 clearfix">
				<a href="<?php echo locale_url(); ?>" class="unstyled pull-left">
					<img class="logo" src="<?php echo static_url('img/logo_header.png'); ?>" alt="Logo">
				</a>
				<div class="nav-container">
					<ul class="navigation">
						<?php foreach($navigation as $n): ?>
							<li>
								<?php
									$class = 'unstyled';
									if($n->slug === $slug) {
										$class .= ' active';
									}
								?>
								<a class="<?php echo $class; ?>"
									href="<?php echo locale_url($n->slug); ?>">
									<?php echo $n->title; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>