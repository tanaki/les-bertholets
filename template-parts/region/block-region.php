<?php 
    extract( $args ); 
    $icons = [
        'icon-marker.svg',
        'icon-climate.svg',
        'icon-soil.svg',
    ];
?>
<div class="block block-region">
    <div class="block-inside">
        <div class="block-region-content">

            <?php if ( ! empty( $title ) ) : ?>
                <h2 class="block-region-title">
                    <?php echo esc_html( $title ); ?>
                </h2>
            <?php endif; ?>

            <div class="block-region-details">

                <div class="block-region-text">

                    <?php if ( ! empty( $items ) ) : ?>
                        <?php foreach ( $items as $index => $item ) : ?>
                            <div class="block-region-text-item">

                                <div class="block-region-text-item-icon">
                                    <?php if ( isset( $icons[ $index ] ) ) : ?>
                                        <img
                                            src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/icons/' . $icons[ $index ] ); ?>"
                                            alt=""
                                        />
                                    <?php endif; ?>
                                </div>

                                <div class="block-region-text-item-content">
                                    <?php if ( ! empty( $item['title'] ) ) : ?>
                                        <h4><?php echo esc_html( $item['title'] ); ?></h4>
                                    <?php endif; ?>

                                    <?php if ( ! empty( $item['text'] ) ) : ?>
                                        <p><?php echo esc_html( $item['text'] ); ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>

                <div class="block-region-map">
                    <?php echo $image; ?>
                </div>

            </div>

        </div>
    </div>
</div>