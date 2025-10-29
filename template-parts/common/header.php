<header>
    <div class="block-inside">
        <div class="container">

            <div class="header-nav">
                <a href="/" class="logo">
                    <?php echo file_get_contents( get_template_directory_uri() . '/assets/img/logo_text.svg' ); ?>
                </a>
                <nav>
                    <?php 
                        wp_nav_menu( 
                            array(
                                'theme_location'=> 'main-menu',
                                'container' => null
                            ) 
                        );
                    ?>
                </nav>
            </div>

            <div class="mobile-nav">
                <a href="#" class="toggle-nav">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</header>
