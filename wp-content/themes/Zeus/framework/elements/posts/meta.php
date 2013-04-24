<div class="meta clearfix">
	Posted In: <?php the_category(', '); ?>
	<?php 
		$link = get_permalink(); 
	?>
	<?php if($showTweets){ ?>
<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="peb7268" data-count="none" data-lang="en">Tweet</a>
	<?php } ?>
</div><!-- .meta -->