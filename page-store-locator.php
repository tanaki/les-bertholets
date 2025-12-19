<?php
    /*
    Template Name: Store Locator Page
    */
    get_header();
?>
    <main class="page-content">
        <div class="block block-store-locator">
            <div class="block-inside">
                <h2>
                    <?php the_title(); ?>
                </h2>
                <div class="block-store-locator-container">
                    <div id="store-locator" class="store-locator">
                        
                        <div class="store-left">
                            <div class="store-search-container">
                                <input type="text" id="search" class="store-search" placeholder="<?php echo get_label('find-a-store'); ?>" />
                                <a href="#" id="clear-search" class="clear-search" style="display:none;">&times;</a>
                            </div>
                            <div id="empty-list" class="empty-list" style="display:none;">
                                <?php echo get_label('no-store-found'); ?>
                            </div>
                            <div class="store-list">
                                <ul id="stores" class="stores"></ul>
                            </div>
                        </div>

                        <div id="map" class="store-map"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php 

    $stores = pods('store', array(
        'limit'      => -1,
    ));

    $data = [];

    if ( $stores->total() ) {
        while ( $stores->fetch() ) {
            $data[] = [
                'id'    => $stores->id(),
                'name' => $stores->display( 'post_title' ),
                'lat' => floatval($stores->display( 'store-latitude' )),
                'lng' => floatval($stores->display( 'store-longitude' )),
                'email' => $stores->display( 'store-email' ),
                'address' => $stores->display( 'store-address' ),
                'phone' => $stores->display( 'store-phone' ),
                'hours' => $stores->display( 'store-hours' ),
            ];
        }
    }

    echo '<script>';
    echo 'window.STORES_TO_LOCATE = ' . wp_json_encode( $data ) . ';';
    echo '</script>';

    get_footer(); 
?>