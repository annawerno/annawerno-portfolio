<header id="header__container" class="container__fluid">
   
        <div class="header__logo">

          <img src="<?= site_url(); ?>/wp-content/uploads/2025/03/annawerno-logo.webp" alt="annawerno logo" width="100%"/>
        </div>
        <div class="" style="display: flex">
          <button class="btn-contact">Let's chat</button>

          <button class="header__menu-mob" aria-label="Toggle menu" id="nav-toggle">
              <span></span>
              <span></span>
              <span></span>
          </button>


          <?php wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'container' => 'nav',
            'container_class' => 'header__menu'
          )); ?>
        </div>

</header>