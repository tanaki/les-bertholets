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
    get_footer(); 
?>