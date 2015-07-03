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
  
  <div class="grid_12">
	  <div class="grid_9" id="contents">
	  <!--grid_12 end here--> 
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<!--blog start here-->
				  <div class="blog clearfix">				  
					<div class="grid_3">
					 <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					</div>
					<!--grid_3 end here--> 
					
					<!--grid_3 start here-->
					<div class="grid_9">
					  <h1><a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent link to %s', 'cleanbusiness'), get_the_title()); ?>" ><?php echo get_the_title();?></a></h1>
					 					  
					  <?php if (has_post_thumbnail( $post->ID ) ){ ?>		
						<div class="img_blog">
							<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID ) ); ?>" style="width:200px; height:180px" alt="<?php echo the_title();?>"/>
						</div>	 
						
						<?php } ?>
					<?php the_content(__('Read More...', 'cleanbusiness')); ?>
					</div>
					<!--grid_9 end here--> 
					
				  </div>
				  <div class="clear"></div>
			  <!--blog end here--> 		
				
		<?php endwhile; ?>
		
		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>		
		
		<?php else : ?>

			<h2>Not Found</h2>

		<?php endif; ?>
		</div>
		<div class="grid_3" id="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>