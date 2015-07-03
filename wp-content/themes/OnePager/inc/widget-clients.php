<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Clients List Widget
	Plugin URI: http://www.egrappler.com
	Description: A widget that displays clients list
	Version: 1.0
	Author: Muhammad Shahbaz Saleem
	Author URI: http://www.egrappler.com

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'cb_client_widgets' );

// Register widget
function cb_client_widgets() {
	register_widget( 'cb_CLIENT_Widget' );
}

// Widget class
class cb_client_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function cb_CLIENT_Widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'cb_client_widget',
		'description' => __('A widget that displays clients list.', 'cleanbusiness')
	);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 50,
		'id_base' => 'cb_client_widget'
	);

	// Create the widget
	$this->WP_Widget( 'cb_client_widget', __('Featured Clients', 'cleanbusiness'), $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	
	$image1 = $instance['image1'];
	$image2 = $instance['image2'];
	$image3 = $instance['image3'];
	$image4 = $instance['image4'];
	$image5 = $instance['image5'];
	
	$client1 = $instance['client1'];
	$client2 = $instance['client2'];
	$client3 = $instance['client3'];
	$client4 = $instance['client4'];
	$client5 = $instance['client5'];
	
	$link1 = $instance['link1'];
	$link2 = $instance['link2'];
	$link3 = $instance['link3'];
	$link4 = $instance['link4'];
	$link5 = $instance['link5'];
	

	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;

	// Display Images
	 ?>			
    <!--right_side start here-->
    <div> 
	<?php if(!empty($image1)){?>
		<a href="<?php echo $link1;?>"><img src="<?php echo $image1;?>"  alt="<?php echo $client1;?>" /></a>
	<?php } ?>
	<?php if(!empty($image2)){?>
		<a href="<?php echo $link2;?>"><img src="<?php echo $image2;?>"  alt="<?php echo $client2;?>" /></a>
	<?php } ?>
	<?php if(!empty($image3)){?>
		<a href="<?php echo $link3;?>"><img src="<?php echo $image3;?>"  alt="<?php echo $client3;?>" /></a>
	<?php } ?>
	<?php if(!empty($image4)){?>
		<a href="<?php echo $link4;?>"><img src="<?php echo $image4;?>"  alt="<?php echo $client4;?>" /></a>
	<?php } ?>
	<?php if(!empty($image5)){?>
		<a href="<?php echo $link5;?>"><img src="<?php echo $image5;?>"  alt="<?php echo $client5;?>" /></a>
	<?php } ?>
	</div>
    <!--right_side end here--> 
		
	<?php

	// After widget (defined by theme functions file)
	echo $after_widget;	
}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
function update( $new_instance, $old_instance ) {
	
	$instance = $old_instance;

	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['image1'] = strip_tags( $new_instance['image1'] );
	$instance['image2'] = strip_tags( $new_instance['image2'] );
	$instance['image3'] = strip_tags( $new_instance['image3'] );
	$instance['image4'] = strip_tags( $new_instance['image4'] );
	$instance['image5'] = strip_tags( $new_instance['image5'] );
	
	$instance['link1'] = strip_tags( $new_instance['link1'] );
	$instance['link2'] = strip_tags( $new_instance['link2'] );
	$instance['link3'] = strip_tags( $new_instance['link3'] );
	$instance['link4'] = strip_tags( $new_instance['link4'] );
	$instance['link5'] = strip_tags( $new_instance['link5'] );
	
	$instance['client1'] = strip_tags( $new_instance['client1'] );
	$instance['client2'] = strip_tags( $new_instance['client2'] );
	$instance['client3'] = strip_tags( $new_instance['client3'] );
	$instance['client4'] = strip_tags( $new_instance['client4'] );
	$instance['client5'] = strip_tags( $new_instance['client5'] );

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => 'Featured Clients',
		'image1' => '',
		'image2' => '',
		'image3' => '',
		'image4' => '',
		'image5' => '',
		'client1' => '',
		'client2' => '',
		'client3' => '',
		'client4' => '',
		'client5' => '',
		'link1' => '',
		'link2' => '',
		'link3' => '',
		'link4' => '',
		'link5' => '',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'cleanbusiness') ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	
		<!-- Image 1: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'client1' ); ?>"><?php _e('Client 1:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'client1' ); ?>" name="<?php echo $this->get_field_name( 'client1' ); ?>" value="<?php echo $instance['client1']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'image1' ); ?>"><?php _e('Image 1:', 'cleanbusiness') ?> </label>
			<input class="client-image" type="text" id="<?php echo $this->get_field_id( 'image1' ); ?>" name="<?php echo $this->get_field_name( 'image1' ); ?>" value="<?php echo $instance['image1']; ?>" />&nbsp;<input type="button" class="upload_button client-image-upload" value="Upload"/>
			<br/>
			<label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e('link 1:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" value="<?php echo $instance['link1']; ?>" />
		</p>
	
	
		<!-- Image 2: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'client2' ); ?>"><?php _e('Client 2:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'client2' ); ?>" name="<?php echo $this->get_field_name( 'client2' ); ?>" value="<?php echo $instance['client2']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'image2' ); ?>"><?php _e('Image 2:', 'cleanbusiness') ?> </label>
			<input class="client-image" type="text" id="<?php echo $this->get_field_id( 'image2' ); ?>" name="<?php echo $this->get_field_name( 'image2' ); ?>" value="<?php echo $instance['image2']; ?>" />&nbsp;<input type="button" class="upload_button client-image-upload" value="Upload"/>
			<br/>
			<label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e('link 2:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" value="<?php echo $instance['link2']; ?>" />
		</p>	
		<!-- Image 3: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'client3' ); ?>"><?php _e('Client 3:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'client3' ); ?>" name="<?php echo $this->get_field_name( 'client3' ); ?>" value="<?php echo $instance['client3']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'image3' ); ?>"><?php _e('Image 3:', 'cleanbusiness') ?> </label>
			<input class="client-image" type="text" id="<?php echo $this->get_field_id( 'image3' ); ?>" name="<?php echo $this->get_field_name( 'image3' ); ?>" value="<?php echo $instance['image3']; ?>" />&nbsp;<input type="button" class="upload_button client-image-upload" value="Upload"/>
			<br/>
			<label for="<?php echo $this->get_field_id( 'link3' ); ?>"><?php _e('link 3:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" value="<?php echo $instance['link3']; ?>" />
		</p>
	
		<!-- Image 4: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'client4' ); ?>"><?php _e('Client 4:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'client4' ); ?>" name="<?php echo $this->get_field_name( 'client4' ); ?>" value="<?php echo $instance['client4']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'image4' ); ?>"><?php _e('Image 4:', 'cleanbusiness') ?> </label>
			<input class="client-image" type="text" id="<?php echo $this->get_field_id( 'image4' ); ?>" name="<?php echo $this->get_field_name( 'image4' ); ?>" value="<?php echo $instance['image4']; ?>" />&nbsp;<input type="button" class="upload_button client-image-upload" value="Upload"/>
			<br/>
			<label for="<?php echo $this->get_field_id( 'link4' ); ?>"><?php _e('link 4:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link4' ); ?>" name="<?php echo $this->get_field_name( 'link4' ); ?>" value="<?php echo $instance['link4']; ?>" />
		</p>

		<!-- Image 5: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'client5' ); ?>"><?php _e('Client 5:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'client5' ); ?>" name="<?php echo $this->get_field_name( 'client5' ); ?>" value="<?php echo $instance['client5']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'image5' ); ?>"><?php _e('Image 5:', 'cleanbusiness') ?> </label>
			<input class="client-image" type="text" id="<?php echo $this->get_field_id( 'image5' ); ?>" name="<?php echo $this->get_field_name( 'image5' ); ?>" value="<?php echo $instance['image5']; ?>" />&nbsp;<input type="button" class="upload_button client-image-upload" value="Upload"/>
			<br/>
			<label for="<?php echo $this->get_field_id( 'link5' ); ?>"><?php _e('link 5:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link5' ); ?>" name="<?php echo $this->get_field_name( 'link5' ); ?>" value="<?php echo $instance['link5']; ?>" />
		</p>
	
			
	<?php
	}
}
?>