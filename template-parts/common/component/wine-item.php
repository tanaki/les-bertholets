<?php extract($args); ?>
<a href="<?php echo esc_url( $link ); ?>" class="wine-item <?php echo $className ?? ''; ?>">
    <div class="wine-item-image">
        <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $label ); ?>" />
    </div>
    <div class="wine-item-title">
        <span class="collection"><?php echo $collection; ?></span>
        <span class="label"><?php echo $label; ?></span>
    </div>
</a>