<footer>
    <div class="block-inside">

        <div class="block-footer">
    
            <div class="logo">
                LOGO
            </div>

            <div class="image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/domaine.png" alt="Domaine Les Bertholets" />
                <div class="font-italic">
                    L’abus d’alcool est dangereux pour la santé, à consommer avec modération<br/>
                    &copy; <?php echo date('Y'); ?> Designed by <span class="font-orange">Caves du Languedoc Roussillon</span>, All Rights Reserved
                </div>
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

<div class="extra-side-cover"></div>
<div class="extra-side">
    <div>
        LOGO<br/>
        Follow us on instagram<br/>
        Image<br/>
        tagline<br/>
        Links<br/>
    </div>
    <a href="#" class="extra-side--btn-close">
        X
    </a>
</div>