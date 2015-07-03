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

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2>Archive for <?php the_time('F jS, Y'); ?></h2>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2>Archive for <?php the_time('F, Y'); ?></h2>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2>Archive for <?php the_time('Y'); ?></h2>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2>Author Archive</h2>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2>Blog Archives</h2>
			
			<?php } ?>			

			<?php while (have_posts()) : the_post(); ?>			
				<!--blog start here-->
				  <div class="blog clearfix">
					<div class="grid_3">
					 <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					</div>
					<!--grid_3 end here--> 					
					<!--grid_3 start here-->
					<div class="grid_9">
					  <h1><?php echo get_the_title();?></h1>					  
					<?php the_content(); ?>
					</div>
					<!--grid_9 end here--> 								
				  </div>				 
			  <!--blog end here--> 
			<?php endwhile; ?>
			<div class="clear"></div>
			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
			
	<?php else : ?>
		<h2>Nothing found</h2>
	<?php endif; ?>
	</div>
	<div class="grid_3" id="sidebar">
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>