<div class="header clearfix caps">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="text-right">
					<span class="shops-container parent">
						<a href="#" class="online-shop-button unstyled">
							<span class="glyphicon glyphicon-shopping-cart"></span>
							<?php echo lang('online_shop') ?>
						</a>
						<?php if(!empty($shops)): ?>
							<ul class="shops dropdown">
								<?php foreach($shops as $s): ?>
									<li>
										<a target="_blank"
											class="unstyled" href="<?php echo $s->link; ?>">
											<?php echo $s->name; ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</span>
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
				<a href="<?php echo locale_url(); ?>" class="unstyled logo-container">
					<img class="logo" src="<?php echo static_url('img/logo_header.png'); ?>" alt="Logo">
				</a>
				<button type="button" class="navbar-toggle visible-sm visible-xs pull-right">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="nav-container">
					<ul class="navigation">
						<?php foreach($navigation as $n): ?>
							<?php if($n->id === '4'): ?>
								<li class="parent">
							<?php else: ?>
								<li>
							<?php endif; ?>
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

								<?php if($n->id === '4'): ?>
									<ul class="subnav dropdown">
										<?php foreach($subnavigation as $s): ?>
											<li>
												<a class="unstyled" href="<?php echo locale_url($s->slug); ?>"><?php echo $s->title; ?></a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
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
						<a href="<?php echo $social['facebook_arttime']; ?>" target="_blank">
							<img src="<?php echo static_url('img/arttime_social.png'); ?>"
								alt="Arttime">
						</a>
						<a href="<?php echo $social['facebook_swatch']; ?>" target="_blank">
							<img src="<?php echo static_url('img/swatch_social.png'); ?>"
								alt="Swatch">
						</a>
					</span>
				</span>
			</li>
			<li><a class="unstyled social-link instagram"
				href="<?php echo $social['instagram']; ?>" target="_blank">
				<span class="fa fa-instagram"></span>
			</a></li>
			<li><a class="unstyled social-link youtube"
				href="<?php echo $social['youtube']; ?>" target="_blank">
				<span class="fa fa-youtube"></span>
			</a></li>
		</ul>
	</div>
</div>