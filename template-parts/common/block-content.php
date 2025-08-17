<?php
    $title = $args['title'];
    $className = $args['class'];
?>

<div class="block block-content <?php echo $className; ?>">
    <div class="block-inside">
        <h3>
             <?php echo $title; ?>
        </h3>
        <div>
            Block content
        </div>
    </div>
</div>