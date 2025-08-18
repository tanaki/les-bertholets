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

                <div class="item-grid">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/' . $item['icon']; ?>.svg" alt="<?php echo $item['title']; ?>" />
                    <h5><?php echo $item['title']; ?></h5>
                    <div class="item-content">
                        <?php echo $item['content']; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

        <a class="button button-dark" href="#">En savoir plus</a>
    </div>
</div>