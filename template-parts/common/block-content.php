<?php
    $title = $args['title'];
    $className = $args['class'];
    $content = $args['content'];
?>

<div class="block block-content <?php echo $className; ?>">
    <div class="block-inside">
        <h3>
             <?php echo $title; ?>
        </h3>
        <div class="block-content-content">
            <?php echo $content; ?>
        </div>
    </div>
</div>