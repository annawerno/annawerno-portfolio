<footer id="footer__container">
  <section class="container__fluid footer__main">
    
      <?php wp_nav_menu(array(
          'theme_location' => 'footer-menu',
          'container' => 'nav',
          'container_class' => 'footer__menu'
      )); ?>

      <a class="f__logo" href="/">
        <img src="<?= site_url(); ?>/wp-content/uploads/2025/03/annawerno-logo-light.webp" alt="annawerno logo" width="100%"/>
      </a>

  </section>
  <section class="container__fluid footer__sub">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> All Rights Reserved
  </section>
  <button class="scroll-btt" onclick="window.scrollTo({top: 0, behavior: 'smooth'});"><?= file_get_contents(get_template_directory() . '/img/icons/back-to-top.svg'); ?></button>


</footer>