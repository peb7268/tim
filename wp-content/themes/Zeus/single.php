<?php get_header(); ?>
<div id="wrapper-single">
	<div id="body">
		<div id="single-header">
			<h1 id="title"><?php the_title(); ?></h1>
			<div class="meta">Posted In: <?php the_category(', ') ?></div><!-- .meta -->
		</div><!-- #singel-header -->

		<?php the_content(); ?>
	</div><!-- #body -->
</div><!-- #wrapper-single -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>