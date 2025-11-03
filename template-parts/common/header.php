<header>
    <div class="block-inside">
        <div class="container">

            <div class="header-nav">
                <a href="/" class="logo">
                    Logo
                    <?php //echo file_get_contents( get_template_directory_uri() . '/assets/img/logo_text.svg' ); ?>
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
                <div>
                    <a href="#">FR/EN</a>
                    <a href="#"> --- </a>
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

<!--
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Our Terroir</a>
            </li>
            <li>
                <a href="#">Our Wines</a>
            </li>
            <li>
                <a href="#">Find our wines</a>
            </li>
            <li>
                <a href="#">Contact Us</a>
            </li>
        </ul>
-->
