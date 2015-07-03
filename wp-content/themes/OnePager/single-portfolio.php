

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
    
            <!--BEGIN .page-header -->
			<div class="page-header">
			    
			    <h1 class="page-title"><?php the_title(); ?></h1>
			    
			    <!--BEGIN .navigation .single-page-navigation -->
				<div class="navigation single-page-navigation">
				
				    <?php if( get_previous_post() ) : ?>
					<div class="nav-previous"><?php previous_post_link('&larr; %link') ?></div>
					<?php endif; ?>
					
					<?php if( get_next_post() ) : ?>
					<div class="nav-next"><?php next_post_link('%link &rarr;') ?></div>
					<?php endif; ?>

				<!--END .navigation .single-page-navigation -->
				</div>
				
			<!--END .page-header -->
			</div>
			
            <!--BEGIN #primary .hfeed-->
			<div id="primary" class="hfeed">
		    <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>				
				<!--BEGIN .hentry -->
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">				
					
            		<?php // get the media elements
                        /*$mediaType = get_post_meta($post->ID, 'portfolio_type', true);
                    	echo "media type";*/
						image($post->ID, 'portfolio-main');
            		    /*switch( $mediaType ) {
                            case "Image":
                                image($post->ID, 'portfolio-main');
                                break;                          

                            default:
                                break;
                        }*/
            		?>

            		<!-- BEGIN .entry-content -->
            		<div class="entry-content">
                        
                        <!-- BEGIN .entry-meta -->
                		<div class="entry-meta">

                		    <?php 
                		        // get the meta information and display if supplied
                		        $portfolioClient = get_post_meta($post->ID, 'portfolio_client', true);
                                $portfolioDate = get_post_meta($post->ID, 'portfolio_date', true); 
                                $portfolioURL = get_post_meta($post->ID, 'portfolio_url', true);
                        	    
            		            if( !empty($portfolioClient) ) {
            		                echo '<h5>' . __('Client:', 'cleanbusiness') . '</h5>';
            		                echo '<span>' . $portfolioClient . '</span><br />';
            		            }

                                if( !empty($portfolioDate) ) {
                                    echo '<h5>' . __('Date:', 'cleanbusiness') . '</h5>';
                                    echo '<span>' . $portfolioDate . '</span><br />';
                                }

                                if( !empty($portfolioURL) ) {
                                    echo "<a href='$portfolioURL'>" . __('Launch Project', 'cleanbusiness') . "</a>";
                                }
            		        ?>

                		<!-- END .entry-meta -->
                		</div>
                		
                		<?php the_content(); ?>

            		<!-- END .entry-content -->
            		</div>                
				<!--END .hentry-->  
				</div>

				<?php endwhile; endif; ?>

			<!--END #primary .hfeed-->
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
