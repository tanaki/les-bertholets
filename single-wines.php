<?php
    get_header();
    
    $pod  = pods( 'wines', get_the_ID() );

    if ( $pod->exists() ) {
        $images = $pod->field('wine_gallery');
?>

<div class="block block-title">
    <div class="block-inside">
        <h4>
            Wine shop
        </h4>
        <h3>
            <?php echo $pod->display('wine_category') .' - '. get_the_title(); ?>
        </h3>
    </div>
</div>

<div class="block block-wine-detail">
    <div class="block-inside">
        <?php if ( !empty($images) ) : ?>
            <div class="wine-gallery">
                <?php foreach ( $images as $img ) : ?>
                    <img src="<?php echo esc_url($img['guid']); ?>" alt="">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="wine-details">

            <?php the_title(); ?><br/>
            <?php the_content(); ?>
            Appellation : <?php echo $pod->display('wine_appellation'); ?><br/>
            Catégorie : <?php echo $pod->display('wine_category'); ?><br/>
            Variétés : <?php echo $pod->display('wine_varietes'); ?><br/>
        </div>
    </div>
</div>


<?php
    }

    get_template_part('template-parts/common/component/wine-list', false, array(
        'title' => 'Related products',
        'id' => get_the_id()
    ));

    get_footer();
?>