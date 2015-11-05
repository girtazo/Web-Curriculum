<?php get_header();?>

<div class="hidden-xs" id="frame-top"></div>
<div class="container">
  <!-- wrapper -->
  <div class="row">
    <!-- the  sidebar -->
    <div id="sidebar-fixed" class="container vertical-max fixed">

      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-4" id="sidebar">
        
        <!-- logo -->
        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
            <a href="<?php echo $link1; ?>" id="logo">

              <img src=<?php echo '"' . $logo . '"'; ?> alt="curriculum image"  /> 
          
            </a>

          </div>
        </div>
        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          
            <!-- navigation menu -->
            <ul id="navigation">
            <?php show_menu_left(); ?>
            </ul>

          </div>
        </div>

      </div>
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-8 col-sm-offset-4 col-md-offset-3 col-lg-offset-4" id="container">
      
      <div class="container fixed hidden-xs">

        <div id="frame-top-container" class="col-xs-12 col-sm-8 col-md-9 col-lg-8 hidden-xs"></div>

      </div>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      	<div class="page" id="<?=the_title();?>">

      		<h3 class="page_title"><?=the_title();?></h3>
      		<div class="page_content">
      			
				<?php the_content(); ?>

			</div>

		</div>

      <?php endwhile; endif; ?>
      
    </div>

  </div>
  
</div>