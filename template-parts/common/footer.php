<footer>
    <div class="block-inside">

        <div class="block-footer">
    
            <div class="logo">
                LOGO
            </div>

            <div class="image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/domaine.png" alt="Domaine Les Bertholets" />
                <?php echo get_template_part('template-parts/common/tagline'); ?>
            </div>

            <nav>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'main-menu',
                        'container'      => null
                    ) );
                ?>
                <div>
                    Insta
                </div>
            </nav>
        </div>

    </div>
</footer>

<?php echo get_template_part('template-parts/common/extra-side'); ?>

<button id="back-to-top" title="Back to top"><span></span></button>
