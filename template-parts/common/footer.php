<footer>
    <div class="block-inside">

        <div class="block-footer">
    
            <?php get_template_part('template-parts/common/component/logo', null, array( 'mode' => 'white', 'signature' => true )); ?>

            <div class="image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/domaine_3.png" alt="Domaine Les Bertholets" />
                <?php get_template_part('template-parts/common/component/tagline'); ?>
            </div>

            <nav>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'main-menu',
                        'container'      => null
                    ) );
                ?>
                <?php get_template_part('template-parts/common/component/social', null, array( 'inverted' => true )); ?>
            </nav>
        </div>

    </div>
</footer>

<?php get_template_part('template-parts/common/component/extra-side'); ?>

<button id="back-to-top" title="Back to top"><span></span></button>
