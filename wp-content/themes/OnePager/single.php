

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>OnePager - One Page Responsive Portfolio Template</title>

<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/style.css" media="screen" />
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/media-queries.css" />
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/flex-slider/flexslider.css" type="text/css" media="screen" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/styles/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/styles/tipsy.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/flex-slider/jquery.flexslider-min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery.prettyPhoto.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery.tipsy.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery.knob.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery.isotope.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery.smooth-scroll.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/setup.js"></script>

  		

</head>
<body>
<div id="wrap"> 
  <!-- wrapper -->

  

  <div id="container"> 
    
           	  <div class="grid_9" id="contents">
	  <!--grid_12 end here--> 
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<!--blog start here-->
				  <div class="blog">
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
					<div class="clear"></div>
					<div  id="comments-container">		
						<?php comments_template(); ?>
					</div>					
				  </div>
				 
			  <!--blog end here--> 
			 
		<?php endwhile; ?>
		
		<?php else : ?>

			<h2>Not Found</h2>

		<?php endif; ?>
		</div>


        
    <div class="footer">
      <p> &copy; 2012 <a href="http://eGrappler.com">eGrappler.com</a>. Some Rights Reserved.</p>
      <p> Designed With Love by <a href="http://esarfraz.com">Sarfraz Shoukat</a></p>
    </div>
  </div>
</div>
<a class="gotop" href="#top">Top</a>


</body>
</html>
