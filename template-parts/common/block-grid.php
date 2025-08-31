<?php
    $title = array_key_exists('title', $args) ? $args['title'] : null;
    $items = array_key_exists('items', $args) ? $args['items'] : null;

    if ( isset($args["button"]) ) {
        $buttonLabel = $args["button"]["label"];
        $buttonLink = $args["button"]["link"];
    }
?>

<div class="block block-grid">
    <div class="block-inside">
        <?php if ( isset($title) ) : ?>
            <h3>
                <?php echo $title; ?>
            </h3>
        <?php endif; ?>

        <div class="grid">
            <?php foreach ( $items as $key => $item ): ?>

                <div class="item-grid">
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" />
                    <h5><?php echo $item['title']; ?></h5>
                    <div class="item-content">
                        <?php echo $item['excerpt']; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

        <?php if ( isset($buttonLabel) && isset($buttonLink) ) : ?>
            <a class="button button-dark" href="<?php echo $buttonLink; ?>"><?php echo $buttonLabel; ?></a>
        <?php endif; ?>
    </div>
</div>