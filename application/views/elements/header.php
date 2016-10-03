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
									$class = 'unstyled nav-link';

									if($n->slug === $slug) {
										$class .= ' active';
									}
								?>
								<a class="<?php echo $class; ?>"

									<?php if(!empty($n->scroll_to))
										echo "data-scroll-to='{$n->scroll_to}'";
									?>

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
	<div class="social">
		<ul>
			<li>
				<a class="unstyled social-link facebook" href="#">
					<span class="fa fa-facebook"></span>
				</a><!-- 
				 --><span class="social-arrow">
					<span class="glyphicon glyphicon-triangle-right"></span>
					<span class="facebook-pages">
						<a href="https://www.facebook.com/Arttimegeo/" target="_blank">
							<img src="<?php echo static_url('img/arttime_social.png'); ?>"
								alt="Arttime">
						</a>
						<a href="https://www.facebook.com/Swatchgeo/" target="_blank">
							<img src="<?php echo static_url('img/swatch_social.png'); ?>"
								alt="Swatch">
						</a>
					</span>
				</span>
			</li>
			<li><a class="unstyled social-link instagram" href="#">
				<span class="fa fa-instagram"></span>
			</a></li>
			<li><a class="unstyled social-link youtube" href="#">
				<span class="fa fa-youtube"></span>
			</a></li>
		</ul>
	</div>
</div>