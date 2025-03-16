<footer id="footer__container">
  <div class="container__fluid">
    <div style="max-width: 250px; margin: 0 auto" >
      <img src="<?= site_url(); ?>/wp-content/uploads/2025/03/annawerno-logo.webp" alt="annawerno logo" width="100%"/>
    </div>
    <div style="display: flex; justify-content: space-between">

      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
      <?php wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'container' => 'nav',
            'container_class' => 'footer__menu'
          )); ?>

    </div>
  
  </div>
    
</footer>