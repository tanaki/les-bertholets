<?php extract( $args ); ?>
<div class="block block-list">
    <div class="block-inside">

        <div class="block-list-header">

            <?php if ( isset( $title ) ) : ?>
                <h2 class="block-list-title">
                    <?php echo $title; ?>
                </h2>
            <?php endif; ?>

            <?php if ( isset( $button ) && is_array( $button ) ) : ?>
                <a href="<?php echo esc_url( $button['link'] ); ?>" class="button button--primary">
                    <?php echo $button['text']; ?>
                </a>
            <?php endif; ?>
        </div>
        
        <?php if ( isset( $items ) && is_array( $items ) && count( $items ) > 0 ) : ?>
            <div class="block-list-items block-list-swiper swiper">
                <div class="swiper-wrapper">
                    <?php foreach ( $items as $item ) : ?>
                        <a href="<?php echo esc_url( $item['link'] ); ?>" class="block-list-item swiper-slide">
                            <div class="block-list-item-image">
                                <img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['label'] ); ?>" />
                            </div>
                            <div class="block-list-item-title">
                                <span><?php echo $item['collection']; ?></span>
                                <span><?php echo $item['label']; ?></span>
                                <span><?php echo $item['detail']; ?></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>