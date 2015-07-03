<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Our Team Widget
	Plugin URI: http://www.egrappler.com
	Description: A widget that displays team members
	Version: 1.0
	Author: Muhammad Shahbaz Saleem
	Author URI: http://www.egrappler.com

-----------------------------------------------------------------------------------*/

// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'cb_ourteam_widgets' );

// Register widget
function cb_ourteam_widgets() {
	register_widget( 'cb_OURTEAM_Widget' );
}

// Widget class
class cb_ourteam_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function cb_OURTEAM_Widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'cb_ourteam_widget',
		'description' => __('A widget that displays team members.', 'cleanbusiness')
	);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 50,
		'id_base' => 'cb_ourteam_widget'
	);

	// Create the widget
	$this->WP_Widget( 'cb_ourteam_widget', __('Team Members', 'cleanbusiness'), $widget_ops, $control_ops );
	
}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	
	$name1 = $instance['name1'];
	$name2 = $instance['name2'];
	$name3 = $instance['name3'];
	$name4 = $instance['name4'];
	$name5 = $instance['name5'];
	
	$image1 = $instance['image1'];
	$image2 = $instance['image2'];
	$image3 = $instance['image3'];
	$image4 = $instance['image4'];
	$image5 = $instance['image5'];
	

	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;

	// Display Team Members
	 ?>		
	
    <!--right_side end here--> 
    <div>
		<?php if(!empty($name1)){?>
			<a href="#"><img src="<?php echo $image1;?>" alt="<?php echo $name1;?>"/></a>
		<?php } ?>
		<?php if(!empty($name2)){?>
			<a href="#"><img src="<?php echo $image2;?>" alt="<?php echo $name2;?>"/></a>
		<?php } ?>
		<?php if(!empty($name3)){?>
			<a href="#"><img src="<?php echo $image3;?>" alt="<?php echo $name3;?>"/></a>
		<?php } ?>
		<?php if(!empty($name4)){?>
			<a href="#"><img src="<?php echo $image4;?>" alt="<?php echo $name4;?>"/></a>
		<?php } ?>
		<?php if(!empty($name5)){?>
			<a href="#"><img src="<?php echo $image5;?>" alt="<?php echo $name5;?>"/></a>
		<?php } ?>
	</div>
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
	
	$instance['name1'] = strip_tags( $new_instance['name1'] );
	$instance['name2'] = strip_tags( $new_instance['name2'] );
	$instance['name3'] = strip_tags( $new_instance['name3'] );
	$instance['name4'] = strip_tags( $new_instance['name4'] );
	$instance['name5'] = strip_tags( $new_instance['name5'] );

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => 'Team Members',		
		'name1' => '',
		'name2' => '',
		'name3' => '',
		'name4' => '',
		'name5' => '',
		'image1' => '',
		'image2' => '',
		'image3' => '',
		'image4' => '',
		'image5' => '',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'cleanbusiness') ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	
		<!-- Ourteam 1: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'name1' ); ?>"><?php _e('Name 1:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'name1' ); ?>" name="<?php echo $this->get_field_name( 'name1' ); ?>" value="<?php echo $instance['name1']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'image1' ); ?>"><?php _e('Image 1:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'image1' ); ?>" name="<?php echo $this->get_field_name( 'image1' ); ?>" value="<?php echo $instance['image1']; ?>" />
		</p>
	
	
		<!-- Ourteam 2: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'name2' ); ?>"><?php _e('Name 2:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'name2' ); ?>" name="<?php echo $this->get_field_name( 'name2' ); ?>" value="<?php echo $instance['name2']; ?>" />
						
			<label for="<?php echo $this->get_field_id( 'image2' ); ?>"><?php _e('Image 2:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'image2' ); ?>" name="<?php echo $this->get_field_name( 'image2' ); ?>" value="<?php echo $instance['image2']; ?>" />
		</p>	
		<!-- Ourteam 3: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'name3' ); ?>"><?php _e('Name 3:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'name3' ); ?>" name="<?php echo $this->get_field_name( 'name3' ); ?>" value="<?php echo $instance['name3']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'image3' ); ?>"><?php _e('Image 3:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'image3' ); ?>" name="<?php echo $this->get_field_name( 'image3' ); ?>" value="<?php echo $instance['image3']; ?>" />
		</p>
	
		<!-- Ourteam 4: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'name4' ); ?>"><?php _e('Name 4:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'name4' ); ?>" name="<?php echo $this->get_field_name( 'name4' ); ?>" value="<?php echo $instance['name4']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'image4' ); ?>"><?php _e('Image 4:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'image4' ); ?>" name="<?php echo $this->get_field_name( 'image4' ); ?>" value="<?php echo $instance['image4']; ?>" />
		</p>

		<!-- Ourteam 5: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'name5' ); ?>"><?php _e('Name 5:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'name5' ); ?>" name="<?php echo $this->get_field_name( 'name5' ); ?>" value="<?php echo $instance['name5']; ?>" />
			
			<label for="<?php echo $this->get_field_id( 'image5' ); ?>"><?php _e('image 5:', 'cleanbusiness') ?> </label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'image5' ); ?>" name="<?php echo $this->get_field_name( 'image5' ); ?>" value="<?php echo $instance['image5']; ?>" />
		</p>
	
			
	<?php
	}
}
?>