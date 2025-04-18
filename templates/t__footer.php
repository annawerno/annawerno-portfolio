<footer id="footer__container">
  <section class="container__fluid footer__main">
    

      <?php wp_nav_menu(array(
          'theme_location' => 'footer-menu',
          'container' => 'nav',
          'container_class' => 'footer__menu'
      )); ?>

      <a class="f__logo" href="/">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logos/annawerno-logo-light.webp" alt="annawerno logo" width="100%"/>
      </a>

      <button class="scroll-btn" onclick="window.scrollTo({top: 0, behavior: 'smooth'});"><?= file_get_contents(get_template_directory() . '/img/icons/back-to-top.svg'); ?></button>

      <p class="footer__copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> All Rights Reserved</p>

  </section>

</footer>