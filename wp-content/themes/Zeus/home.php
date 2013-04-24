<?php
	$img_dir = get_bloginfo('stylesheet_directory')."/img/";
	get_header(); 
?>
<section id="hero" class="clearfix">
	<aside>
		<h2>What Im Into Lately</h2>
		<span></span>
	</aside>
	<?php require_once 'framework/loops/loop-home-hero.php'; ?>
</section><!-- #hero -->

<section id="tweets" class="clearfix">
	<div class="left clearfix">
		<p class="headline">Follow Me</p>
		<p><a href="#">@peb7268</a></p>
	</div>
		<div class="right">
			<p>Living for someone else's approval is the same as #idolotry to God.</p>
	</div>
</section><!-- #tweets -->

<div id="wrapper-home" class="clearfix">
	<aside>
		<h2>
			<span>Whats in my</span> 
			<span class="brace"> { </span> Editor <span class="brace"> }</span>
		</h2>
		<ul>
			<li>
				<img src="<?php echo $img_dir; ?>backbone.png" alt="backbone.js">
				<!-- JavaScript: Backbone.js -->
			</li>
			<li>
				<img src="<?php echo $img_dir; ?>laravel.png" alt="laravel">
				<!-- PHP: Laravel - A Framework for web artisans -->
			</li>
			<li>
				<img src="<?php echo $img_dir; ?>rails.png" alt="ruby on rails">
				<!-- Ruby: Ruby on Rails. -->
			</li>
		</ul>
	</aside>
	<section id="blog-home">
		<?php require_once 'framework/loops/loop-home.php'; ?>
	</section><!-- #blog-home -->
</div><!-- #wrapper -->

<?php get_footer(); ?>