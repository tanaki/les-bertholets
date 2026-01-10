
                
            </div>
        </div>
        
        <div class="block block-contact-popin" id="contactPopin" aria-hidden="true">
            <div class="block-inside">
                <span class="contact-popin-close">
                    &cross;
                </span>
                <div class="contact-popin-content">
                    <?php 
                        $lang = pll_current_language();
                        $page = get_page_by_path( $lang === 'fr' ? 'nous-contacter' : 'contact-us' );

                        if ($page) {
                            echo '<h4>'.apply_filters('the_title', $page->post_title).'</h4>';
                            echo apply_filters('the_content', $page->post_content);
                        }
                    ?>
                </div>
            </div>
        </div>

        <?php 
            get_template_part('template-parts/common/footer'); 
            $MAPS_KEY = MAPS_KEY;
            wp_footer(); 
        ?>

        <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $MAPS_KEY; ?>&callback=StoreLocator.init" async defer></script>
    </body>
</html>
