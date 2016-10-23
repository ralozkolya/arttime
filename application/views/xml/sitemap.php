<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc><?php echo base_url(); ?></loc> 
		<priority>1.0</priority>
	</url>
	<url>
		<loc><?php echo base_url('ka-GE'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('en-US'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('ka-GE/home'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('en-US/home'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('ka-GE/#brands'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('en-US/#brands'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('ka-GE/#about_us'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('en-US/#about_us'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('ka-GE/news'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('en-US/news'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('ka-GE/tips'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('en-US/tips'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('ka-GE/service'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('en-US/service'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('ka-GE/contact'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('en-US/contact'); ?></loc> 
		<priority>0.5</priority>
	</url>

	<?php foreach($news as $n): ?>
		<url>
			<loc><?php echo base_url('ka-GE/post/'.$n->id.'/'.$n->slug); ?></loc>
			<priority>0.5</priority>
		</url>
		<url>
			<loc><?php echo base_url('en-US/post/'.$n->id.'/'.$n->slug); ?></loc>
			<priority>0.5</priority>
		</url>
	<?php endforeach; ?>

</urlset>