<header id="header__container" class="container__fluid">
   
        <a class="header__logo" href="/">

          <img src="<?php echo get_template_directory_uri(); ?>/img/logos/annawerno-logo.webp" alt="annawerno logo" width="100%"/>
        </a>
        <div class="header__menu-container" style="display: flex">
          <button class="btn-contact" aria-label="Let's chat" onclick="document.getElementById('contact').scrollIntoView({ behavior: 'smooth' })">Let's chat</button>




          <?php wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'container' => 'nav',
            'container_class' => 'header__menu'
          )); ?>
        </div>
        <button class="header__menu-mob" aria-label="Toggle menu" id="nav-toggle">
              <span></span>
              <span></span>
              <span></span>
          </button>

</header>