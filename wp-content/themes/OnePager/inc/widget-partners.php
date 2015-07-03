<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Parters List Widget
	Plugin URI: http://www.egrappler.com
	Description: A widget that displays partners list
	Version: 1.0
	Author: Muhammad Shahbaz Saleem
	Author URI: http://www.egrappler.com

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'cb_partner_widgets' );

// Register widget
function cb_partner_widgets() {
	register_widget( 'cb_PARTNER_Widget' );
}

// Widget class
class cb_partner_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function cb_PARTNER_Widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'cb_partner_widget',
		'description' => __('A widget that displays partners list in the footer.', 'cleanbusiness')
	);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 50,
		'id_base' => 'cb_partner_widget'
	);

	// Create the widget
	$this->WP_Widget( 'cb_partner_widget', __('Partners List', 'cleanbusiness'), $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$partner1 = $instance['partner1'];
	$partner2 = $instance['partner2'];
	$partner3 = $instance['partner3'];
	$partner4 = $instance['partner4'];
	$partner5 = $instance['partner5'];
	

	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;

	// Display Partners List
	 ?>		
	
	<?php if(!empty($partner1)){?>
    <p class="text_shadow"><?php echo $partner1;?></p>
	<?php } ?>
	<?php if(!empty($partner2)){?>
    <p class="text_shadow"><?php echo $partner2;?></p>
	<?php } ?>
	<?php if(!empty($partner3)){?>
    <p class="text_shadow"><?php echo $partner3;?></p>
	<?php } ?>
	<?php if(!empty($partner4)){?>
    <p class="text_shadow"><?php echo $partner4;?></p>
	<?php } ?>
	<?php if(!empty($partner5)){?>
    <p class="text_shadow"><?php echo $partner5;?></p>
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
	$instance['partner1'] = strip_tags( $new_instance['partner1'] );
	$instance['partner2'] = strip_tags( $new_instance['partner2'] );
	$instance['partner3'] = strip_tags( $new_instance['partner3'] );
	$instance['partner4'] = strip_tags( $new_instance['partner4'] );
	$instance['partner5'] = strip_tags( $new_instance['partner5'] );

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => 'Partners',
		'partner1' => '',
		'partner2' => '',
		'partner3' => '',
		'partner4' => '',
		'partner5' => '',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'cleanbusiness') ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	
		<!-- Partner 1: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'partner1' ); ?>"><?php _e('Partner 1:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'partner1' ); ?>" name="<?php echo $this->get_field_name( 'partner1' ); ?>" value="<?php echo $instance['partner1']; ?>" />
		</p>
	
	
		<!-- Partner 2: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'partner2' ); ?>"><?php _e('Partner 2:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'partner2' ); ?>" name="<?php echo $this->get_field_name( 'partner2' ); ?>" value="<?php echo $instance['partner2']; ?>" />
		</p>
	
		<!-- Partner 3: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'partner3' ); ?>"><?php _e('Partner 3:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'partner3' ); ?>" name="<?php echo $this->get_field_name( 'partner3' ); ?>" value="<?php echo $instance['partner3']; ?>" />
		</p>
	
		<!-- Partner 4: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'partner4' ); ?>"><?php _e('Partner 4:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'partner4' ); ?>" name="<?php echo $this->get_field_name( 'partner4' ); ?>" value="<?php echo $instance['partner4']; ?>" />
		</p>

		<!-- Partner 5: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'partner5' ); ?>"><?php _e('Partner 5:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'partner5' ); ?>" name="<?php echo $this->get_field_name( 'partner5' ); ?>" value="<?php echo $instance['partner5']; ?>" />
		</p>
	
			
	<?php
	}
}
?>