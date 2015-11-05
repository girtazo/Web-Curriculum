<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if (is_search()) { ?> <meta name="robots" content="noindex, nofollow" /><?php } ?>

    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

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
    <style type="text/css" media="screen">
    html {
        margin-top: 0px !important;
    }
    </style>
</head>

<body <?php body_class(); ?>>