<?php
if( has_post_thumbnail() ){
	the_post_thumbnail($size);
} else { 
	if($else) { ?>
	<div class="frame">
		<h2 class="defaultFeaturedImg">I<span>D</span></h2>
		<p class="subtitle">Imperative Design</p>
	</div><!-- .frame -->
<?php }} ?>