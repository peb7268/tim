<?php
	query_posts('category_name=Home'); 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article class="post">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		
		<?php the_excerpt(); ?>
	</article>
<?php
endwhile; endif;