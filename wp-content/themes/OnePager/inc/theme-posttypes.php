<?php

/*-----------------------------------------------------------------------------------

	Add Portfolio Post Type

-----------------------------------------------------------------------------------*/


/* Create the Portfolio Custom Post Type ------------------------------------------*/
function post_type_portfolio() 
{
	$labels = array(
		'name' => __( 'Portfolios','cleanbusiness'),
		'singular_name' => __( 'Portfolio','cleanbusiness' ),
		'add_new' => __('Add New','cleanbusiness'),
		'add_new_item' => __('Add New Portfolio','cleanbusiness'),
		'edit_item' => __('Edit Portfolio','cleanbusiness'),
		'new_item' => __('New Portfolio','cleanbusiness'),
		'view_item' => __('View Portfolio','cleanbusiness'),
		'search_items' => __('Search Portfolio','cleanbusiness'),
		'not_found' =>  __('No portfolio found','cleanbusiness'),
		'not_found_in_trash' => __('No portfolio found in Trash','cleanbusiness'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		// Uncomment the following line to change the slug; 
		// You must also save your permalink structure to prevent 404 errors
		//'rewrite' => array( 'slug' => 'portfolio-slug' ), 
		'supports' => array('title','editor','thumbnail','custom-fields','page-attributes')
	  ); 
	  
	  register_post_type(__( 'portfolio' ),$args);
}

/* Create the Portfolio Type Taxonomy --------------------------------------------*/
function build_taxonomies(){
    $labels = array(
        'name' => __( 'Portfolio Type', 'cleanbusiness' ),
        'singular_name' => __( 'Portfolio Type', 'cleanbusiness' ),
        'search_items' =>  __( 'Search Portfolio Types', 'cleanbusiness' ),
        'popular_items' => __( 'Popular Portfolio Types', 'cleanbusiness' ),
        'all_items' => __( 'All Portfolio Types', 'cleanbusiness' ),
        'parent_item' => __( 'Parent Portfolio Type', 'cleanbusiness' ),
        'parent_item_colon' => __( 'Parent Portfolio Type:', 'cleanbusiness' ),
        'edit_item' => __( 'Edit Portfolio Type', 'cleanbusiness' ), 
        'update_item' => __( 'Update Portfolio Type', 'cleanbusiness' ),
        'add_new_item' => __( 'Add New Portfolio Type', 'cleanbusiness' ),
        'new_item_name' => __( 'New Portfolio Type Name', 'cleanbusiness' ),
        'separate_items_with_commas' => __( 'Separate portfolio types with commas', 'cleanbusiness' ),
        'add_or_remove_items' => __( 'Add or remove portfolio types', 'cleanbusiness' ),
        'choose_from_most_used' => __( 'Choose from the most used portfolio types', 'cleanbusiness' ),
        'menu_name' => __( 'Portfolio Types', 'cleanbusiness' )
    );
    
	register_taxonomy(
	    'portfolio-type', 
	    array( __( 'portfolio' )), 
	    array(
	        'hierarchical' => true, 
	        'labels' => $labels,
	        'show_ui' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'portfolio-type', 'hierarchical' => true)
	    )
	); 
}


/* Enable Sorting of the Portfolio ------------------------------------------*/
/*
function tz_create_portfolio_sort_page() {
    $tz_sort_page = add_submenu_page('edit.php?post_type=portfolio', 'Sort Portfolios', __('Sort Portfolios', 'cleanbusiness'), 'edit_posts', basename(__FILE__), 'tz_portfolio_sort');
    
    add_action('admin_print_styles-' . $tz_sort_page, 'tz_print_sort_styles');
    add_action('admin_print_scripts-' . $tz_sort_page, 'tz_print_sort_scripts');
}

function tz_portfolio_sort() {
    $portfolios = new WP_Query('post_type=portfolio&posts_per_page=-1&orderby=menu_order&order=ASC');
?>
    <div class="wrap">
        <div id="icon-tools" class="icon32"><br /></div>
        <h2><?php _e('Sort Portfolios', 'cleanbusiness'); ?></h2>
        <p><?php _e('Click, drag, re-order. Repeat as neccessary. Portfolio at the top will appear first.', 'cleanbusiness'); ?></p>

        <ul id="portfolio_list">
            <?php while( $portfolios->have_posts() ) : $portfolios->the_post(); ?>
                <?php if( get_post_status() == 'publish' ) { ?>
                    <li id="<?php the_id(); ?>" class="menu-item">
                        <dl class="menu-item-bar">
                            <dt class="menu-item-handle">
                                <span class="menu-item-title"><?php the_title(); ?></span>
                            </dt>
                        </dl>
                        <ul class="menu-item-transport"></ul>
                    </li>
                <?php } ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </div>
<?php }

function tz_save_portfolio_sorted_order() {
    global $wpdb;
    
    $order = explode(',', $_POST['order']);
    $counter = 0;
    
    foreach($order as $portfolio_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $portfolio_id));
        $counter++;
    }
    die(1);
}

function tz_print_sort_scripts() {
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('tz_portfolio_sort', get_template_directory_uri() . '/admin/js/tz_portfolio_sort.js');
}

function tz_print_sort_styles() {
    wp_enqueue_style('nav-menu');
}
*/

/* Add Custom Columns ------------------------------------------------------*/
function tz_portfolio_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Portfolio Item Title' ),
            "type" => __( 'type' )
        );  
  
        return $columns;  
}  
  
function tz_portfolio_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case __( 'type' ):  
                echo get_the_term_list($post->ID, __( 'portfolio-type' ), '', ', ','');  
                break;
        }  
}  


/* Call our custom functions ---------------------------------------------*/
add_action( 'init', 'post_type_portfolio' );
add_action( 'init', 'build_taxonomies', 0 );
/*
add_action('admin_menu', 'tz_create_portfolio_sort_page');
add_action('wp_ajax_portfolio_sort', 'tz_save_portfolio_sorted_order');

add_filter("manage_edit-portfolio_columns", "tz_portfolio_edit_columns");  
add_action("manage_posts_custom_column",  "tz_portfolio_custom_columns");*/