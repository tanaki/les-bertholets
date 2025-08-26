<?php
    $title = array_key_exists('title', $args) ? $args['title'] : null;
    $image = $args['image'];
    $link = $args['link'];
    $text = array_key_exists('text', $args) ? $args['text'] : null;
?>
<a href="<?php echo $link; ?>" class="block-case-study">
    <img src="<?php echo get_template_directory_uri() . '/assets/img/case-studies/' . $image; ?>" alt="<?php echo $title; ?>" />
    <div class="block-case-study-details">
        <div class="block-case-study-title">
            <?php echo $title; ?>
        </div>
        <div class="block-case-study-text">
            <?php echo $text; ?>
        </div>
    </div>
</a>