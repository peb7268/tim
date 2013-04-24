<?php get_header(); ?>
<div id="wrapper-page">
	<div id="body">
		<div id="single-header">
			<h1 id="title"><?php the_title(); ?></h1>
		</div><!-- #singel-header -->
		<?php require 'framework/loops/generic.php'; ?>
	</div><!-- #body -->
</div><!-- #wrapper-single -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>