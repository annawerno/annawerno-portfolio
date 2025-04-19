<?php

// About me section
$about_me = get_field('f__about_me');
$about_me_image = get_field('f__about_me_image');
$a_m_image__alt = isset($about_me_image['alt']) && !empty($about_me_image['alt']) ? $about_me_image['alt'] : ($about_me_image['title'] ?? '');


// Portfolio posts
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1

);

$query = new WP_Query($args);
?>

<section id="about-me" class="container__fluid">
    
    <div class="about_me_text"> <?= $about_me; ?></div>
    <div class="about_me_image"><img width="100%" height="auto" src="<?= $about_me_image['url']; ?>" alt="<?= $about_me_image['alt']; ?>" /></div>
    


</section>

<?php /*
<section id="skills"  class="container__fluid">

<?php 
$skill_args = array(
    'post_type'      => 'skill', // Ensure the post type matches the one registered
    'post_status'    => 'publish',
    'posts_per_page' => -1, // Get all skills
);

$skills = new WP_Query($skill_args);

if ($skills->have_posts()) : ?>
    <ul class="skills-list">
        <?php while ($skills->have_posts()) : $skills->the_post(); ?>
            <li><?php the_title(); ?></li>
        <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>No skills found.</p>
<?php endif; ?>


       <?php  $categories = get_categories(); 
       
       foreach ($categories as $category) : ?>

        <p><?= esc_html ($category->name); ?></p>

       
       
       <?php endforeach; ?>

</section>
*/ ?>

<section id="portfolio" class="container__fluid">

    <div class="portfolio__grid">

    <?php
    while ($query->have_posts()) : $query->the_post();
    
        $post_id = get_the_ID();
        $post_name = get_post_field( 'post_name', $post_id );
        $post_subtitle = get_post_field( 'f__subtitle', $post_id );
        $project_url = get_field('f__project_url', $post_id);
        $github_url= get_field('f__github_url', $post_id);
        $post_categories = get_the_category(); 


        ?>

        <a href="javascript:void(0);" class="portfolio__item-container" id="<?= $post_name; ?>" onclick="openModal('<?= $post_name; ?>')">
                <?= the_post_thumbnail('medium'); ?>
            
           <div class="portfolio__item-text">
                <h4 class="portfolio__item-title"><?= the_title(); ?></h4>
                <p class="portfolio__item-subtitle"><?= $post_subtitle; ?></p>
            </div>
        </a>


        <!-- Modal Overlay for each post -->
        <div class="portfolio__item-modal-overlay" id="<?= $post_name; ?>-modalOverlay">
            <div class="portfolio__item-modal">
                <button class="modal-close" onclick="closeModal('<?= $post_name; ?>')">&times</button>
                <div class="portfolio__item-body">
                    <div class="portfolio__item-body_left">
                        <?= the_post_thumbnail('medium'); ?>
                        <?php
                        if(!empty($post_categories)) { ?>
                            <ul class="portfolio__categories">
                            <?php foreach ($post_categories as $post_category) : 
                                
                                $parent_class = $post_category->category_parent;

                                if($parent_class == 14) {
                                    $parent_class = 'lang-markup';
                                } elseif($parent_class == 15) {
                                    $parent_class = 'fw-tools';
                                } elseif($parent_class == 16) {
                                    $parent_class = 'cms-plugins';
                                }

                                
                                ?>
                                <li class="<?= $parent_class; ?>"><?= esc_html( $post_category->name ); ?> </li>

                            <?php endforeach; ?>
                            </ul>
                            
                        <?php } ?>

                        <div class="portfolio__cta">
                            <a href="<?= $project_url; ?>" target="_blank">See project</a>
                            <a href="<?= $github_url; ?>" target="_blank">Check the code</a>
                        </div>

                    
                    </div>
                    <div class="portfolio__item-body_right">
                        <h4 class="portfolio__item-modal-title"><?= the_title(); ?></h4>
                        <p class="portfolio__item-subtitle"><?= $post_subtitle; ?></p>
                        <p class="portfolio__item-modal-content"><?= the_content(); ?></p>
                    </div>
               
                </div>
    
            </div>
        </div>

    <?php endwhile; ?>

    </div>

</section>


<section id="contact" class="container__fluid">

        <p class="contact__heading">Looking for a chat tonic, collab brew or connect elixir? Whatever your flavour, pick your poison below.</p>

        <div class="contact__options">
            <a href="mailto:hello@annawerno.co.uk"><?= file_get_contents(get_template_directory() . '/img/socials/mail.svg'); ?></a>
            <a href="https://github.com/annawerno" target="_blank"><?= file_get_contents(get_template_directory() . '/img/socials/github.svg'); ?></a>
            <a href="https://www.linkedin.com/in/annawerno/" target="_blank"><?= file_get_contents(get_template_directory() . '/img/socials/linkedin.svg'); ?></a>


        </div>


</section>

<?php 
    $hellos = cpt_hello_ref_query();
    // my_print_r($hellos);

    if ($hellos->have_posts()) : 
    ?>
        <section id="ref_answers" class="container__fluid">

            <button id="ref_answers-btn" class="accordion main">Peak here for the pop culture references</button>
            <div class="panel">

            <?php while($hellos->have_posts()) : $hellos->the_post();

                $hello = get_post();
                

                ?>

                <button class="accordion sub">
                    <div class="a_sub__title"><?= $hello->post_title; ?></div>
                </button>
                <div class="panel sub">
                    <p><?= the_content(); ?></p>
                </div>
    
            <?php endwhile; 
                wp_reset_postdata();
                ?>
            </div>
        </section>
<?php endif; ?>

    



