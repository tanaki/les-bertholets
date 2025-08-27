<?php
    $title = $args['title'];
    $chapo = array_key_exists('chapo', $args) ? $args['chapo'] : null;
    $image = array_key_exists('image', $args) ? $args['image'] : null;
?>
<div class="block block-hero">

    <div class="block-inside">
        <h1><?php echo $title; ?></h1>
        <?php if (isset($chapo)) echo '<div class="chapo">'.$chapo.'</div>'; ?>
    </div>
</div>
<?php if ( isset($image) && !empty($image) ) : ?>
    <div class="block-hero-image-container">
        <img class="block-hero-image" src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
    </div>
<?php endif; ?>