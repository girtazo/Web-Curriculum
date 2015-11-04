<?php
	
	/* Theme Options*/
	include_once( 'includes/theme-options.php' );
	
	/* Meta Boxes*/
	require( trailingslashit( get_template_directory() ) . 'includes/meta-boxes.php' );

	// Add RSS links to <head> section
	add_theme_support('automatic_feed_links');
	
	//load_theme_textdomain( 'cleanbusiness' );
	
	// Load files JS
	if( !function_exists( 'registers_js' ) ) {

		function registers_js() {

			if( !is_admin() ) {

				wp_enqueue_script('jquery');

				wp_register_script('jquery_1.7.1',get_template_directory_uri() . '/js/jquery-1.7.1.min.js',true);
				wp_enqueue_script('jquery_1.7.1');

				wp_register_script('min',get_template_directory_uri() . '/js/min.js',true);
				wp_enqueue_script('min');

				wp_register_script('cb-script',get_template_directory_uri() . '/js/script.js',true);
				wp_enqueue_script('cb-script');

				wp_register_script('isotope',get_template_directory_uri() . '/js/jquery.isotope.min.js',true);
				wp_enqueue_script('isotope');
				
				wp_register_script('smooth-scroll',get_template_directory_uri() . '/js/jquery.smooth-scroll.min.js',true);
				wp_enqueue_script('smooth-scroll');

				wp_register_script('waypoints',get_template_directory_uri() . '/js/waypoints.min.js',true);
				wp_enqueue_script('waypoints');

				wp_register_script('setup',get_template_directory_uri() . '/js/setup.js',true);
				wp_enqueue_script('setup');

				wp_register_script('quake-slider-script',get_template_directory_uri() . '/js/quake.slider.js',true);
				wp_enqueue_script('quake-slider-script');

				wp_register_script('pretty-photo',get_template_directory_uri() . '/js/jquery.prettyPhoto.js',true);
				wp_enqueue_script('pretty-photo');
				
				wp_register_script('tipsy',get_template_directory_uri() . '/js/jquery.tipsy.js',true);
				wp_enqueue_script('tipsy');

				wp_register_script('flexslider',get_template_directory_uri() . '/js/jquery.flexslider-min.js',true);
				wp_enqueue_script('flexslider');
				
				wp_register_script('knob',get_template_directory_uri() . '/js/jquery.knob.js',true);
				wp_enqueue_script('knob');

				/* Bootstrap */
				wp_register_script('bootstrap',get_template_directory_uri() . '/js/bootstrap.min.js',true);
				wp_enqueue_script('bootstrap');
			}
		}
		add_action( 'wp_enqueue_scripts', 'registers_js', 10, 1 );
	}

	// Load stylesheet CSS
	if( !function_exists( 'registers_css' ) ) {

		function registers_css() {

			if( !is_admin() ) {

				wp_register_style('fancy-box-style',get_template_directory_uri() . '/styles/fancybox.css');
				wp_enqueue_style('fancy-box-style');

				wp_register_style('quake-slider-style',get_template_directory_uri() . '/styles/quake.slider.css');
				wp_enqueue_style('quake-slider-style');

				wp_register_style('pretty-photo-style',get_template_directory_uri() . '/styles/prettyPhoto.css');
				wp_enqueue_style('pretty-photo-style');

				wp_register_style('tipsy-style',get_template_directory_uri() . '/styles/tipsy.css');
				wp_enqueue_style('tipsy-style');

				wp_register_style('flex-slider-style',get_template_directory_uri() . '/styles/flexslider.css');
				wp_enqueue_style('flex-slider-style');
				
				/* Bootstrap */
				wp_register_style('bootstrap-style',get_template_directory_uri() . '/styles/bootstrap/bootstrap.min.css');
				wp_enqueue_style('bootstrap-style');

				wp_register_style('bootstrap-theme-style',get_template_directory_uri() . '/styles/bootstrap/bootstrap-theme.min.css');
				wp_enqueue_style('bootstrap-theme-style');

				wp_register_style('main-style',get_template_directory_uri() . '/styles/style.css');
				wp_enqueue_style('main-style');

				/*wp_register_style('quake-slider-skin',get_template_directory_uri() . '/skins/plain/quake.skin.css');
				wp_enqueue_style('quake-slider-skin');*/

				/*wp_register_style('ninesixty',get_template_directory_uri() . '/style/960.css');
				wp_enqueue_style('ninesixty');*/
			}
		}
		add_action( 'wp_enqueue_scripts', 'registers_css', 10, 1 );
	}	
    
    // Registers Menus	
	if( !function_exists( 'theme_register_menu' ) ) {

		function theme_register_menu() {

			register_nav_menu( 'menu_left', __('Menu lateral') );    	
		}
		add_action('init', 'theme_register_menu');	
	}

	if( !function_exists( 'show_menu_left' ) ){
		
		function show_menu_left(){
			
			$args['theme_location'] = 'menu_left';
			$args['fallback_cb'] 	= false;
      		wp_nav_menu( $args );
		} 
	}	

	$logo = get_option('image_curriculum');
	
	if( is_plugin_active("option-tree/ot-loader.php" ) ){

		if( !function_exists( 'theme_options_option_tree' ) ) {

			function theme_options_option_tree ( $option_theme ) {

				/** 
				* Construccion de Opciones de Tema
				* @option_theme array
				* desc - theme options
				*/
				global $options_theme;
				global $sections_menu;
				$options_theme = array();
				
				// Recogida de Opciones Menu
				$sections = get_option( 'option_tree_settings' )["sections"];
				$settings = get_option( 'option_tree_settings' )["settings"];

				// Construcción de Opciones de Tema
				foreach ($sections as $key => $section) {
					
					$options_theme[$section["id"]] = $section;
				}
				
				foreach ($settings as $key => $setting) {

					$options_theme[$setting["section"]]["settings"][$setting["id"]] = $setting;
				}

				foreach ($options_theme as $key => $section) {

				  foreach ($section["settings"] as $id => $setting) {

				  	$options_theme[ $section["id"] ]["settings"][ $setting["taxonomy"] ] = $setting;
				  	unset( $options_theme[ $section["id"] ]["settings"][ $id ] );
				  	
				    if( $setting["taxonomy"] = "item_menu" ) {

				      if( ot_get_option( $id ) == "on" ) {

				        $sections_menu[ $section["id"] ] = $options_theme[ $section["id"] ];
				      }
				    }
				  }
				}

				foreach ($sections_menu as $id => $section) {

					$sections_menu[ $section["id"] ] = $options_theme[ $section["id"] ];
				}
			}
			
			add_action( 'after_setup_theme', 'theme_options_option_tree', 10, 1 );
		}
	}
	
	if( ! isset( $content_width ) ) $content_width = 960;	
	
	$post_formats = array( 
				'aside',
				'audio',
				'gallery', 
				'image', 
				'link', 
				'quote', 
				'video');

	add_theme_support( 'post-formats', $post_formats ); 	

	
	if( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 200, 180, true ); // Normal post thumbnails
		add_image_size( 'thumbnail-large', 560, '', false); // for blog pages
		add_image_size( 'portfolio-thumb', 220, 140, true); // for the portfolio template
		add_image_size( 'portfolio-main', 940, '', false); // for the single portfolio page
	}
	//Register our sidebars and widgetized areas.

	/*function cb_widgets_init() {
				
		register_sidebar( array(
			'name' => __( 'Sidebar Widgets', 'cleanbusiness' ),
			'id' => 'sidebar-widgets',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( 'Footer Area One', 'cleanbusiness' ),
			'id' => 'sidebar-1',
			'description' => __( 'An optional widget area for footer', 'cleanbusiness' ),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h1>',
			'after_title' => '</h1>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Area Two', 'cleanbusiness' ),
			'id' => 'sidebar-2',
			'description' => __( 'An optional widget area for footer', 'cleanbusiness' ),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h1>',
			'after_title' => '</h1>',
		) );		
		
		register_sidebar( array(
			'name' => __( 'Footer Area Three', 'cleanbusiness' ),
			'id' => 'sidebar-3',
			'description' => __( 'An optional widget area for footer', 'cleanbusiness' ),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h1>',
			'after_title' => '</h1>',
		) );
		
		register_sidebar( array(
			'name' => __( 'About Page Featured Clients', 'cleanbusiness' ),
			'id' => 'sidebar-4',
			'description' => __( 'An optional widget area to display featured clients', 'cleanbusiness' ),
			'before_widget' => '<div class="featured-clients">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( 'Our Locations', 'cleanbusiness' ),
			'id' => 'sidebar-5',
			'description' => __( 'An optional widget area to display business locations', 'cleanbusiness' ),
			'before_widget' => '<div class="our-locations">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( 'Our Team', 'cleanbusiness' ),
			'id' => 'sidebar-6',
			'description' => __( 'An optional widget area to display team members', 'cleanbusiness' ),
			'before_widget' => '<div class="team-members">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3><div class="clear"></div>',
		) );		
	}
	add_action( 'widgets_init', 'cb_widgets_init' );
	
	include("inc/widget-partners.php");	
	include("inc/widget-locations.php");
	include("inc/widget-clients.php");
	include("inc/widget-ourteam.php");
	include("inc/theme-postmeta.php");*/
	include("inc/theme-posttypes.php");
	include("inc/theme-portfoliometa.php");
	

	/*-----------------------------------------------------------------------------------*/
	/* Output image */
	/*-----------------------------------------------------------------------------------*/

	if ( !function_exists( 'image' ) ) {

	    function image($postid, $imagesize) {
	        // get the featured image for the post				
	        $thumbid = 0;
	        if( has_post_thumbnail($postid) ) {
	            $thumbid = get_post_thumbnail_id($postid);
	        }
	    
	        // get first 2 attachments for the post
	        $args = array(
	            'orderby' => 'menu_order',
	            'post_type' => 'attachment',
	            'post_parent' => $postid,
	            'post_mime_type' => 'image',
	            'post_status' => null,
	            'numberposts' => 10
	        );
	        $attachments = get_posts($args);

	        if( !empty($attachments) ) {
	            foreach( $attachments as $attachment ) {
	                // if current image is featured image reloop
	                if( $attachment->ID == $thumbid ) continue;
	                $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
	                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
	                echo "<div class='image-frame'>";
	                echo "<img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' />";
	                echo "</div>";
	                // got image, time to exit foreach
	                break;
	            }
	        }
	    }
	}	
	/*-----------------------------------------------------------------------------------*/
	/* Custom Walker for wp_list_categories in template-portfolio.php */
	/*-----------------------------------------------------------------------------------*/

	/*class Portfolio_Walker extends Walker_Category {

	    function start_el(&$output, $category, $depth, $args) {

            extract($args);

            $cat_name = esc_attr( $category->name );
            $cat_name = apply_filters( 'list_cats', $cat_name, $category );
            $link = '<a href="#' . urldecode($category->slug) . '" ';
            $link .= 'class="' . urldecode($category->slug) . '" ';
            if ( $use_desc_for_title == 0 || empty($category->description) )
                    $link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s' ), $cat_name) ) . '"';
            else
                    $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
            $link .= '>';
            $link .= $cat_name . '</a>';

            if ( !empty($feed_image) || !empty($feed) ) {
                $link .= ' ';

                if ( empty($feed_image) )
                	$link .= '(';

                $link .= '<a href="' . get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) . '"';

                if ( empty($feed) ) {
                	$alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
                } else {
                	$title = ' title="' . $feed . '"';
                	$alt = ' alt="' . $feed . '"';
                	$name = $feed;
                	$link .= $title;
                }

                $link .= '>';

                if ( empty($feed_image) )
                	$link .= $name;
                else
                	$link .= "<img src='$feed_image'$alt$title" . ' />';

                $link .= '</a>';

                if ( empty($feed_image) )
                	$link .= ')';
            }

            if ( !empty($show_count) )
                    $link .= ' (' . intval($category->count) . ')';

            if ( !empty($show_date) )
                    $link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);

            if ( 'list' == $args['style'] ) {
                    $output .= "\t<li";
                    $class = 'cat-item cat-item-' . $category->term_id;
                    if ( !empty($current_category) ) {
                            $_current_category = get_term( $current_category, $category->taxonomy );
                            if ( $category->term_id == $current_category )
                                    $class .=  ' current-cat';
                            elseif ( $category->term_id == $_current_category->parent )
                                    $class .=  ' current-cat-parent';
                    }
                    //$output .=  ' class="' . $class . '"';
                    $output .= ">$link\n";
            } else {
                    $output .= "\t$link<br />\n";
            }
	    }
	}
/*-----------------------------------------------------------------------------------*/
/* Big Heading shortcode
/*-----------------------------------------------------------------------------------*/

function clean_business_big_heading( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'highlight'	=> '',    
    'color'	=> '',	
    ), $atts));

	$color = ($color) ? $color : 'pink';
	$highlight = ($highlight) ? $highlight : '';		
	$replace_str = '<font class="'.$color.'">'.$highlight.'</font>';
	$contents = str_replace($highlight,$replace_str,$content);
	$out =  '<div class="main_heading"><h2>'. $contents.'</h2></div>';

    return $out;
}
add_shortcode('big_heading', 'clean_business_big_heading');
?>