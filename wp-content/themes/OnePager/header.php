<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php if (is_search()) { ?> <meta name="robots" content="noindex, nofollow" /><?php } ?>

    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/media-queries.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_directory_uri(); ?>/flex-slider/flexslider.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/prettyPhoto.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/tipsy.css"/>
    
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/flex-slider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery.tipsy.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery.knob.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/setup.js"></script>

	<title>
	   <?php
       if(function_exists('is_tag') && is_tag()){ 
            single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; 
        } elseif (is_archive()) {
            wp_title(''); echo ' Archive - ';
        } elseif (is_search()) {
            echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
        } elseif (!(is_404()) && (is_single()) || (is_page())) {
            wp_title(''); echo ' - '; 
        } elseif (is_404()) {
            echo 'Not Found - '; }

        if (is_home()) {
            
            bloginfo('name');
            if(bloginfo('description')){
                
                echo ' - ';
                bloginfo('description'); 
            }
        } else {
            bloginfo('name'); }

        if ($paged>1) {
            echo ' - page '. $paged; }
	   ?>
	</title>

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>