<?php extract($args); ?>
<div class="block block-intro">
    <div class="block-inside">

        <div class="block-intro-content">

            <?php if ( isset($title) ) : ?>
                <h2 class="block-intro-title">
                    <?php echo $title; ?>
                </h2>
            <?php endif; ?>

            <?php if ( isset($subtitle) ) : ?>
                <div class="block-intro-subtitle">
                    <?php echo $subtitle; ?>
                </div>
            <?php endif; ?>

            <?php if ( isset($text) ) : ?>
                <div class="block-intro-text">
                    <?php echo $text; ?>
                </div>
            <?php endif; ?>

            <?php if ( isset($stamp) && $stamp === true ) : ?>
                <div class="block-intro-stamp">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/stamp.svg'; ?>" alt="Stamp" />
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>