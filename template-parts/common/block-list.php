<?php extract( $args ); ?>
<div class="block block-list">
    <div class="block-inside">

        <div class="block-list-header">

            <?php if ( isset( $title ) ) : ?>
                <h3 class="block-list-title">
                    <?php echo $title; ?>
                </h3>
            <?php endif; ?>

            <?php if ( isset( $button ) && is_array( $button ) ) : ?>
                <a href="<?php echo esc_url( $button['link'] ); ?>" class="button button--primary">
                    <?php echo $button['text']; ?>
                </a>
            <?php endif; ?>
        </div>
        
        <?php if ( isset( $items ) && is_array( $items ) && count( $items ) > 0 ) : ?>
            <div class="swiper-container">
                <div class="block-list-items block-list-swiper swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ( $items as $item ) :
                            get_template_part('template-parts/common/component/wine-item', null, array(
                                "className" => "block-list-item swiper-slide",
                                "image" => $item['image'],
                                "link" => $item['link'],
                                "label" => $item['label'],
                                "collection" => $item['collection'],
                                "detail" => $item['detail'],
                            ));
                        endforeach; ?>
                    </div>
                </div>
                <div class="block-list-button-prev"></div>
                <div class="block-list-button-next"></div>
            </div>
        <?php endif; ?>
    </div>
</div>