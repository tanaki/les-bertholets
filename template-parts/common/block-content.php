<?php
    $id = $args['id'];
    $title = $args['title'];
    $className = array_key_exists('className', $args) ? $args['className'] : null;
    $content = $args['content'];
?>

<div class="block block-content <?php if ( isset($className) ) echo $className; ?>" id="<?php echo $id; ?>">
    <div class="block-inside">
        <h3>
             <?php echo $title; ?>
        </h3>
        <div class="block-content-content">
            <?php echo $content; ?>
        </div>
    </div>
</div>