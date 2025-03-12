<?php
function scripts_styles() {

    wp_enqueue_style('styles', get_template_directory_uri() . '/frontend/dist/styles/app.css', array(), '1.0');

    wp_enqueue_script('scripts', get_template_directory_uri() . '/frontend/dist/scripts/app.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'scripts_styles');
?>