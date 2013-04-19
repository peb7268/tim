<?php
	/* Template Name: blog */
?>
<?php get_header(); ?>
<div id="wrapper-blog">
	<section id="blog">
		<?php $query = new WP_Query('posts_per_page=10');
		if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
			<article class="post clearfix">
				<div class="img">
					<?php
						$size = 'featured-square';
						require "framework/elements/images/postThumbnail.php";
					?>
				</div>
				<div class="content clearfix">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php the_excerpt(); ?>
				</div><!-- .content -->
			</article>
		<?php endwhile; endif; ?>
	</section>
</div><!-- #wrapper-blog -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>