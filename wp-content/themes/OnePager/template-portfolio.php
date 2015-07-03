<?php
/*
Template Name: Portfolio Template
*/
?>

<?php get_header(); ?>    

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	  <!--grid_12 start here-->
	  <div class="grid_12"> 
		
		<!--main_heading start here-->
		<div class="main_heading">		 
			<?php $heading = get_post_meta($post->ID,'cb_header_text',true);
			if(!empty($heading)){
				$heading_parts = explode('|',$heading);
			?>
				<h2><?php echo $heading_parts[0] . '<font class="pink">' . $heading_parts[1] . '</font>' . $heading_parts[2];?></h2>
			<?php
			}?>			 
		</div>
		<!--main_heading end here--> 
		
	  </div>
  <?php endwhile; endif; ?>		
 <!--grid_9 start here-->
  <div class="grid_9">
    <div id="main"> 
		<ul id="filtering-nav">
			        <li><a href="#all" data-filter="type-portfolio" class="all"><?php _e('All', 'cleanbusiness'); ?></a></li>
			        <?php wp_list_categories( array('title_li' => '', 'taxonomy' => 'portfolio-type', 'walker' => new Portfolio_Walker() ) ); ?>
			    </ul>
        <ul >
       
      <div class="clear"></div>
	  <?php $columns = get_post_meta($post->ID,'cb_portfolio_columns',true);
		$portfolio_cls = "wrap_page columns_1";
		if($columns == "Two Columns")
			$portfolio_cls = "wrap_page columns_2";
		if($columns == "Three Columns")
			$portfolio_cls = "wrap_page columns_3";
	?>
	  
      <div class="<?php echo $portfolio_cls;?>"> <!-- masonry and filter wrapper -->         
   
		<!--grid_9 end here--> 
     
		    <?php 
		    $args = array(
                'post_type' => 'portfolio',
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'posts_per_page' => -1
		    );
		    $query = new WP_Query( $args );

			while ( $query->have_posts() ) : $query->the_post(); ?>
				
				<?php 
				    $terms =  get_the_terms( $post->ID, 'portfolio-type' );
					
				    $term_list = '';
				    if( is_array($terms) ) {
				        foreach( $terms as $term ) {
    				        $term_list .= urldecode($term->slug);
    				        $term_list .= ' ';
    				    }
			        }					
				?>										
					  
				<div class="portfolio_box <?php echo $term_list;?>">
				
					<div class="wrap_image"> 
					
						<?php the_post_thumbnail('portfolio-thumb'); ?>
						<!--<a class="over_image" rel="fancyzoom" href="images/gallery_2_col/gal_2_col_07.jpg" title="Single Image">view image</a> -->
					</div>
					<!-- end wrap_image div --> 						  
				</div>
       
				<!-- end portfolio_box div -->					               
								
				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>
				
			   </div>

			   <!-- end wrap_page column_2 div --> 
      
    </div>
    <!-- end wrap_page column_2 div --> 
    
  </div>
  <!--end grid_9-->
  <!--grid_3 starts here-->
  <div class="grid_3">
   <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Our Team') ) : ?>
   <?php endif; ?>	
  </div>
  <!--grid_3 ends here-->

<?php get_footer(); ?>