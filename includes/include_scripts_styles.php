<?php
function scripts_styles() {

    wp_enqueue_style('styles', get_template_directory_uri() . '/frontend/dist/styles/app.css', array(), '1.0');

    wp_enqueue_script('scripts', get_template_directory_uri() . '/frontend/dist/scripts/app.js', array(), null, true);


}
add_action('wp_enqueue_scripts', 'scripts_styles');


function php_variables() {
    // Only localize if the script is enqueued
    if (wp_script_is('scripts', 'enqueued')) {

        $hellos = cpt_hello_ref_query();

        // my_print_r($hellos);

        if ($hellos->have_posts()) :
            while($hellos->have_posts()) : $hellos->the_post();

                $hello = get_post();

                $hello_sentences[] = $hello->post_title; 
            
            endwhile;
            wp_reset_postdata();
        endif;

        wp_localize_script('scripts', 'phpVariables', array(
            'sentences' => $hello_sentences
        ));
    }
}
add_action('wp_enqueue_scripts', 'php_variables', 20); 

?>