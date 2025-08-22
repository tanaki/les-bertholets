<?php

$title = $args["title"];
$chapo = $args["chapo"];
$columns = $args["columns"];

if ( isset($args["button"]) ) {
    $buttonLabel = $args["button"]["label"];
    $buttonLink = $args["button"]["link"];
}

?>

<div class="block block-columns">
    <div class="block-inside">
        <h3>
            <?php echo $title ?>
        </h3>

        <div class="chapo">
            <?php echo $chapo ?>
        </div>

        <div class="block-columns-items w-1/<?php echo count($columns); ?>">
                
            <?php foreach($columns as $key => $column): ?>

                <div class="item-column">
                    <h5 class="item-title">
                        <?php echo $column['title']; ?>
                    </h5>
                    <div class="item-content">
                        <?php echo $column['content']; ?>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
        <?php if ( isset($args["button"]) ) : ?>
            <a class="button button-dark" href="<?php echo $buttonLink; ?>"><?php echo $buttonLabel; ?></a>
        <?php endif; ?>
    </div>
</div>