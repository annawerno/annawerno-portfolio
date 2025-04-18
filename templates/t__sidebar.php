<button id="sidebar" class="sidebar" onclick="toggleSidebar()">

            <?= file_get_contents(get_template_directory() . '/img/icons/double-chevron.svg'); ?> 
            <p>my side hustle</p>


            <section class="sidebar__content">

                <?php 
                
                $sidebar__content_logo = get_field('f__sidehustle_logo'); 
                $sidebar__content_text = get_field('f__sidehustle_text'); 
                $sidebar__content_link_insta = get_field('f__sidehustle_link_instagram');
                $sidebar__content_link_etsy = get_field('f__sidehustle_link_etsy');

                ?>
                <div class="sidebar__content-info">
                    <div class="s_c__logo">
                        <img src="<?= $sidebar__content_logo['url']; ?>"/>
                    </div>
                    <h4 class="s_c__text"><?= $sidebar__content_text; ?></h4>
                </div>
                <div class="sidebar__content-links">
                    <a href="<?= $sidebar__content_link_insta; ?>" target="_blank"><?= file_get_contents(get_template_directory() . '/img/socials/instagram.svg'); ?></a>
                    <a href="<?= $sidebar__content_link_etsy; ?>" target="_blank"><?= file_get_contents(get_template_directory() . '/img/socials/etsy.svg'); ?></a>
                </div>



            </section>
    </button>