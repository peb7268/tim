<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>	

	<div class="content">
		<?php the_content(); ?>
	</div><!-- .content -->

<?php endwhile; endif; ?>