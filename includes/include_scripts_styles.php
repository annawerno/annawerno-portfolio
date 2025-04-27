<?php
function scripts_styles() {

    wp_enqueue_style('styles', get_template_directory_uri() . '/frontend/dist/styles/app.css', array(), '1.0');

    wp_enqueue_script('scripts', get_template_directory_uri() . '/frontend/dist/scripts/app.js', array(), null, true);


}
add_action('wp_enqueue_scripts', 'scripts_styles');


function php_variables() {
    if ( is_admin() ) {
        return; // Don't run this inside wp-admin
    }

    if ( wp_script_is('scripts', 'enqueued') ) {

        $hellos = cpt_hello_ref_query();

        if ($hellos->have_posts()) :
            $hello_sentences = array(); // Initialize to avoid undefined warnings
            while($hellos->have_posts()) : $hellos->the_post();
                $hello = get_post();
                $hello_sentences[] = $hello->post_title; 
            endwhile;
            wp_reset_postdata();
        endif;

        wp_localize_script('scripts', 'phpVariables', array(
            'sentences' => $hello_sentences ?? array() // fallback
        ));
    }
}
add_action('wp_enqueue_scripts', 'php_variables', 20);


?>