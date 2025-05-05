<?php 

$footer_logo__url = get_theme_mod('footer_logo');

$footer_logo__id = attachment_url_to_postid($footer_logo__url);

?>

<footer id="footer__container">
  <section class="container__fluid footer__main">
    

      <?php wp_nav_menu(array(
          'theme_location' => 'footer-menu',
          'container' => 'nav',
          'container_class' => 'footer__menu'
      )); ?>

      <a class="f__logo" href="/">

        <?= wp_get_attachment_image( $footer_logo__id, 'large', false, [ 'class' => 'f__logo__img', 'alt' => 'footer logo' ] ); ?>
      </a>



      <button class="scroll-btn" onclick="window.scrollTo({top: 0, behavior: 'smooth'});"><?= file_get_contents(get_template_directory() . '/img/icons/back-to-top.svg'); ?></button>

      <p class="footer__copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> All Rights Reserved</p>

  </section>

</footer>