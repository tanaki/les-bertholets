<div class="block block-hero-home">

    <div class="block-inside">

        <div class="col">
            <img class="logo_hero" src="<?php echo get_template_directory_uri().'/assets/img/logo_lilac.svg'; ?>" alt="<?php echo get_bloginfo('title'); ?>" />
            <div class="quote">
                <?php echo get_label('home_hero_quote'); ?>
            </div>
            <div class="author">
                <?php echo get_label('home_hero_author', true); ?>
            </div>
            <a href="#" class="button button-light">
                <?php echo get_label('btn_about', true); ?>
            </a>
        </div>

        <div class="col">
            <img class="hero-image" src="<?php echo get_template_directory_uri().'/assets/img/home_hero.jpg'; ?>" src="<?php echo get_bloginfo('title'); ?>" />
        </div>
    </div>

</div>