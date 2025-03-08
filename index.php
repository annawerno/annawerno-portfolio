<?php get_header(); ?>



<main class="container__fluid">

   <?php  get_template_part("templates/t__hero"); ?>
    





   
</main>

<main class="container__full">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="container__inner">
            <h2>Container full</h2>
            <?php the_content(); ?>
        </article>
    <?php endwhile; else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
