<?php

  function mytheme_enqueue_styles() {
    // Css 
	  wp_enqueue_style('main-style', get_stylesheet_uri());
	  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css');

    // WooCommerce Css
    wp_enqueue_style( 'woocommerec', get_stylesheet_directory_uri() . '/assets/css/woocommerec.css' );
    

    
    // Js 
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/script.js', array(), null, true);
	  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), '11.0.0', true);
	  wp_enqueue_script('custom-swiper', get_template_directory_uri() . '/assets/js/swiper-init.js', array('swiper-js'), null, true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
    wp_localize_script('swiper-js', 'ajaxurl', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_script('woocommerce', get_template_directory_uri() . '/assets/js/script.js', array(), null, true);
    


    // Pass AJAX URL to JavaScript
    wp_localize_script(
      'custom-script', // Handle of the enqueued script
      'customAjax',    // Object name accessible in JS
      array(
          'ajaxurl' => admin_url('admin-ajax.php') // AJAX URL
      )
  );
  }
  add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');
  

// Register a new navigation menu
function custom_theme_menus() {
  register_nav_menus(array(
      'primary_menu' => __('Primary Menu', 'custom-theme'),
  ));
}
add_action('after_setup_theme', 'custom_theme_menus');

// Register Widgets
function mytheme_widgets_init() {
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'main-sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'mytheme_widgets_init');


// Use Theme Customizer to Upload Images
function customize_register($wp_customize) {
  $wp_customize->add_section('collection_images', array(
      'title'    => __('Collection Images', 'your-theme-textdomain'),
      'priority' => 30,
  ));

  $collections = [
      'set_image' => 'Sets Image',
      'activewear_image' => 'Activewear Image',
      'accessories_image' => 'Accessories Image',
      'lingerie_image' => 'Lingerie Image'
  ];

  foreach ($collections as $key => $label) {
      $wp_customize->add_setting($key, array(
          'default'   => '',
          'sanitize_callback' => 'esc_url_raw',
      ));

      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $key, array(
          'label'    => $label,
          'section'  => 'collection_images',
          'settings' => $key,
      )));
  }
}
add_action('customize_register', 'customize_register');




// woocommerce

// add_theme_suppor('woocommerce')
function mytheme_add_woocommerce_support() {
    add_theme_support('woocommerce');
  }
  add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
  









?>






  
