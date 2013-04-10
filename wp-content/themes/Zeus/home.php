<?php
	$img_dir = get_bloginfo('stylesheet_directory')."/img/";
	get_header(); 
?>
<section id="hero" class="clearfix">
	<aside>
		<h2>What Im Into Lately</h2>
	</aside>
	<ul>
		<li><a href="#">Books</a>
			<p>Book 1</p>
			<p>Book 2</p>
			<p>Book 3</p>
			<span></span>
		</li>
		<li><a href="#">Projects</a><p>Project 1</p><span></span></li>
		<li><a href="#">Musings</a><p>Thought 1</p><span></span></li>
	</ul>
</section><!-- #hero -->

<section id="tweets" class="clearfix">
	<div class="left">
		<p>Living for someone else's approval is the same as #idolotry to God.</p>
	</div>
	<div class="right">
		<p class="headline">Follow Me</p>
		<p>@peb7268</p>
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
		<article class="post">
			<h1>Why did I feel the need for a redesign?</h1>
			<p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. 
				Etiam at risus et justo dignissim congue. Donec congue lacinia dui, 
				a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci.
			</p>
		</article>
	</section><!-- #blog-home -->
</div><!-- #wrapper -->

<?php get_footer(); ?>