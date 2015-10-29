<?php 

/*Codigo Modificado*/

/*Codigo Orginal
/**
 * Initialize the options before anything else. 
 */
/*+add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
/*+function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
/*+  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  /*+$custom_settings = array(
    'contextual_help' => array(
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => 'General1',
          'content'   => '<p>Help content goes here!</p>'
        )
      ),
      'sidebar'       => '<p>Sidebar content goes here!</p>',
    ),
    'sections'        => array(
      array(
          'id'          => 'general',
          'title'       => 'Opciones Generales'
      ),
      array(
          'id'          => 'slider',
          'title'       => 'Slider'
      ),
  	  array(
          'id'          => 'aboutus',
          'title'       => 'Sobre ti'
      ),
  	  array(
          'id'          => 'portfolio',
          'title'       => 'Portafolio'
      ),
  	  array(
          'id'          => 'skills',
          'title'       => 'Habilidades'
      ),
  	  array(
          'id'          => 'industries',
          'title'       => 'Industrias'
      ),
  	  array(
          'id'          => 'clients',
          'title'       => 'Clientes'
      ),
      array(
          'id'          => 'social',
          'title'       => 'Redes Sociales'
      )
    ),
    'settings'        => array(
      array(
        'id'      => 'logo_image',
        'label'   => 'Foto',
        'desc'    => 'Elige tu Foto de perfil para tu Curriculum',
        'std'     => '',
  			'section'  =>'general',
        'type'    => 'upload',
        'class'   => '',
        'choices' => array("usuario.jpg")),
  	  array(
        'id'          => 'skills_settings',
        'label'       => 'Habilidades',
        'desc'        => 'Indica tus habilidades profesionales',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'skills',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'skill_value',
            'label'   => 'Nivel de habilidad',
            'desc'    => '',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()))),
  	  array(
        'id'      => 'industry_desc',
        'label'   => 'Description',
        'desc'    => 'This text will be the description of Industries.',
        'std'     => '',
  			'section' => 'industries',
        'type'    => 'textarea',
        'class'   => '',
        'choices' => array()),
      array(
        'id'      => 'social_facebook',
        'label'   => 'Tu perfil de Facebook',
        'desc'    => '',
        'std'     => '',
  			'section' => 'social',
        'type'    => 'text',
        'class'   => '',
        'choices' => array()),
      array(
        'id'      => 'social_twitter',
        'label'   => 'Tu Perfil Twitter',
        'desc'    => '',
        'std'     => '',
  			'section' => 'social',
          'type'    => 'text',
          'class'   => '',
          'choices' => array()),
      array(
        'id'      => 'social_linkedin',
        'label'   => 'Tu perfil de Linkedin',
        'desc'    => '',
        'std'     => '',
  			'section' => 'social',
        'type'    => 'text',
        'class'   => '',
        'choices' => array()),
  		array(
        'id'      => 'clients_desc',
        'label'   => 'Clientes Trabajados',
        'desc'    => 'Indica los clientes con los que has trabajado',
        'std'     => '',
  			'section' => 'clients',
        'type'    => 'textarea',
        'class'   => '',
        'choices' => array()),
  		array(
        'id'          => 'client_settings',
        'label'       => 'Clients',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'clients',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'client_image',
            'label'   => 'Image',
            'desc'    => '',
            'std'     => '',
            'type'    => 'upload',
            'class'   => '',
            'choices' => array()),
          array(
            'id'      => 'client_url',
            'label'   => 'Client URL',
            'desc'    => '',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()) ) ),
  		array(
        'id'      => 'portfolio_desc',
        'label'   => 'Description',
        'desc'    => 'This text will be the description of Portfolio.You can add portfolios from the Portfolio Post Section',
        'std'     => '',
  			'section' => 'portfolio',
        'type'    => 'textarea',
        'class'   => '',
        'choices' => array() ),
      array(
        'id'          => 'industry_settings',
        'label'       => 'Industrias',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'industries',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(

          array(
            'id'      => 'industry_url',
            'label'   => 'Industry URL',
            'desc'    => '',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array() ) ) ),
      array(
        'id'      => 'aboutus_desc',
        'label'   => 'Sobre ti',
        'desc'    => 'Redacta aspectos sobre ti',
        'std'     => '',
  			'section' => 'aboutus',
        'type'    => 'textarea',
        'class'   => '',
        'choices' => array() ),
      array(
        'id'          => 'my_checkbox',
        'label'       => 'Enable Slider',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'slider',
        'class'       => '',
        'choices'     => array(
          array( 
            'value' => 'yes',
            'label' => '' ) ) ),
      array(
        'id'          => 'my_slider',
        'label'       => 'Images',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'slider',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'slider_image',
            'label'   => 'Image',
            'desc'    => '',
            'std'     => '',
            'type'    => 'upload',
            'class'   => '',
            'choices' => array() ),
          array(
            'id'      => 'slider_caption',
            'label'   => 'Caption',
            'desc'    => 'This text is used to add fancy captions in the slider.',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array() ) ) ) )
  );
  
  /* settings are not the same update the DB */
  /*+if ( $saved_settings !== $custom_settings ) {
    /*Codigo Original
    update_option( 'option_tree_settings', $custom_settings ); 

    Fin Codigo Original*/
    /*Codigo Modificado*/
    /*+update_option( 'option_tree_settings', $saved_settings );
    /*Fin Codigo Modificado*/
  /*}
}

/*Codigo Extra*/
function themename_customize_register($wp_customize){

    debug_to_console("wp_customize");
    
    
    $wp_customize->add_section('photo', array(
        'title'    => __('Foto Curriculum', 'onepager'),
        'description' => 'Sube una foto',
        'priority' => 120
    ));
    /*
    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[text_test]', array(
        'default'        => 'Arse!',
        'capability'     => 'edit_theme_options',
        'type'           => 'option'
    ));
 
    $wp_customize->add_control('themename_text_test', array(
        'label'      => __('Text Test', 'themename'),
        'section'    => 'menu',
        'settings'   => 'themename_theme_options[text_test]'
    ));
 
    //  =============================
    //  = Radio Input               =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[color_scheme]', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'option'
    ));
 
    $wp_customize->add_control('themename_color_scheme', array(
        'label'      => __('Color Scheme', 'themename'),
        'section'    => 'menu',
        'settings'   => 'themename_theme_options[color_scheme]',
        'type'       => 'radio',
        'choices'    => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3'
        )
    ));
 
    //  =============================
    //  = Checkbox                  =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[checkbox_test]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option'
    ));
 
    $wp_customize->add_control('display_header_text', array(
        'settings' => 'themename_theme_options[checkbox_test]',
        'label'    => __('Display Header Text'),
        'section'  => 'menu',
        'type'     => 'checkbox'
    ));
 
 
    //  =============================
    //  = Select Box                =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[header_select]', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'option'
 
    ));
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'themename_theme_options[header_select]',
        'label'   => 'Select Something:',
        'section' => 'menu',
        'type'    => 'select',
        'choices'    => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3',
        )
    ));
 
    */
    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('image_curriculum', array(
        'default'           => 'foto_curriculum.jpg',
        'capability'        => 'edit_theme_options',
        'type'              => 'option'
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'image_upload', array(
        'label'      => __( 'Foto Curriculum', 'onepager' ),
        'section'  => 'photo',
        'settings' => 'image_curriculum'
    )));
    /*
    //  =============================
    //  = File Upload               =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[upload_test]', array(
        'default'           => 'arse',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'upload_test', array(
        'label'    => __('Upload Test', 'themename'),
        'section'  => 'menu',
        'settings' => 'themename_theme_options[upload_test]'
    )));
 
 
    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[link_color]', array(
        'default'           => '000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'    => __('Link Color', 'themename'),
        'section'  => 'menu',
        'settings' => 'themename_theme_options[link_color]'
    )));
 
 
    //  =============================
    //  = Menu Dropdown             =
    //  =============================

    $menus = get_terms('nav_menu');

    foreach ($menus as $key => $menu) {
      
      $menu_name[$menu->id] = $menu->name;
    }
    
    $wp_customize->add_setting('theme_settings_curriculum[menu]', array(
        'default'        => 'Menu Curriculum',
        'capability'     => 'edit_theme_options',
        'type'           => 'option'
    ));

    $wp_customize->add_control('menus', array(
        'label'      => __('Page Test', 'themename'),
        'section'    => 'menu',
        'type'    => 'select',
        'settings'   => 'theme_settings_curriculum[menu]',
        'choices' => $menu_name
    ));

    // =====================
    //  = Category Dropdown =
    //  =====================
    $categories = get_categories();
    $cats = array();
    $i = 0;
    foreach($categories as $category){
      if($i==0){
        $default = $category->slug;
        $i++;
      }
      $cats[$category->slug] = $category->name;
    }
 
    $wp_customize->add_setting('_s_f_slide_cat', array(
      'default'        => $default
    ));
    $wp_customize->add_control( 'cat_select_box', array(
      'settings' => '_s_f_slide_cat',
      'label'   => 'Select Category:',
      'section'  => '_s_f_home_slider',
      'type'    => 'select',
      'choices' => $cats,
    ));*/
  debug_to_console($wp_customize);
}
 
add_action('customize_register', 'themename_customize_register');
/*Fin Codigo Extra*/
?>