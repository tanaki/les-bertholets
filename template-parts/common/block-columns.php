<?php

$title = $args["title"];
$chapo = $args["chapo"];
$columns = $args["columns"];

?>

<div class="block block-columns">
    <h3><?php echo $title ?></h3>
    <p><?php echo $chapo ?></p>

    <div class="w-1/<?php echo count($columns); ?>">
        
    <?php foreach($columns as $key => $column): ?>

        <div><?php echo $column['title']; ?></div>

    <?php endforeach; ?>

    </div>
</div>