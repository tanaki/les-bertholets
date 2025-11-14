<?php extract( $args ); ?>
<div class="block block-list">
    <div class="block-inside">

        <?php if ( isset( $title ) ) : ?>
            <h2 class="block-list-title">
                <?php echo $title; ?>
            </h2>
        <?php endif; ?>

        <?php if ( isset( $button ) && is_array( $button ) ) : ?>
            <a href="<?php echo esc_url( $button['link'] ); ?>" class="button button-primary">
                <?php echo $button['text']; ?>
            </a>
        <?php endif; ?>

        <?php if ( isset( $items ) && is_array( $items ) && count( $items ) > 0 ) : ?>
            <div class="block-list-items">
                <?php foreach ( $items as $item ) : ?>
                    <a href="<?php echo esc_url( $item['link'] ); ?>" class="block-list-item">
                        <div class="block-list-item-image">
                            <img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" />
                        </div>
                        <div class="block-list-item-title">
                            <?php echo $item['title']; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>