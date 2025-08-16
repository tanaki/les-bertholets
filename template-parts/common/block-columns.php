<?php

$title = $args["title"];
$chapo = $args["chapo"];
$columns = $args["columns"];

?>

<div class="block block-columns">
    <div class="block-inside">
        <h4>
            <?php echo $title ?>
        </h4>

        <div>
            <p><?php echo $chapo ?></p>

            <div class="w-1/<?php echo count($columns); ?>">
                    
                <?php foreach($columns as $key => $column): ?>

                    <div><?php echo $column['title']; ?></div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>