<footer>
    Footer<br/><br/>
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
</footer>