<?php
    $items = $args['items'];
?>

<div class="block block-grid-detail">
    <div class="block-inside">
        
        <div class="grid">
            <?php foreach ( $items as $key => $item ): ?>

                <div class="item-grid">
                    <img src="<?php echo  $item['image']; ?>" alt="<?php echo $item['title']; ?>" />
                    <h5><?php echo $item['title']; ?></h5>
                    <div class="item-content">
                        <?php echo $item['content']; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>