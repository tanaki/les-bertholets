<?php
    get_header();
    
    $pod  = pods( 'wines', get_the_ID() );

    if ( $pod->exists() ) {
        $images = $pod->field('wine_gallery');
?>

<div class="block block-wine-detail">
    <div class="block-inside">

        <div class="product-container">

            <div class="product-gallery-block">

                <?php if (!empty($images)) : ?>
                    <div class="product-gallery">

                        <div class="product-thumbs">
                            <?php for ($i = 0; $i < count($images); $i++) : ?>
                                <div class="thumb">
                                    <?php echo wp_get_attachment_image(($images[$i]['ID']), 'large', false, ['class' => 'thumb-img']); ?>
                                </div>
                            <?php endfor; ?>
                        </div>

                        <div class="product-main-image">
                            <?php echo wp_get_attachment_image(($images[0]['ID']), 'large', false, [
                                'id' => 'mainImg',
                            ]); ?>
                        </div>

                    </div>
                <?php endif; ?>

            </div>

            <div class="product-text-block">

                <h2 class="product-title">
                    <?php the_title(); ?>
                </h2>

                <div class="product-content">
                    <div class="product-details-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="product-details-list">

                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_volume'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_volume'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $pod->display('wine_volume'); ?></span>
                        </div>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_appellation'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_appellation'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $pod->display('wine_appellation'); ?></span>
                        </div>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_producer'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_producer'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $pod->display('wine_producer'); ?></span>
                        </div>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_varieties'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_variety'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $pod->display('wine_varieties'); ?></span>
                        </div>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_geography'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_geography'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $pod->display('wine_geography'); ?></span>
                        </div>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_climate'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_climate'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $pod->display('wine_climate'); ?></span>
                        </div>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_soil'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_soil'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $pod->display('wine_soil'); ?></span>
                        </div>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_alcohol'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_alcohol'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $pod->display('wine_alcohol'); ?></span>
                        </div>
                        <div class="product-details-list-labels">
                            <span class="product-details-list-item-label"><?php echo get_label('wine_labels'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo get_icon_label($pod->display('wine_labels')); ?></span> 
                        </div>

                    </div>

                    <div class="product-toggles">

                        <details class="toggle">
                            <summary>
                            Ingrédients
                            <span class="icon"></span>
                            </summary>
                            <div class="content">
                                <?php echo $pod->display('wine_ingredients'); ?>
                            </div>
                        </details>

                        <details class="toggle">
                            <summary>
                                Valeurs nutritionelles
                                <span class="icon"></span>
                            </summary>
                            <div class="content">
                                <?php echo $pod->display('wine_info'); ?>
                            </div>
                        </details>

                    </div>



                </div>

            </div>
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