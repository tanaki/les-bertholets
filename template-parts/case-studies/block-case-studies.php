<?php
    $title = array_key_exists('title', $args) ? $args['title'] : null;
    $items = $args['items'];
    $className = array_key_exists('className', $args) ? $args['className'] : null;

    if ( isset($args["button"]) ) {
        $buttonLabel = $args["button"]["label"];
        $buttonLink = $args["button"]["link"];
        $buttonClassName = array_key_exists('className', $args["button"]) ? $args["button"]["className"] : "button-light";
    }
?>
<div class="block block-list <?php if ( isset($className) ) echo $className; ?>">
    <div class="block-inside">
        <?php if ( isset($title) ) : ?>
            <h3>
                <?php echo $title; ?>
            </h3>
        <?php endif; ?>
        <div class="block-list-items animate-list">
            <?php 
                foreach( $items as $key => $item ) {
                    get_template_part('template-parts/case-studies/block-case-study', null, $item);
                }
            ?>
        </div>

        <?php if ( isset($buttonLabel) && isset($buttonLink) ) : ?>
            <a class="button <?php echo $buttonClassName; ?> animate-button" href="<?php echo $buttonLink; ?>"><?php echo $buttonLabel; ?></a>
        <?php endif; ?>
    </div>
</div>