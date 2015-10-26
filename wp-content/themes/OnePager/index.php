<?php get_header(); ?>

<div id="frame-top"></div>
<div class="container">
  <!-- wrapper -->
  <div class="row">

    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" id="sidebar">

      <!-- the  sidebar -->
      <!-- logo -->
      <a href="<?php echo $link1; ?>" id="logo">

        <img src="<?php $logo=ot_get_option('logo_image'); echo $logo; ?>" alt=""  /> 
      </a> 
      <!-- navigation menu -->
      <ul id="navigation">
      <?php 
      
      // Recogida de Opciones Menu
      $sections = get_option( 'option_tree_settings' )["sections"];
      $settings = get_option( 'option_tree_settings' )["settings"];
      
      // Construcción de Opciones de Tema
      foreach ($sections as $key => $section) {

        $options_theme[$section["id"]] = $section;
      }

      foreach ($settings as $key => $setting) {
        
        $options_theme[$setting["section"]]["settings"][$setting["id"]] = $setting;
      }
      
      /** 
      * Construccion de Opciones de Tema
      * @option_theme array
      * desc - theme options
      */
      foreach ($options_theme as $key => $section) {

        foreach ($section["settings"] as $key => $setting) {

          if( $setting["taxonomy"] = "item_menu" ) {

           if( ot_get_option( $setting["id"] ) == "on" ) {

              $sections_menu[] = $section;
            }
          }
        }
      }

      wp_nav_menu();

      if( count( $sections_menu ) ){

        foreach ($sections_menu as $key => $section_menu) {
        ?>
          <li><a href="#<?=$section_menu[id]?>"><?=$section_menu[title]?></a></li>
        <?php
        }
      }
      ?>
      </ul>
    </div>
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3" id="container">

      <?php
      if( count( $options_theme ) ){
      
        foreach ( $options_theme as $key => $section ) {
        ?>
        
          <div class="page" id="<?=$section[id]?>">
          <?php
            $content = '';
            $header_section = '';

            /* Load content setting theme*/
            foreach ( $section["settings"] as $key => $setting ) {

              switch ( $setting["taxonomy"] ) {

                case 'header_section':
                  
                  if ( ! empty(ot_get_option( $setting["id"] ) ) )  {
                    
                    $header_section = '<h3 class="page_title taxonomy_' . $setting["taxonomy"] . ' ' . $setting["class"] . '">' . ot_get_option( $setting["id"] ) . '</h3>';
                  }
                  break;
                case 'HTML':
                  
                  $content =  '<div class="page_content html taxonomy_' . $setting["taxonomy"] . ' ' . $setting["class"] . '">' . ot_get_option( $setting["id"] ) . '</div>';
                  break;
                case 'group_tags':
                  
                  $group_tags = ot_get_option( $setting["id"] );
                  $last_tag   = count( $group_tags ) -1;
                  $content .= '<div class="page_content group-tags taxonomy_' . $setting["taxonomy"] . ' ' . $setting["class"] . '">';
                  foreach ( $group_tags as $num_tag => $tag ) {

                      switch ( $num_tag ) {
                        case 0:

                          $content .= '<div class="tag first-tag">' . $tag . '</div>';
                          break;
                        case $last_tag:

                          $content .= '<div class="tag last-tag">' . $tag . '</div>';
                          break;
                        default:

                          $content .= '<div class="tag">' . $tag . '</div>';
                          break;
                      } }

                  $content .= '</div>';
                  break;
                case 'knob_jquery':

                  $knobs      = ot_get_option( $setting[ "id" ] );
                  $last_knob  = count( $knobs ) -1;
                  $content = '
                  <div class="page_content knob-jquery taxonomy_' . $setting["taxonomy"] . ' ' . $setting["class"] . '">';

                    foreach ( $knobs as $number_knob => $knob ) {

                      switch ( $number_knob ) {
                        case 0:

                          $class_order = 'first-knob';
                          break;
                        case $last_knob:

                          $class_order = 'last-knob';
                          break;
                        default:

                          $class_order = '';
                          break;
                      } 

                      $content .= '
                      <div class="knob-box ' . $class_order . '" style="height:'.$knob["options"]["data-width"].'px;">
                        
                        <input class="knob" 
                          data-displayprevious="true"
                          data-readonly="true" ';
                          foreach ( $knob["options"] as $option => $value ) {
                            
                            $content .= $option . '='.$value . ' '; }
                        $content .= '
                        >
                        <h4 class="blue">'.$knob['skill'].'</h4>';
                    
                      $content .= '
                      </div>'; 
                    }

                  $content .= '
                  </div>';
                  break;
                default:
                  break;
              }
            }

            /*Show content setting theme*/
            echo $header_section;
            echo $content;

          ?>
          </div>
        <?php
        }
      }
      ?>
      <!-- page container -->
      <div class="page" id="home"> 
        <!-- page home -->
        <div class="page_content">

          <?php $enableslider = ot_get_option('my_checkbox'); if ( $enableslider[0] == 'yes' ) { ?>
            
            <div class="gf-slider"> 
              <!-- slider -->
              <ul class="slides">

                <?php 

                if ( function_exists( 'ot_get_option' ) ) {
                  
                  $enableslider=ot_get_option('my_checkbox');
                  
                  $slides = ot_get_option( 'my_slider',array());
                  $client_settings = ot_get_option( 'client_settings',array());
                  $industry_settings = ot_get_option( 'industry_settings',array());
                  $skills = ot_get_option( 'skills_settings',array());
                  $aboutus_desc = ot_get_option( 'aboutus_desc',array());
                  $industry_desc = ot_get_option( 'industry_desc',array());
                  $portfolio_desc = ot_get_option( 'portfolio_desc',array());
                  $clients_desc = ot_get_option( 'clients_desc',array());
                  $social_facebook = ot_get_option( 'social_facebook',array());
                  $social_twitter = ot_get_option( 'social_twitter',array());
                  $social_linkedin = ot_get_option( 'social_linkedin',array());
                  
                  
                  
                  if ( ! empty( $slides ) && $enableslider[0]=='yes' ) {
                    
                    foreach( $slides as $slide ) {
                      
                      echo '<li> <?php if(!empty($slider_image1)){?>
                        <img src="'.$slide['slider_image'].'" alt=""  /> <?php } ?>
                        <p class="flex-caption">'. $slide['slider_caption'].'</p>
                        </li>';
                    }
                  }
                } ?>
                
              </ul>
            </div>

          <?php } ?>
          <div class="space"> </div>
          <div class="clear"> </div>
          <!-- services -->

          <?php $i=0; if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php if ($i==0) { ?>

              <div class="one_half first">
                <div class="column_content">
                  <h4><?php echo get_the_title();  ?></h4>
                  <?php if (has_post_thumbnail( $post->ID ) ){ ?>
                  <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID ) ); ?>" class="left no_border" alt="" style="margin-top: 10px; margin-right: 10px" />
                  <?php } ?>
                  <p><small><?php the_content(__('Read More...', 'onepager')); ?></small></p>
                </div>
              </div>

            <?php $i=1; } else {  ?>

              <div class="one_half last">
                <div class="column_content">
                  <h4><?php echo get_the_title(); ?></h4>

                  <?php if (has_post_thumbnail( $post->ID ) ){ ?> 
                  <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID ) ); ?>" class="left no_border" alt="" style="margin-top: 10px; margin-right: 10px" />
                      <?php } ?>
                      <p><small><?php the_content(__('Read More...', 'onepager')); ?></small></p>
                </div>
              </div>

            <?php $i=0; } ?>
          <?php endwhile; ?>
          <?php else : ?>
            <h2>Not Found</h2>
          <?php endif; ?>

          <div class="clear"> </div>
        </div>
      </div>
      <div class="page" id="about"> 
        <!-- page about -->
        <h3 class="page_title"> About Us</h3>
        <div class="page_content">
          <?php echo $aboutus_desc;  ?>
        </div>
      </div>
      <div class="page" id="portfolio"> 
        <!-- page portfolio -->
        <h3 class="page_title"> Portfolio</h3>
        <div class="page_content">

          <?php if(isset($portfolio_desc)) {echo $portfolio_desc;}  ?>
        
            <ul id="works_filter">
              <li><a href="#" data-filter="*" class="selected">Show All</a></li>
              <?php 
              $terms = get_terms("portfolio-type");
              $count = count($terms);
              if ( $count > 0 ){
                foreach ( $terms as $term ) {
                  echo '<li><a href="#" data-filter=".'.$term->name.'">'.$term->name.'</a></li>';
                }
              } ?>
            </ul>
          <div class="clear"> </div>
          <div id="works"> 
      
            <?php 
            $args = array(
              'post_type' => 'portfolio',
              'orderby' => 'menu_order',
              'order' => 'ASC',
              'posts_per_page' => -1
            );
            $query = new WP_Query( $args );

            while ( $query->have_posts() ) : $query->the_post(); ?>

              <?php 
              $terms =  get_the_terms( $post->ID, 'portfolio-type' );
            
              $term_list = '';
              if( is_array($terms) ) {

                foreach( $terms as $term ) {

                    $term_list .= ($term->name);
                    $term_list .= ' ';
                }
              }
              $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
              <?php echo '<a rel="prettyPhoto[gallery]" href="'.$url.'"> <img class="work '.$term_list.'"'.'src="'.$url.'" alt="" /> </a>'  ?>
        
            <?php endwhile; ?>
            <!-- works --> 
          </div>
          <div class="clear"> </div>
        </div>
      </div>
      <div class="page" id="skills"> 
        <!-- page skills -->
        <h3 class="page_title"> Our Skills</h3>
        <div class="page_content"> 
          <?php if ( ! empty( $skills ) ) {

            foreach( $skills as $skill ) {

              echo '<div class="one_fourth">
              <div class="column_content">
                <h4 class="blue">'.$skill['title'].'</h4>
                <input class="knob" data-readonly="true" data-width="120" data-min="0" data-angleoffset="0"
                                    data-displayprevious="true" value="'.$skill['skill_value'].'" data-fgcolor="#cfdee7" data-bgcolor="#0d4667">
              </div>
              </div>' ;
            }
          } ?>
          <div class="clear"> </div>
        </div>
      </div>
      <div class="page" id="industries"> 
        <!-- page industries -->
        <h3 class="page_title"> Industries We Serve!</h3>
        <div class="page_content">
          <?php echo $industry_desc;  ?>
          <div class="space"> </div>
          <div class="clear"> </div>
          <ul class="sublist">
            <?php foreach( $industry_settings as $industry ) {
              echo '<li><a href="'.$industry['industry_url'].'">'.$industry['title'].'</a></li>';
            }  ?>
          </ul>
          <div class="clear"> </div>
        </div>
      </div>
      <div class="page" id="myclients"> 
        <!-- page clients -->
        <h3 class="page_title"> Our Clients</h3>
        <div class="page_content">
          <?php if(isset($clients_desc)) {echo $clients_desc;}  ?>
         
          <div class="space"> </div>
          <div class="clear"> </div>
          <ul id="clients" class="grid">

          <?php foreach( $client_settings as $client ) {

            echo '<li class="'.$client['title'].'"><a href="'.$client['client_url'].'" rel="'.$client['title'].'"> <img src="'.$client['client_image'].'" alt="'.$client['title'].'"></a></li>';
          } ?>
           
          </ul>
          <div class="clear"> </div>
        </div>
      </div>
      <div class="page" id="contact"> 
        <!-- page contact -->
        <h3 class="page_title"> Let's Get in Touch</h3>
        <div class="page_content">
          <fieldset id="contact_form">
            <div id="msgs"> </div>
            <form id="cform" name="cform" method="post" action="">
              <input type="text" id="name" name="name" value="Full Name*" onfocus="if(this.value == 'Full Name*') this.value = ''"
                              onblur="if(this.value == '') this.value = 'Full Name*'" />
              <input type="text" id="email" name="email" value="Email Address*" onfocus="if(this.value == 'Email Address*') this.value = ''"
                              onblur="if(this.value == '') this.value = 'Email Address*'" />
              <input type="text" id="subject" name="subject" value="Subject*" onfocus="if(this.value == 'Subject*') this.value = ''"
                              onblur="if(this.value == '') this.value = 'Subject*'" />
              <textarea id="msg" name="msg" onfocus="if(this.value == 'Your Message*') this.value = ''"
                              onblur="if(this.value == '') this.value = 'Your Message*'">Your Message*</textarea>
              <button id="submit" class="button"> Send Message</button>
            </form>
          </fieldset>
          <div class="clear"> </div>
          <ul class="social_icons">
            <li><a href="<?php echo $social_facebook;  ?>" id="fb" original-title="Join My Fan Club"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png" alt="Facebook" /></a></li>
            <li><a href="<?php echo $social_twitter;  ?>" id="tw" original-title="Follow Me on Twitter"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png" alt="Twitter" /></a></li>
            <li><a href="<?php echo $social_linkedin;  ?>" id="ld" original-title="Find me on LinkedIn"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin.png" alt="LinkedIn" /></a></li>
          </ul>
        </div>
      </div>
      <div class="footer">
        <p> &copy; 2012 <a href="http://eGrappler.com">eGrappler.com</a>. Some Rights Reserved.</p>
        <p> Designed With Love by <a href="http://esarfraz.com">Sarfraz Shoukat</a></p>
      </div>
    </div>

  </div>
  
</div>
<a class="gotop" href="#top">Top</a>