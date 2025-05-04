<?php 

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path) {
    // Update path to save ACF JSON
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths) {
    // Remove original path (optional)
    unset($paths[0]);

    // Add new path(s)
    $paths[] = get_stylesheet_directory() . '/acf-json';

    return $paths;
}