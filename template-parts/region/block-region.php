<?php extract( $args ); ?>
<div class="block block-region">
    <div class="block-inside">

        <div class="block-region-content">

            <h2 class="block-region-title">
                <?php if (isset($title)) echo $title; ?>
            </h2>

            <div class="block-region-details">

                <div class="block-region-text">
                    <div class="block-region-text-item">
                        <div class="block-region-text-item-icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/icon-marker.svg'; ?>" alt="Geography Icon" />
                        </div>
                        <div class="block-region-text-item-content">
                            <h4>Geography</h4>
                            <p>
                                Between the Mediterranean Sea and the foothills of the Pyrenees.
                            </p>
                        </div>
                    </div>
                    <div class="block-region-text-item">
                        <div class="block-region-text-item-icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/icon-climate.svg'; ?>" alt="Climate Icon" />
                        </div>
                        <div class="block-region-text-item-content">
                            <h4>Climate</h4>
                            <p>
                                Mediterranean, dry and warm.
                            </p>
                        </div>
                    </div>
                    <div class="block-region-text-item">
                        <div class="block-region-text-item-icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/icon-soil.svg'; ?>" alt="Soil Icon" />
                        </div>
                        <div class="block-region-text-item-content">
                            <h4>Soil</h4>
                            <p>
                                Alluvial, Limestone, Terraces.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="block-region-map">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/temp/misc/region-map.jpg'; ?>" alt="Region Map" />
                </div>

            </div>

        </div>

    </div>
</div>