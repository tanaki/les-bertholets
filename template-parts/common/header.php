<header>
    <div class="block-inside">
        <div class="container">

            <div class="header-nav">
                <a href="/" class="logo">
                    Logo
                    <?php //echo file_get_contents( get_template_directory_uri() . '/assets/img/logo_text.svg' ); ?>
                </a>

                <div class="navigation">
                    <nav class="site-navigation">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'main-menu',
                                'container'      => null,
                            ) );
                        ?>
                    </nav>

                    <nav>
                        <?php
                        $languages = pll_the_languages( array(
                            'raw' => 1,          // On récupère les infos des langues sous forme de tableau
                            'hide_if_empty' => 0 // Pour ne pas cacher les langues sans traduction
                        ) );

                        if ( ! empty( $languages ) ) : ?>
                            <ul class="lang-switcher">
                                <?php foreach ( $languages as $lang ) : ?>
                                    <li class="<?php echo $lang['current_lang'] ? 'active' : ''; ?>">
                                        <a href="<?php echo esc_url( $lang['url'] ); ?>">
                                            <?php echo strtoupper( substr( $lang['name'], 0, 2 ) ); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>

            <div class="mobile-nav">
                <a href="#" class="toggle-nav">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</header>
