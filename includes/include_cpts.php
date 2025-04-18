<?php 

// Custom post type: Skills
function register_skills_post_type() {
  $labels = array(
      'name'               => _x( 'Skills', 'post type general name' ),
      'singular_name'      => _x( 'Skill', 'post type singular name' ),
      'menu_name'          => __( 'Skills' ),
      'name_admin_bar'     => __( 'Skill' ),
      'add_new'            => __( 'Add New Skill' ),
      'add_new_item'       => __( 'Add New Skill' ),
      'new_item'           => __( 'New Skill' ),
      'edit_item'          => __( 'Edit Skill' ),
      'view_item'          => __( 'View Skill' ),
      'all_items'          => __( 'All Skills' ),
      'search_items'       => __( 'Search Skills' ),
      'not_found'          => __( 'No skills found.' ),
      'not_found_in_trash' => __( 'No skills found in Trash.' )
  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'menu_icon'          => 'dashicons-awards', 
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'skills' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title' ),
  );

  register_post_type( 'skill', $args );
}
add_action( 'init', 'register_skills_post_type' );


// Custom post type: Skills
function register_hello_post_type() {
  $labels = array(
      'name'               => _x( 'Hello References', 'post type general name' ),
      'singular_name'      => _x( 'Hello Reference', 'post type singular name' ),
      'menu_name'          => __( 'Hello References' ),
      'name_admin_bar'     => __( 'Hello Reference' ),
      'add_new'            => __( 'Add New Hello Reference' ),
      'add_new_item'       => __( 'Add New Hello Reference' ),
      'new_item'           => __( 'New Hello Reference' ),
      'edit_item'          => __( 'Edit Hello Reference' ),
      'view_item'          => __( 'View Hello Reference' ),
      'all_items'          => __( 'All Hello References' ),
      'search_items'       => __( 'Search Hello References' ),
      'not_found'          => __( 'No Hello References found.' ),
      'not_found_in_trash' => __( 'No Hello References found in Trash.' )
  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'menu_icon'          => 'dashicons-format-status', 
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'hello_references' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'page-attributes' ),
  );

  register_post_type( 'hello_reference', $args );
}
add_action( 'init', 'register_hello_post_type' );

// Query on CPT: Hello References
function cpt_hello_ref_query() {

      $hello_args = array(
        'post_type' => 'hello_reference',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',

      );

      $hello_query = new WP_Query($hello_args);

      return $hello_query;

}




?>



