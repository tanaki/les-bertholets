<?php
    $title = $args['title'];
    $image = $args['image'];
    $link = $args['link'];
?>
<a href="<?php echo $link; ?>" class="block-case-study">
    <img src="<?php echo get_template_directory_uri() . '/assets/img/case-studies/' . $image; ?>" alt="<?php echo $title; ?>" />
    <div class="block-case-study-title">
        <?php echo $title; ?>
    </div>
</a>