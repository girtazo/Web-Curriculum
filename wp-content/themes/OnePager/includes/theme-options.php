<?php 

function themename_customize_register($wp_customize){

    $wp_customize->add_section('photo', array(
        'title'    => __('Foto Curriculum', 'onepager'),
        'description' => 'Sube una foto',
        'priority' => 120
    ));
    
    $wp_customize->add_setting('image_curriculum', array(
        'default'           => get_template_directory_uri() . '/images/usuario.jpeg',
        'capability'        => 'edit_theme_options',
        'type'              => 'option'
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'image_upload', array(
        'label'      => __( 'Foto Curriculum', 'onepager' ),
        'section'  => 'photo',
        'settings' => 'image_curriculum'
    )));
    /*$wp_customize->add_section('menu', array(
        'title'    => __('Menu', 'themename'),
        'description' => 'Selecciona el menu a mostrar',
        'priority' => 120
    ));
 
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
 
 
    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[image_upload_test]', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
        'label'    => __('Image Upload Test', 'themename'),
        'section'  => 'menu',
        'settings' => 'themename_theme_options[image_upload_test]'
    )));
 
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
}
 
add_action('customize_register', 'themename_customize_register');
/*Fin Codigo Extra*/
?>