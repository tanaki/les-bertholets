<?php extract($args); ?>
<div class="block block-hero-swiper <?php if ( isset($classname) && !empty($classname) ) echo $classname; ?>">
    <div class="block-inside">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ( $items as $item ) : ?>
                    <img class="block-hero-image swiper-slide" src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" />
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
