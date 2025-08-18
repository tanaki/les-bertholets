<?php
    $title = $args['title'];
    $items = $args['items'];
?>

<div class="block block-grid">
    <div class="block-inside">
        <h3>
            <?php echo $title; ?>
        </h3>

        <div class="grid">
            <?php foreach ( $items as $key => $item ): ?>

                <div class="grid-item">
                    <?php echo $item['icon']; ?>
                    <?php echo $item['title']; ?>
                    <?php echo $item['content']; ?>
                </div>

            <?php endforeach; ?>
        </div>

        <a class="button button-dark" href="#">En savoir plus</a>
    </div>
</div>