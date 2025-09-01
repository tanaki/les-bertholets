<?php
    $title = array_key_exists('title', $args) ? $args['title'] : null;
    $image = $args['image'];
    $slug = $args['slug'];
    $text = array_key_exists('text', $args) ? $args['text'] : null;
?>
<a href="/case-study/<?php echo $slug; ?>" class="block-case-study">
    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
    <div class="block-case-study-details">
        <div class="block-case-study-title">
            <?php echo $title; ?>
        </div>
        <div class="block-case-study-text">
            <?php echo $text; ?>
        </div>
    </div>
</a>