<?php 
/*
* Template Name: Contact Page Template
*
* The "Template Name:" bit above allows this to be selectable
* from a dropdown menu on the edit page screen.
*/


$nameError = '';
$emailError = '';
$commentError = '';

 if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
		$designation  = trim($_POST['designation']);
		$company = trim($_POST['company']);
		
		if(trim($_POST['contactName']) === '') {
			$nameError = 'Please enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		if(trim($_POST['email']) === '')  {
			$emailError = 'Please enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		if(trim($_POST['comments']) === '') {
			$commentError = 'Please enter a message.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		if(!isset($hasError)) {
			$emailTo = get_option('tz_email');
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}
			$subject = '[Contact Form] From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nCompany: $company \n\nDesignation: $designation \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}
	
} 
get_header(); ?>	        
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	  
	  
	  <div class="grid_12">
	  <?php the_content();?>
	  </div>	  
	  <!--grid_3 start here-->
	  <div class="grid_3" id="our-locations">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Our Locations') ) : ?>
			<?php endif; ?>	    
	  </div>	  
	  <!--grid_3 end here--> 
  
	  <!--grid_9 start here-->
	  <div class="grid_9"> 
		
		<?php if(isset($emailSent) && $emailSent == true) { ?>
			
			<div class="thanks">
				<p><?php _e('Thanks, your email was sent successfully.', 'cleanbusiness') ?></p>
			</div>

		<?php } else { ?>
		<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
			<!--contact_form start here-->
			<div id="contact_form"> 			  
			  <!--section start here-->
			  <div class="section nomarginleft">
				<label><?php _e('Full Name', 'cleanbusiness') ?></label>		
				<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>"  />
				
				<?php if($nameError != '') { ?>
					<span class="error"><?php echo $nameError; ?></span> 
				<?php } ?>
				
				<div class="required">required</div>
				<div class="clear"></div>
				<br />
				<br />
				<label><?php _e('Email Address', 'cleanbusiness') ?></label>				
				<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>"  />
				<?php if($emailError != '') { ?>
					<span class="error"><?php echo $emailError; ?></span>
				<?php } ?>
				<div class="required_mail">required</div>
			  </div>
			  <!--section end here--> 
			  
			  <!--section start here-->
			  <div class="section">
				<label><?php _e('Company', 'cleanbusiness') ?></label>
				<input name="company" id="company" type="text" value="<?php if(isset($_POST['company']))  echo $_POST['company'];?>" />
				<div class="clear"></div>
				<br />
				<br />
				<label><?php _e('Designation', 'cleanbusiness') ?></label>
				<input name="designation" id="designation" type="text" value="<?php if(isset($_POST['designation']))  echo $_POST['designation'];?>" />
			  </div>
			  <!--section end here-->
			  <div class="clear"></div>
			  <br />
			  <br />
			  <label><?php _e('Message', 'cleanbusiness') ?></label>			  
			  <textarea name="comments" id="commentsText" rows="20" cols="30" class="message"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
			  <?php if($commentError != '') { ?>
					<span class="error"><?php echo $commentError; ?></span> 
			  <?php } ?>			  
			  <div><input type="submit" value="<?php _e("Send Message","cleanbusiness");?>"/></div>
			</div>
			<!--contact_form end here--> 
		  </form>	
		<?php } ?>
	  </div>
	  <!--grid_9 end here-->
	  
	  <div class="clear"></div>
	  <br />
	  <br />
	  <br />
	  <br />		
			
				
	<?php endwhile; endif; ?>		
			
<?php get_footer(); ?>