<?php
    $title = $args['title'];
    $items = $args['items'];
?>
<div class="block block-list">
    <div class="block-inside">
        <h3>
            <?php echo $title; ?>
        </h3>
        <div class="block-list-items">
            <?php 
                foreach( $items as $key => $item ) {
                    get_template_part('template-parts/common/block-swipe-item', null, $item);
                }
            ?>
        </div>

        <a class="button button-light" href="#">Voir tout</a>
    </div>
</div>