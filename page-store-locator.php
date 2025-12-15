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
                            <input type="text" id="search" class="store-search" placeholder="Rechercher un magasin...">
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

    $lang = pll_current_language();

    $params = [
        'limit'      => -1,
        'where'      => "
            t.post_type = 'store'
            AND t.post_status = 'publish'
            AND t.ID IN (
                SELECT object_id 
                FROM {$wpdb->prefix}term_relationships tr
                INNER JOIN {$wpdb->prefix}term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                INNER JOIN {$wpdb->prefix}terms t2 ON tt.term_id = t2.term_id
                WHERE tt.taxonomy = 'language' AND t2.slug = '$lang'
            )
        ",
    ];


    $stores = pods('store', $params);


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