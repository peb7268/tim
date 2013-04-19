<?php get_header(); ?>
<div id="wrapper-single">
	<div id="body">
		<?php if(have_posts()) : while (have_posts()) : the_post() ?>
			
		<div id="single-header">
			<h1 id="title"><?php the_title(); ?></h1>
			<section id="banner">
				<?php 
					$size = 'banner-full-lanscape';
					require "framework/elements/images/postThumbnail.php";
				?>

			</section>
			<div class="meta clearfix">
				Posted In: <?php the_category(', '); ?>
				<?php 
					$link = get_permalink(); 
				?>
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="peb7268" data-count="none" data-lang="en">Tweet</a>
			</div><!-- .meta -->
		</div><!-- #singel-header -->
		
		<div class="content">
			<?php the_content(); ?>
		</div><!-- .content-->
		<?php endwhile; endif; ?>
	</div><!-- #body -->
</div><!-- #wrapper-single -->
<?php get_sidebar(); ?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<?php get_footer(); ?>
