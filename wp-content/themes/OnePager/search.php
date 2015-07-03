<?php get_header(); ?>
    <!--grid_12 start here-->
    <div class="grid_12">     
    <!--main_heading start here-->
    	<div class="main_heading">		 
			<?php $heading = of_get_option('slogan_text');
			if(!empty($heading)){
				$heading_parts = explode('|',$heading);
			?>
				<h2><?php echo $heading_parts[0] . '<font class="pink">' . $heading_parts[1] . '</font>' . $heading_parts[2];?></h2>
			<?php
			}?>
			
		</div>
    <!--main_heading end here-->     
    </div>
	<div class="grid_9" id="contents">
	<?php if (have_posts()) : ?>
		<h2>Search Results</h2>
		<div class="clear"></div>
		<?php while (have_posts()) : the_post(); ?>			
			<!--blog start here-->
				  <div class="blog clearfix">
					<div class="grid_3">
					 <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					</div>
					<!--grid_3 end here--> 					
					<!--grid_3 start here-->
					<div class="grid_9">
					   <h1><a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent link to %s', 'cleanbusiness'), the_title()); ?>" ><?php echo the_title();?></a></h1>					  					
					<?php the_excerpt(); ?>
					</div>
					<!--grid_9 end here--> 								
				  </div>				 
			  <!--blog end here--> 

		<?php endwhile; ?>
		
		<div class="clear"></div>
		
		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>No posts found.</h2>

	<?php endif; ?>

	</div>
	<div class="grid_3" id="sidebar">
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>