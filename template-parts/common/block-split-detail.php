<?php
    $id = array_key_exists('id', $args) ? $args['id'] : null;
    $title = $args['title'];
    $intro = array_key_exists('intro', $args) ? $args['intro'] : null;
    $text = array_key_exists('text', $args) ? $args['text'] : null;
    $button = array_key_exists('button', $args) ? $args['button'] : null;
?>
<div class="block-split-detail">
    <?php if ($title) : ?>
        <h3 class="block-title"><?php echo $title; ?></h3>
    <?php endif; ?>

    <?php if ($intro) : ?>
        <div class="block-intro">
            <?php echo $intro; ?>
        </div>
    <?php endif; ?>

    <?php if ($text) : ?>
        <div class="block-text">
            <?php echo $text; ?>
        </div>
    <?php endif; ?>

    <?php if ( isset( $button ) ) : ?>
        <a href="#<?php echo $id; ?>" class="button button-small button-border-transparent">
            <?php echo $button; ?>
        </a>
    <?php endif; ?>
</div>