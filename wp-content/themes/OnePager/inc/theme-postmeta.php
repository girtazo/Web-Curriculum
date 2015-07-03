<?php 
/*Metabox for Pages*/

$meta_box_page = array(
	'id' => 'cb-meta-box-page',
	'title' => 'Page Settings',
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
    	
		array(
    			'name' =>  __('Portfolio Layout', 'cleanbusiness'),
    			'desc' => __('No of columns for portfolio', 'cleanbusiness'),
    			'id' => 'cb_portfolio_columns',
    			"type" => "select",
    			'std' => '',
				'options' => array(__('One Column', 'cleanbusiness'), __('Two Columns', 'cleanbusiness'), __('Three Columns', 'cleanbusiness')),
    		)					
	)
);

   $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
   $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

if($template_file == 'template-portfolio.php'){
	add_action('admin_menu', 'cb_add_box');
}

/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function cb_add_box() {

	global $meta_box_page;
	
	add_meta_box($meta_box_page['id'], $meta_box_page['title'], 'cb_show_box_page', $meta_box_page['page'], $meta_box_page['context'], $meta_box_page['priority']);
}

function cb_show_box_page() {
	global $meta_box_page, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="cb_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_page['fields'] as $field) {
		// get current post meta data
		
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {				
			
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" size="50" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '"  style="width:75%; margin-right: 20px; float:left;" />';
			
			break;             
    		
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';				
				} 				
				echo'</select>';
			
			break;
		}

	}
 
	echo '</table>';
}

add_action('save_post', 'meta_box_save_data');


/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function meta_box_save_data($post_id) {
	global $meta_box_page;
 
	// verify nonce
	if (!isset($_POST['cb_meta_box_nonce']) || !wp_verify_nonce($_POST['cb_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ($_POST['post_type'] =='page') {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	} 
		
	foreach ($meta_box_page['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']]; 
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

}

