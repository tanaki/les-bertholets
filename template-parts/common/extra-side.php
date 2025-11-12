<div class="extra-side-cover"></div>
<div class="extra-side">
    <div class="extra-side--inside">
        <div class="">
            <div class="logo-side">
                <?php echo file_get_contents( get_template_directory_uri() . '/assets/img/logo.svg' ); ?>
            </div>
            <div class="logo-side-subtitle">
                Collection
            </div>
        </div>

        <div class="extra-side--subtitle">
            Follow us on instagram
        </div>

        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/domaine.png" alt="Domaine Les Bertholets" />

        <?php 
            echo get_template_part('template-parts/common/tagline'); 
            echo get_template_part('template-parts/common/social'); 
        ?>
        
    </div>
    <a href="#" class="extra-side--btn-close"></a>
</div>
