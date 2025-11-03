<footer>
    <div class="block-inside">

        <div class="block-footer">
    
            <div class="logo">
                LOGO
            </div>

            <div class="image">
                <div>Image</div>
                <div>Tagline</div>
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