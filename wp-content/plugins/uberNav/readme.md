#UberNav Congfig Documentation

####How to use it in your theme. 
1. It depends on the uberNav hook being in the header of the site where the nav goes. Should have a fallback in place as well. 

```markdown 
<?php 
	if(has_action('uberNav')){
		uberNav();
	} else {
		wp_nav_menu( array(
			'theme_location'  => 'Primary', 
			'container_id' => 'navigation')
		); 
	} 
?> 
``` 

####The Custom Walker Class 
This class is responsible for making the hooks and filters and appending those to each dropdown menu. It Dynamically creates the menu hooks & placeholders. 

Those can then be hooked into from the UberNav Class.



##Methods 
####UberWalker::createPlaceholder 
1. Dynamically creates a name for the placeholder. 
2. Creates an anonymous function that accepts the HTML to be passed to the placeholder.
3. Returns the anonymous function for invocation in the HTML returned from UberWalker::start_lvl 

