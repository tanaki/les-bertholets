
                
            </div>
        </div>

        <?php get_template_part('template-parts/common/footer'); ?>

        <?php 
            wp_footer(); 
            $MAPS_KEY = MAPS_KEY;
        ?>

        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $MAPS_KEY; ?>&callback=StoreLocator.init" async defer></script>

    </body>
</html>
