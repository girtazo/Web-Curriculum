<?php

/*-----------------------------------------------------------------------------------
	Add image upload metaboxes to Portfolio items
-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$meta_box_portfolio = array(
	'id' => 'meta-box-portfolio',
	'title' =>  __('Portfolio Detail Settings', 'cleanbusiness'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(    	
    	array(
    	   'name' => __('Portfolio Date', 'cleanbusiness'),
    	   'desc' => __('What was the date of the completed portfolio', 'cleanbusiness'),
    	   'id' => 'cb_portfolio_date',
    	   'type' => 'text',
    	   'std' => ''
    	),
    	array(
    	   'name' => __('Portfolio Client', 'cleanbusiness'),
    	   'desc' => __('For whom was the portfolio completed', 'cleanbusiness'),
    	   'id' => 'cb_portfolio_client',
    	   'type' => 'text',
    	   'std' => ''
    	),
    	array(
    	   'name' => __('Portfolio URL', 'cleanbusiness'),
    	   'desc' => __('What is the URL for the Portfolio?', 'cleanbusiness'),
    	   'id' => 'cb_portfolio_url',
    	   'type' => 'text',
    	   'std' => ''
    	)
	)
);

$meta_box_portfolio_image = array(
	'id' => 'meta-box-portfolio-image',
	'title' => __('Image Settings', 'cleanbusiness'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => '',
				"desc" => '',
				"id" => "cb_portfolio_upload_images",
				"type" => 'button',
				'std' => 'Upload Images'
			)
    )
);

add_action('admin_menu', 'add_box_portfolio');


/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function add_box_portfolio() {
	global $meta_box_portfolio, $meta_box_portfolio_image, $meta_box_portfolio_video, $meta_box_portfolio_audio, $meta_box_portfolio_background;
	
	add_meta_box($meta_box_portfolio['id'], $meta_box_portfolio['title'], 'show_box_portfolio', $meta_box_portfolio['page'], $meta_box_portfolio['context'], $meta_box_portfolio['priority']);

	add_meta_box($meta_box_portfolio_image['id'], $meta_box_portfolio_image['title'], 'show_box_portfolio_image', $meta_box_portfolio_image['page'], $meta_box_portfolio_image['context'], $meta_box_portfolio_image['priority']);	

}


/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function show_box_portfolio() {
	global $meta_box_portfolio, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('Select your preferred Portfolio Type and fill out the additional information fields.', 'cleanbusiness').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
 
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;		          
			
		}

	}
 
	echo '</table>';
}

function show_box_portfolio_image() {
	global $meta_box_portfolio_image, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('Upload images to be used for this portfolio (images should be at least 940px wide). Set a featured image that will be displayed on the main portfolio page. The featured image will not be included in the single portfolio page so it can be smaller than 940px wide.', 'cleanbusiness').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio_image['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) { 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
 
			//If Button	
			case 'button':
					echo '<tr><td><input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;		
		
		}

	}
 
	echo '</table>';
}
 
add_action('save_post', 'save_data_portfolio');


/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function save_data_portfolio($post_id) {
	global $meta_box_portfolio, $meta_box_portfolio_image;
 
	// verify nonce
	if (!wp_verify_nonce($_POST['meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	foreach ($meta_box_portfolio['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

	foreach ($meta_box_portfolio_image['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}	
}


/*-----------------------------------------------------------------------------------*/
/*	Queue Scripts
/*-----------------------------------------------------------------------------------*/
 
function admin_scripts_portfolio() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('upload', get_template_directory_uri() . '/js/upload-button.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('upload');	
}
function admin_styles_portfolio() {
	wp_enqueue_style('thickbox');	
}
add_action('admin_print_scripts', 'admin_scripts_portfolio');
add_action('admin_print_styles', 'admin_styles_portfolio');