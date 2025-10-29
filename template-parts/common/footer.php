<footer>
    <div class="block-inside">
        
        <a href="/" class="logo">
            <img src="<?php echo get_template_directory_uri().'/assets/img/logo_lilac.svg' ?>" alt="<?php echo get_bloginfo('title'); ?>" />
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
                <h6><?php echo get_label('label_follow_me', true); ?></h6>
                <ul>
                    <li>
                        <a 
                            class="link-linkedin"
                            href="https://fr.linkedin.com/in/ryma-hatahet-52b7a4100" 
                            target="_blank">
                                <?php echo file_get_contents( get_template_directory_uri() . '/assets/img/icon_linkedin.svg' ); ?>
                        </a>
                    </li>
                    <li>
                        <a 
                            class="link-instagram"
                            href="https://www.instagram.com/ryma.hat/" 
                            target="_blank">
                                <?php echo file_get_contents( get_template_directory_uri() . '/assets/img/icon_insta.svg' ); ?>
                        </a>
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
                <?php echo get_page_by_path( 'privacy-policy', OBJECT, 'page' )->post_title; ?>
            </a>
        </div>
    </div>
</footer>