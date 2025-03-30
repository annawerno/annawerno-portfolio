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
    <div class="about_me_image"><img width="100%" height="100%" src="<?= $about_me_image['url']; ?>" alt="<?= $about_me_image['alt']; ?>" /></div>
    


</section>

<section id="skills"  class="container__fluid">

       <?php  $categories = get_categories(); 
       
       foreach ($categories as $category) : ?>

        <p><?= esc_html ($category->name); ?></p>

       
       
       <?php endforeach; ?>




</section>

<section id="portfolio" class="container__fluid">

    <div class="portfolio__grid">

    <?php
    while ($query->have_posts()) : $query->the_post();
    
        $post_id = get_the_ID();
        $post_name = get_post_field( 'post_name', $post_id );
        $project_url = get_field('f__project_url', $post_id);
        $github_url= get_field('f__github_url', $post_id);
        $post_categories = get_the_category(); 

        ?>

        <a href="javascript:void(0);" class="portfolio__item-container" id="<?= $post_name; ?>" onclick="openModal('<?= $post_name; ?>')">
                <?= the_post_thumbnail('medium'); ?>
            
           <div class="portfolio__item-text">
                <h4 class="portfolio__item-title"><?= the_title(); ?></h4>
            </div>
        </a>


        <!-- Modal Overlay for each post -->
        <div class="portfolio__item-modal-overlay" id="<?= $post_name; ?>-modalOverlay">
            <div class="portfolio__item-modal">
                <button class="modal-close" onclick="closeModal('<?= $post_name; ?>')">&times</button>
                <h4 class="portfolio__item-modal-title"><?= the_title(); ?></h4>
                <?= the_post_thumbnail('medium'); ?>
                <p class="portfolio__item-modal-content"><?= the_content(); ?></p>
                <a href="<?= $project_url; ?>">See project</a>
                <a href="<?= $github_url; ?>">Check the code</a>

                <?php
                if(!empty($post_categories)) { ?>
                    <ul>
                    <?php foreach ($post_categories as $post_category) : ?>
                        <li><?= esc_html( $post_category->name ); ?> </li>

                    <?php endforeach; ?>
                    </ul>
                    
                <?php } ?>
    
            </div>
        </div>

    <?php endwhile; ?>

    </div>

</section>

<section id="contact" class="container__fluid">

        <p>Let's chat!</p>


</section>

