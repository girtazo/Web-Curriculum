<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Locations Widget
	Plugin URI: http://www.egrappler.com
	Description: A widget that displays locations
	Version: 1.0
	Author: Muhammad Shahbaz Saleem
	Author URI: http://www.egrappler.com

-----------------------------------------------------------------------------------*/

// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'cb_location_widget' );

// Register widget
function cb_location_widget() {
	register_widget( 'cb_LOCATION_Widget' );
}

// Widget class
class cb_location_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function cb_LOCATION_Widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'cb_location_widget',
		'description' => __('A widget that displays locations.', 'cleanbusiness')
	);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 50,
		'id_base' => 'cb_location_widget'
	);

	// Create the widget
	$this->WP_Widget( 'cb_location_widget', __('Locations', 'cleanbusiness'), $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$location1 = $instance['location1'];
	$location2 = $instance['location2'];
	$location3 = $instance['location3'];
	$location4 = $instance['location4'];
	$location5 = $instance['location5'];
	
	$address1 = $instance['address1'];
	$address2 = $instance['address2'];
	$address3 = $instance['address3'];
	$address4 = $instance['address4'];
	$address5 = $instance['address5'];
	
	$telephone1 = $instance['telephone1'];
	$telephone2 = $instance['telephone2'];
	$telephone3 = $instance['telephone3'];
	$telephone4 = $instance['telephone4'];
	$telephone5 = $instance['telephone5'];
	
	$fax1 = $instance['fax1'];
	$fax2 = $instance['fax2'];
	$fax3 = $instance['fax3'];
	$fax4 = $instance['fax4'];
	$fax5 = $instance['fax5'];
	

	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;

	// Display Locations
	 ?>		
	
	<?php if(!empty($location1)){?>	
		<!--address start here-->
		<div>
		  <h5><?php echo $location1;?></h5>      
		  <p><?php echo $address1;?></p>
		  <p>T: <?php echo $telephone1;?></p>
		  <p>F: <?php echo $fax1;?></p>
		</div>
		<!--address end here--> 	
	<?php } ?>
	<?php if(!empty($location2)){?>
		<!--address start here-->
		<div>
		  <h5><?php echo $location2;?></h5>        
		  <p><?php echo $address2;?></p>
		  <p>T: <?php echo $telephone2;?></p>
		  <p>F: <?php echo $fax2;?></p>
		</div>
		<!--address end here--> 		<?php } ?>
	<?php if(!empty($location3)){?>
		<!--address start here-->
		<div>
		  <h5><?php echo $location3;?></h5>    
		  <p><?php echo $address3;?></p>
		  <p>T: <?php echo $telephone3;?></p>
		  <p>F: <?php echo $fax3;?></p>
		</div>
		<!--address end here--> 	
	<?php } ?>
	<?php if(!empty($location4)){?>
		<!--address start here-->
		<div>
		  <h5><?php echo $location4;?></h5>    
		  <p><?php echo $address4;?></p>
		  <p>T: <?php echo $telephone4;?></p>
		  <p>F: <?php echo $fax4;?></p>
		</div>
		<!--address end here--> 	
	<?php } ?>
	<?php if(!empty($location5)){?>
		<!--address start here-->
		<div>
		 <h5><?php echo $location5;?></h5>       
		  <p><?php echo $address5;?></p>
		  <p>T: <?php echo $telephone5;?></p>
		  <p>F: <?php echo $fax5;?></p>
		</div>
		<!--address end here--> 	
	<?php } ?>
	
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
	$instance['location1'] = strip_tags( $new_instance['location1'] );
	$instance['location2'] = strip_tags( $new_instance['location2'] );
	$instance['location3'] = strip_tags( $new_instance['location3'] );
	$instance['location4'] = strip_tags( $new_instance['location4'] );
	$instance['location5'] = strip_tags( $new_instance['location5'] );
	
	$instance['telephone1'] = strip_tags( $new_instance['telephone1'] );
	$instance['telephone2'] = strip_tags( $new_instance['telephone2'] );
	$instance['telephone3'] = strip_tags( $new_instance['telephone3'] );
	$instance['telephone4'] = strip_tags( $new_instance['telephone4'] );
	$instance['telephone5'] = strip_tags( $new_instance['telephone5'] );
	
	$instance['address1'] = strip_tags( $new_instance['address1'] );
	$instance['address2'] = strip_tags( $new_instance['address2'] );
	$instance['address3'] = strip_tags( $new_instance['address3'] );
	$instance['address4'] = strip_tags( $new_instance['address4'] );
	$instance['address5'] = strip_tags( $new_instance['address5'] );
	
	$instance['fax1'] = strip_tags( $new_instance['fax1'] );
	$instance['fax2'] = strip_tags( $new_instance['fax2'] );
	$instance['fax3'] = strip_tags( $new_instance['fax3'] );
	$instance['fax4'] = strip_tags( $new_instance['fax4'] );
	$instance['fax5'] = strip_tags( $new_instance['fax5'] );

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => 'Locations',
		'location1' => '',
		'location2' => '',
		'location3' => '',
		'location4' => '',
		'location5' => '',
		'address1' => '',
		'address2' => '',
		'address3' => '',
		'address4' => '',
		'address5' => '',
		'telephone1' => '',
		'telephone2' => '',
		'telephone3' => '',
		'telephone4' => '',
		'telephone5' => '',
		'fax1' => '',
		'fax2' => '',
		'fax3' => '',
		'fax4' => '',
		'fax5' => '',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'cleanbusiness') ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	
		<!-- Location 1: Text Input -->
		<p>			
			<label for="<?php echo $this->get_field_id( 'location1' ); ?>"><?php _e('Location 1:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'location1' ); ?>" name="<?php echo $this->get_field_name( 'location1' ); ?>" value="<?php echo $instance['location1']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'address1' ); ?>"><?php _e('Address 1:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address1' ); ?>" name="<?php echo $this->get_field_name( 'address1' ); ?>" value="<?php echo $instance['address1']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'telephone1' ); ?>"><?php _e('Telephone 1:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'telephone1' ); ?>" name="<?php echo $this->get_field_name( 'telephone1' ); ?>" value="<?php echo $instance['telephone1']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'fax1' ); ?>"><?php _e('Fax 1:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'fax1' ); ?>" name="<?php echo $this->get_field_name( 'fax1' ); ?>" value="<?php echo $instance['fax1']; ?>" />
		</p>
	
	
		<!-- Location 2: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'location2' ); ?>"><?php _e('Location 2:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'location2' ); ?>" name="<?php echo $this->get_field_name( 'location2' ); ?>" value="<?php echo $instance['location2']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'address2' ); ?>"><?php _e('Address 2:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address2' ); ?>" name="<?php echo $this->get_field_name( 'address2' ); ?>" value="<?php echo $instance['address2']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'telephone2' ); ?>"><?php _e('Telephone 2:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'telephone2' ); ?>" name="<?php echo $this->get_field_name( 'telephone2' ); ?>" value="<?php echo $instance['telephone2']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'fax2' ); ?>"><?php _e('Fax 2:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'fax2' ); ?>" name="<?php echo $this->get_field_name( 'fax2' ); ?>" value="<?php echo $instance['fax2']; ?>" />
		</p>	
		<!-- Location 3: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'location3' ); ?>"><?php _e('Location 3:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'location3' ); ?>" name="<?php echo $this->get_field_name( 'location3' ); ?>" value="<?php echo $instance['location3']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'address3' ); ?>"><?php _e('Address 3:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address3' ); ?>" name="<?php echo $this->get_field_name( 'address3' ); ?>" value="<?php echo $instance['address3']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'telephone3' ); ?>"><?php _e('Telephone 3:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'telephone3' ); ?>" name="<?php echo $this->get_field_name( 'telephone3' ); ?>" value="<?php echo $instance['telephone3']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'fax3' ); ?>"><?php _e('Fax 3:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'fax3' ); ?>" name="<?php echo $this->get_field_name( 'fax3' ); ?>" value="<?php echo $instance['fax3']; ?>" />
		</p>
	
		<!-- Location 4: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'location4' ); ?>"><?php _e('Location 4:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'location4' ); ?>" name="<?php echo $this->get_field_name( 'location4' ); ?>" value="<?php echo $instance['location4']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'address4' ); ?>"><?php _e('Address 4:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address4' ); ?>" name="<?php echo $this->get_field_name( 'address4' ); ?>" value="<?php echo $instance['address4']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'telephone4' ); ?>"><?php _e('Telephone 4:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'telephone4' ); ?>" name="<?php echo $this->get_field_name( 'telephone4' ); ?>" value="<?php echo $instance['telephone4']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'fax4' ); ?>"><?php _e('Fax 4:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'fax4' ); ?>" name="<?php echo $this->get_field_name( 'fax4' ); ?>" value="<?php echo $instance['fax4']; ?>" />
		</p>

		<!-- Location 5: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'location5' ); ?>"><?php _e('Location 5:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'location5' ); ?>" name="<?php echo $this->get_field_name( 'location5' ); ?>" value="<?php echo $instance['location5']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'address5' ); ?>"><?php _e('Address 5:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address5' ); ?>" name="<?php echo $this->get_field_name( 'address5' ); ?>" value="<?php echo $instance['address5']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'telephone5' ); ?>"><?php _e('Telephone 5:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'telephone5' ); ?>" name="<?php echo $this->get_field_name( 'telephone5' ); ?>" value="<?php echo $instance['telephone5']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'fax5' ); ?>"><?php _e('Fax 5:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'fax5' ); ?>" name="<?php echo $this->get_field_name( 'fax5' ); ?>" value="<?php echo $instance['fax5']; ?>" />
		</p>
	
			
	<?php
	}
}
?>