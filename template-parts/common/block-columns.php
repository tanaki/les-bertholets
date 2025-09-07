<?php

$title = $args["title"];
$chapo = $args["chapo"];
$columns = $args["columns"];
$layout = array_key_exists('layout', $args) ? $args['layout'] : null;

if ( isset($args["button"]) ) {
    $buttonLabel = $args["button"]["label"];
    $buttonLink = $args["button"]["link"];
}
?>

<div class="block block-columns <?php if (isset($layout)) echo $layout; ?>">
    <div class="block-inside">
        <h3>
            <?php echo $title ?>
        </h3>

        <div class="chapo">
            <?php echo $chapo ?>
        </div>

        <div class="block-columns-items w-1/<?php echo min(3, count($columns)); ?>">
                
            <?php foreach($columns as $key => $column): ?>

                <div class="item-column">
                    <?php if ( isset($column['icon']) ) : ?>
                        <div class="item-icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/' . $column['icon']; ?>.svg" alt="<?php echo $column['title']; ?>" />
                        </div>
                    <?php endif; ?>
                    <h5 class="item-title">
                        <?php echo $column['title']; ?>
                    </h5>
                    <div class="item-content">
                        <?php echo $column['content']; ?>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
        <?php if ( isset($buttonLabel) && isset($buttonLink) ) : ?>
            <a class="button button-dark" href="<?php echo $buttonLink; ?>"><?php echo $buttonLabel; ?></a>
        <?php endif; ?>
    </div>
</div>