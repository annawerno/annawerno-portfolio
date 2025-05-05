<header id="header__container" class="container__fluid">

        <?php if ( has_custom_logo() ) {
              the_custom_logo(); 
          } else { ?>
              <h1 class="site-title"><?= get_bloginfo( 'name' ); ?></h1>';
         <?php } 
        ?>


        <div class="header__menu-container" style="display: flex">
          <button class="btn-contact" aria-label="Let's chat" title="Let's chat" tabindex="0">Let's chat</button>




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