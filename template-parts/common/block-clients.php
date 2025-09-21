<?php
    $title = $args['title'];
    $clients = $args['clients'];
?>
<div class="block block-clients">
    <div class="block-inside">
        <h3>
            <?php echo $title; ?>
        </h3>
        <div class="block-clients-swiper swiper">
            <div class="swiper-wrapper">
                <?php foreach ( $clients as $key => $client ) : ?>
                <div class="swiper-slide client-<?php echo $key; ?>">
                    <?php if ( isset($client['link']) ) { ?><a href="<?php echo $client['link']; ?>" target="_blank"><?php } ?>
                        <img src="<?php echo $client['image']; ?>" alt="<?php echo $client['name']; ?>" />
                    <?php if ( isset($client['link']) ) { ?></a><?php } ?>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
