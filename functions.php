<?php


include( get_template_directory() . '/includes/include_scripts_styles.php' );




// Theme setup
function theme_setup() {
  
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
}

add_action('after_setup_theme', 'theme_setup');


?>