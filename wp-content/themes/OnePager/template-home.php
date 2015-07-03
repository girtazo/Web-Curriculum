<?php 
/*
* Template Name: Home Page Template
*
* The "Template Name:" bit above allows this to be selectable
* from a dropdown menu on the edit page screen.
*/
get_header(); ?>
		<?php 
			  			  		  
			  $image1 = of_get_option('cb_home_image_1');
			  $image2 = of_get_option('cb_home_image_2');
			  $image3 = of_get_option('cb_home_image_3');
			  $image4 = of_get_option('cb_home_image_4');
			  $tag1 = of_get_option('cb_home_tag_1');
			  $tag2 = of_get_option('cb_home_tag_2');
			  $tag3 = of_get_option('cb_home_tag_3');
			  $tag4 = of_get_option('cb_home_tag_4');
			  $desc1 = of_get_option('cb_home_desc_1');
			  $desc2 = of_get_option('cb_home_desc_2');
			  $desc3 = of_get_option('cb_home_desc_3');
			  $desc4 = of_get_option('cb_home_desc_4');
			  $link1 = of_get_option('cb_home_link_1');
			  $link2 = of_get_option('cb_home_link_2');
			  $link3 = of_get_option('cb_home_link_3');
			  $link4 = of_get_option('cb_home_link_4');
			  if(empty($link1)) $link1 = "#";
			  if(empty($link2)) $link2 = "#";
			  if(empty($link3)) $link3 = "#";
			  if(empty($link4)) $link4 = "#";
			  
			  $custom_html = of_get_option('cb_home_custom_html');
			  $custom_html = trim($custom_html);
			  $show_slider = of_get_option('cb_home_slider');	
			  $slider_image1  = of_get_option('cb_home_slider_image_1');
			  $slider_title1 = of_get_option('cb_home_slider_title_1');
			  $slider_sub_title1 = of_get_option('cb_home_slider_sub_title_1');
			  
			  $slider_image2  = of_get_option('cb_home_slider_image_2');
			  $slider_title2 = of_get_option('cb_home_slider_title_2');
			  $slider_sub_title2 = of_get_option('cb_home_slider_sub_title_2');
			  
			  $slider_image3  = of_get_option('cb_home_slider_image_3');
			  $slider_title3 = of_get_option('cb_home_slider_title_3');
			  $slider_sub_title3 = of_get_option('cb_home_slider_sub_title_3');
			  
			  $slider_image4  = of_get_option('cb_home_slider_image_4');
			  $slider_title4 = of_get_option('cb_home_slider_title_4');
			  $slider_sub_title4 = of_get_option('cb_home_slider_sub_title_4');
			  
			  $slider_image5  = of_get_option('cb_home_slider_image_5');
			  $slider_title5 = of_get_option('cb_home_slider_title_5');
			  $slider_sub_title5 = of_get_option('cb_home_slider_sub_title_5');
		?>
		<?php if( isset($show_slider) && $show_slider == '1'){ ?>
		<!--grid_12 start here-->
        <div class="grid_12">
            <div id="slider">		
			 <div class="quake-slider-images">
				<?php if(!empty($slider_image1)){?>
					<img src="<?php echo $slider_image1; ?>" alt=""  />
				<?php } ?>
				<?php if(!empty($slider_image2)){?>
					<img src="<?php echo $slider_image2; ?>" alt=""  />
				<?php } ?>
				<?php if(!empty($slider_image3)){?>
					<img src="<?php echo $slider_image3; ?>" alt=""  />
				<?php } ?>
				<?php if(!empty($slider_image4)){?>
					<img src="<?php echo $slider_image4; ?>" alt=""  />
				<?php } ?>
				<?php if(!empty($slider_image5)){?>
					<img src="<?php echo $slider_image5; ?>" alt=""  />
				<?php } ?>	
			  </div>
			  <div class="quake-slider-captions">
				<?php if(!empty($slider_title1)){?>
				<div class="quake-slider-caption">
					<h1 class="main_title"><?php echo $slider_title1; ?></h1>
					<?php if(!empty($slider_sub_title1)){?>
					<p class="subtitle"><?php echo $slider_sub_title1;?></p>
					<?php } ?>
				</div>
				<?php } ?>
				
				<?php if(!empty($slider_title2)){?>
				<div class="quake-slider-caption">
					<h2 class="main_title"><?php echo $slider_title2; ?></h2>
					<?php if(!empty($slider_sub_title2)){?>
					<p class="subtitle"><?php echo $slider_sub_title2;?></p>
					<?php } ?>
				</div>
				<?php } ?>

				<?php if(!empty($slider_title3)){?>
				<div class="quake-slider-caption">
					<h3 class="main_title"><?php echo $slider_title3; ?></h3>
					<?php if(!empty($slider_sub_title3)){?>
					<p class="subtitle"><?php echo $slider_sub_title3;?></p>
					<?php } ?>
				</div>
				<?php } ?>
				
				<?php if(!empty($slider_title4)){?>
				<div class="quake-slider-caption">
					<h4 class="main_title"><?php echo $slider_title4; ?></h4>
					<?php if(!empty($slider_sub_title4)){?>
					<p class="subtitle"><?php echo $slider_sub_title4;?></p>
					<?php } ?>
				</div>
				<?php } ?>
				
				<?php if(!empty($slider_title5)){?>
				<div class="quake-slider-caption">
					<h5 class="main_title"><?php echo $slider_title5; ?></h5>
					<?php if(!empty($slider_sub_title5)){?>
					<p class="subtitle"><?php echo $slider_sub_title5;?></p>
					<?php } ?>
				</div>
				<?php } ?>
			  </div>         
           </div>
            <!--slider end here-->
        </div>
        <!--grid_12 end here-->
        <div class="clear">
        </div>
		<?php } ?>
        <!--grid_3 start here-->
		
        <div class="grid_3">
            <div class="circle">
				<?php if(!empty($image1)) { ?>
					<a href="<?php echo $link1; ?>">
						<img src="<?php echo $image1; ?>" width="220" height="211" alt="" /></a>
				<?php } ?>
			</div>
        </div>
        <!--grid_3 end here-->
        <!--grid_3 start here-->
        <div class="grid_3">
            <div class="circle">
				<?php if(!empty($image2)) { ?>
					<a href="<?php echo $link2; ?>">
						<img src="<?php echo $image2; ?>" width="220" height="211" alt="" /></a>
				<?php } ?>
			</div>
        </div>
        <!--grid_3 end here-->
        <!--grid_3 start here-->
         <div class="grid_3">
            <div class="circle">
				<?php if(!empty($image3)) { ?>
					<a href="<?php echo $link3; ?>">
						<img src="<?php echo $image3; ?>" width="220" height="211" alt="" /></a>
				<?php } ?>
			</div>
        </div>
        <!--grid_3 end here-->
        <!--grid_3 start here-->
         <div class="grid_3">
            <div class="circle">
				<?php if(!empty($image4)) { ?>
					<a href="<?php echo $link4; ?>">
						<img src="<?php echo $image4; ?>" width="220" height="211" alt="" /></a>
				<?php } ?>
			</div>
        </div>
        <!--grid_3 end here-->
        <div class="clear">
        </div>
        <!--grid_3 start here-->
        <div class="grid_3">
            <!--box start here-->
            <div class="box">
                <h2 class="home-items">
                   <?php echo $tag1; ?>
				</h2>
                <br />
                <p>
                <?php echo $desc1;?>
				</p>
            </div>
            <!--box end here-->
        </div>
        <!--grid_3 end here-->
        <!--grid_3 start here-->
        <div class="grid_3">
            <!--box start here-->
            <div class="box">
                <h2 class="home-items">
                    <?php echo $tag2; ?>
					</h2>
                <br />
                <p>
				<?php echo $desc2;?>
                </p>
            </div>
            <!--box end here-->
        </div>
        <!--grid_3 end here-->
        <!--grid_3 start here-->
        <div class="grid_3">
            <!--box start here-->
            <div class="box">
                <h2 class="home-items">
                    <?php echo $tag3; ?>
					</h2>
                <br />
                <p>
                    <?php echo $desc3;?>
					</p>
            </div>
            <!--box end here-->
        </div>
        <!--grid_3 end here-->
        <!--grid_3 start here-->
        <div class="grid_3">
            <!--box start here-->
            <div class="box">
                <h2 class="home-items">
                    <?php echo $tag4; ?>
					</h2>
                <br />
                <p>
                <?php echo $desc4;?>
				</p>
            </div>
            <!--box end here-->
        </div>
		 <!--grid_3 end here-->
			<div class="clear">
			</div>
			<!--grid_12 start here-->
			<div class="grid_12">
				<div class="divider">
				</div>
			</div>
			<!--grid_12 end here-->
			<div class="clear">
			</div>
        <!--grid_12 start here-->
		<?php if(isset($custom_html) && $custom_html != null){   ?>	
		  		
			<div class="grid_12">   
				<div class="bottom_heading">
					<?php echo $custom_html;?>	
				</div>	           
			</div>
			<!--grid_12 end here-->
			<div class="clear">
			</div>
			<!--grid_12 start here-->
			<div class="grid_12">
				<div class="divider">
				</div>
			</div>
			<!--grid_12 end here-->
			<div class="clear">
			</div>
		<?php } ?>

<?php get_footer(); ?>