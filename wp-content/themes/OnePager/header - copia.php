<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

		 <div class="container_12" id="page-wrap">
        <!--grid_12 start here-->
        <div class="grid_12" id="header">
            <!--logo_container start here-->
            <div id="logo_container">
                <a href="#" id="logo"></a>
                <div class="clear">
                </div>
                <div class="tag_line">
                    <?php bloginfo( 'description' ); ?></div>
            </div>
            <!--logo_container end here-->
              <div id="nav_wrapper">			
				<?php wp_nav_menu( array( 'theme_location' => 'primary','container_class'=> 'nav-menu' ) ); ?>               
            </div>
            <!--#nav_wrapper-->
        </div>
        <!--grid_12 end here-->
        <div class="clear">
        </div>	
		
		<!--grid_12 start here-->
  <div class="grid_12">  
	
	<?php // Breadcrumb navigation
    if (is_page() && !is_front_page() || is_single() || is_category() || is_archive() || is_search()) {
        echo '<ul id="q_nav">';
        echo '<li ><a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a></li><span>/</span>';
 
        if (is_page()) {
            $ancestors = get_post_ancestors($post);
 
            if ($ancestors) {
                $ancestors = array_reverse($ancestors); 
                foreach ($ancestors as $crumb) {
                    echo '<li><a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a></li><span>/</span>';
                }
            }
        }
 
        if (is_single()) {
            $category = get_the_category();
            echo '<li><a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a></li><span>/</span>';
        }
 
        if (is_category()) {
            $category = get_the_category();
            echo '<li>'.$category[0]->cat_name.'</li>';
        }
		if (is_archive()) {
            echo '<li class="active">Archives</li>';
        }
		if (is_search()) {
            echo '<li class="active">Search Results</li>';
        }
        // Current page
        if (is_page() || is_single()) {
            echo '<li class="active">'.get_the_title().'</li>';
        }
		
        echo '</ul>';
    } elseif (is_front_page()) {
        // Front page
        echo '<ul id="q_nav">';
        echo '<li ><a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a></li><span>/</span>';
        echo '<li class="active">'.get_the_title().'</li>';
        echo '</ul>';
    }
?>
	
    <div class="clear"></div>
    <hr />
  </div>
  <!--grid_12 end here-->
  <div class="clear"></div>