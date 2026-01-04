<?php extract($args); ?>
<div class="block block-hero <?php if ( isset($classname) && !empty($classname) ) echo $classname; ?>">
    <div class="block-inside">
        <img class="block-hero-image" src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
    </div>
</div>