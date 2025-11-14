
<?php extract($args); ?>
<div class="block block-intro">
    <div class="block-inside">

        <?php if ( isset($title) ) : ?>
            <h2 class="block-intro-title">
                <?php echo $title; ?>
            </h2>
        <?php endif; ?>

        <?php if ( isset($subtitle) ) : ?>
            <h3 class="block-intro-subtitle">
                <?php echo $subtitle; ?>
            </h3>
        <?php endif; ?>

        <?php if ( isset($text) ) : ?>
            <p class="block-intro-text">
                <?php echo $text; ?>
            </p>
        <?php endif; ?>

        <?php if ( isset($stamp) && $stamp === true ) : ?>
            <div class="block-intro-stamp">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/stamp.svg'; ?>" alt="Stamp" />
            </div>
        <?php endif; ?>

    </div>
</div>