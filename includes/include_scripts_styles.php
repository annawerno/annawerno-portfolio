<?php
function scripts_styles() {

    wp_enqueue_style('styles', get_template_directory_uri() . '/src/scss/styles.scss', array(), '1.0');

    wp_enqueue_script('scripts', get_template_directory_uri() . '/src/js/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'scripts_styles');
?>