<footer>
    <div class="block-inside">
        
        <a href="/" class="logo">
            <img src="<?php echo get_template_directory_uri().'/assets/img/logo_purple.svg' ?>" alt="<?php echo get_bloginfo('title'); ?>" />
        </a>

        <div class="left-col">
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
            <div class="links-social">
                <h6>Me Suivre</h6>
                <ul>
                    <li>
                        <a href="https://fr.linkedin.com/in/ryma-hatahet-52b7a4100" target="_blank">Linkedin</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/ryma.hat/" target="_blank">Instagram</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="block-bottom">
        <div class="block-bottom-inside">
            <div>
                &copy; Ryma Hatahet Conservation <?php echo date('Y'); ?>
            </div>
            <a href="/privacy-policy/">
                Mentions légales et politique de confidentialité
            </a>
        </div>
    </div>
</footer>