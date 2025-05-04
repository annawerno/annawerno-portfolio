<?php

include get_template_directory() . '/includes/include_acf_functions.php';
include get_template_directory() . '/includes/include_scripts_styles.php';
include get_template_directory() . '/includes/include_cpts.php';


// Theme setup
function theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  register_nav_menus([
      'primary-menu' => __('Primary Menu', 'annawerno'),
      'footer-menu'  => __('Footer Menu', 'annawerno'),
  ]);

  add_theme_support('custom-logo', [
      'height'      => 100,
      'width'       => 400,
      'flex-height' => true,
      'flex-width'  => true,
  ]);
}

add_action('after_setup_theme', 'theme_setup');

/**
 * Add Footer Logo Option to WordPress Customizer
 */
function add_footer_logo_customizer_option($wp_customize) {
  $wp_customize->add_setting('footer_logo', array(
      'default'           => '',
      'sanitize_callback' => 'esc_url_raw',
      'transport'         => 'refresh',
  ));

  // Add control for the footer logo (appears under "Site Identity" panel)
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
      'label'    => __('Footer Logo', 'your-theme-textdomain'),
      'description' => __('Upload a logo image to be displayed in the footer.', 'your-theme-textdomain'),
      'section'  => 'title_tagline', // This adds it to the Site Identity section
      'settings' => 'footer_logo',
      'priority' => 20, // Position after the regular logo option
  )));
}
add_action('customize_register', 'add_footer_logo_customizer_option');


?>