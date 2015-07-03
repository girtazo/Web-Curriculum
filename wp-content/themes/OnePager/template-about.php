<?php 
/*
* Template Name: About Page Template
*
* The "Template Name:" bit above allows this to be selectable
* from a dropdown menu on the edit page screen.
*/

get_header(); ?>	        
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	 		
	    
		
			<!--grid_9 start here-->
			<div class="grid_9"> 			
				  <?php the_content(); ?>			 
			</div>
			<!--grid_9 ends here-->
			<div class="grid_3">
			 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('About Page Featured Clients') ) : ?>
			 
			 <?php endif; ?>	
			</div>
	
	<?php endwhile; endif; ?>		
			
<?php get_footer(); ?>