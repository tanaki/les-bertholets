<header>
    <div class="block-inside">
        <div class="container">

            <div class="header-nav">
                <a href="<?php echo esc_url( pll_home_url() ); ?>" class="logo">
                    <?php echo file_get_contents( get_template_directory_uri() . '/assets/img/logo.svg' ); ?>
                </a>

                <div class="navigation">
                    <nav class="site-navigation">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'main-menu',
                                'container'      => null,
                            ) );
                        ?>
                        
                        <div class="extra-nav">
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
                            <a href="#" class="extra-side--btn-open">
                                <span class="lines">
                                    <span class="line line-1"></span>
                                    <span class="line line-2"></span>
                                    <span class="line line-3"></span>
                                </span>
                            </a>
                        </div>
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
