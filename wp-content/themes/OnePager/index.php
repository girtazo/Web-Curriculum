<?php get_header();?>

<div class="hidden-xs" id="frame-top"></div>
<div class="container">
  <!-- content -->
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
            <?php

              show_menu_left();

              if( count( $sections_menu ) ){

                foreach ( $sections_menu as $id => $section ) {
                ?>
                  <li><a href="#<?=$id?>"><?=ot_get_option( $section["settings"]["header_section"]["id"] )?></a></li>
                <?php
                }
              }
            ?>
            </ul>

          </div>
        </div>

      </div>
    </div>
    <!-- the sections -->
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-8 col-sm-offset-4 col-md-offset-3 col-lg-offset-4" id="container">
      
      <div class="container fixed .hidden-xs">

        <div id="frame-top-container" class="col-xs-12 col-sm-8 col-md-9 col-lg-8 col-sm-offset-4 hidden-xs"></div>

      </div>
      <?php
      if( count( $options_theme ) ){

        foreach ( $options_theme as $key => $section ) {
        ?>
        
          <div class="page" id="<?=$section[id]?>">
          <?php
            $content = '';
            $header_section = '';

            /* Load content setting theme*/
            foreach ( $section["settings"] as $taxonomy => $setting ) {

              switch ( $taxonomy ) {

                case 'header_section':
                  
                  if ( ! empty(ot_get_option( $setting["id"] ) ) )  {
                    
                    $header_section = '<h3 class="page_title taxonomy_' . $taxonomy . ' ' . $setting["class"] . '">' . ot_get_option( $setting["id"] ) . '</h3>';
                  }
                  break;
                case 'HTML':
                  
                  $content =  '<div class="page_content html taxonomy_' . $taxonomy . ' ' . $setting["class"] . '">' . ot_get_option( $setting["id"] ) . '</div>';
                  break;
                case 'group_tags':
                  
                  $group_tags = ot_get_option( $setting["id"] );
                  $last_tag   = count( $group_tags ) -1;
                  $content .= '<div class="page_content group-tags taxonomy_' . $taxonomy . ' ' . $setting["class"] . '">';
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
                  <div class="page_content row knob-jquery taxonomy_' . $taxonomy . ' ' . $setting["class"] . '">';

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
                      <div class="knob-box col-xs-12 col-sm-6 col-md-6 col-lg-4 ' . $class_order . '">
                        
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
      
  </div>
  
</div>
<a class="gotop" href="#top">Top</a>