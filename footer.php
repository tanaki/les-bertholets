
                
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
