<?php

include( get_template_directory() . '/includes/include_acf_functions.php' );
include( get_template_directory() . '/includes/include_scripts_styles.php' );
include( get_template_directory() . '/includes/include_cpts.php' );

function my_print_r($array_data) {

  echo '<pre>';

  print_r($array_data);

  echo '</pre>';

}


// Theme setup
function theme_setup() {
  
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
  register_nav_menus([
    'primary-menu' => __('Primary Menu'),
    'footer-menu'   => __('Footer Menu'),
]);
}

add_action('after_setup_theme', 'theme_setup');




?>