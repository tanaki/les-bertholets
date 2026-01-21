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


                    <?php 
                        $content = get_the_content();
                        if ( isset($content) && !empty($content) ) : 
                    ?>
                        <div class="product-details-content">
                            <?php the_content(); ?>

                            <div class="product-details-highlight">

                                <?php 
                                    $appellation = $pod->display('wine_appellation');
                                    if ( isset($appellation) && !empty($appellation)  ) : 
                                ?>
                                    <div class="product-details-highlight-item">
                                        <span class="product-details-icon"><?php echo get_icon('wine_appellation'); ?></span> 
                                        <span class="product-details-highlight-label"><?php echo get_label('wine_appellation'); ?></span> 
                                        <span class="product-details-highlight-info"><?php echo $appellation; ?></span>
                                    </div>
                                <?php 
                                    endif; 
                                    $varieties = $pod->display('wine_varieties');
                                    if ( isset($varieties) && !empty($varieties)  ) : 
                                ?>
                                    <div class="product-details-highlight-item">
                                        <span class="product-details-icon"><?php echo get_icon('wine_varieties'); ?></span> 
                                        <span class="product-details-highlight-label"><?php echo get_label('wine_variety'); ?></span> 
                                        <span class="product-details-highlight-info"><?php echo $varieties; ?></span>
                                    </div>
                                <?php 
                                    endif; 
                                ?>
                            </div>

                            <?php
                                $eye = $pod->display('wine_eye');
                                if ( isset($eye) && !empty($eye)  ) : 
                            ?>
                                <div class="product-details-eye">
                                    <span class="product-details-icon"><?php echo get_icon('wine_eye'); ?></span> 
                                    <span>
                                        <span class="product-details-list-item-label"><?php echo get_label('wine_eye'); ?></span> 
                                        <span class="product-details-list-item-info"><?php echo $eye; ?></span>
                                    </span>
                                </div>
                            <?php 
                                endif; 
                                $nose = $pod->display('wine_nose');
                                if ( isset($nose) && !empty($nose)  ) : 
                            ?>
                                <div class="product-details-nose">
                                    <span class="product-details-icon"><?php echo get_icon('wine_nose'); ?></span> 
                                    <span>
                                        <span class="product-details-list-item-label"><?php echo get_label('wine_nose'); ?></span> 
                                        <span class="product-details-list-item-info"><?php echo $nose; ?></span>
                                    </span>
                                </div>
                            <?php 
                                endif; 
                                $tasting = $pod->display('wine_tasting');
                                if ( isset($tasting) && !empty($tasting)  ) : 
                            ?>
                                <div class="product-details-tasting">
                                    <span class="product-details-icon"><?php echo get_icon('wine_tasting'); ?></span> 
                                    <span>
                                        <span class="product-details-list-item-label"><?php echo get_label('wine_tasting'); ?></span> 
                                        <span class="product-details-list-item-info"><?php echo $tasting; ?></span>
                                    </span>
                                </div>
                            <?php 
                                endif; 
                                $pairing = $pod->display('wine_pairing');
                                if ( isset($pairing) && !empty($pairing)  ) : 
                            ?>
                                <div class="product-details-pairing">
                                    <span class="product-details-icon"><?php echo get_icon('wine_pairing'); ?></span> 
                                    <span>
                                        <span class="product-details-list-item-label"><?php echo get_label('wine_pairing'); ?></span> 
                                        <span class="product-details-list-item-info"><?php echo $pairing; ?></span>
                                    </span>
                                </div>
                            <?php 
                                endif; 
                            ?>
                        </div>
                        
                    <?php 
                        endif; 
                    ?>

                    <div class="product-toggles">
                        
                        <details class="toggle">
                            <summary>
                                <?php echo get_label('wine_details'); ?>
                                <span class="icon"></span>
                            </summary>
                            <div class="content">
                                <?php 
                                    $type = $pod->display('wine_type');
                                    if ( isset($type) && !empty($type)  ) : 
                                ?>
                                    <div class="product-details-list-item">
                                        <!-- <span class="product-details-icon"><?php echo get_icon('wine_type'); ?></span>  -->
                                        <span class="product-details-list-item-label"><?php echo get_label('wine_type'); ?></span> 
                                        <span class="product-details-list-item-info"><?php echo $type; ?></span>
                                    </div>
                                <?php 
                                    endif; 
                                    $geography = $pod->display('wine_geography');
                                    if ( isset($geography) && !empty($geography)  ) : 
                                ?>
                                    <div class="product-details-list-item">
                                        <!-- <span class="product-details-icon"><?php echo get_icon('wine_geography'); ?></span>  -->
                                        <span>
                                            <span class="product-details-list-item-label"><?php echo get_label('wine_geography'); ?></span> 
                                            <span class="product-details-list-item-info"><?php echo $geography; ?></span>
                                        </span>
                                    </div>
                                <?php 
                                    endif; 
                                    $climate = $pod->display('wine_climate');
                                    if ( isset($climate) && !empty($climate)  ) : 
                                ?>
                                    <div class="product-details-list-item">
                                        <!-- <span class="product-details-icon"><?php echo get_icon('wine_climate'); ?></span>  -->
                                        <span class="product-details-list-item-label"><?php echo get_label('wine_climate'); ?></span> 
                                        <span class="product-details-list-item-info"><?php echo $climate; ?></span>
                                    </div>
                                <?php 
                                    endif; 
                                    $soil = $pod->display('wine_soil');
                                    if ( isset($soil) && !empty($soil)  ) : 
                                ?>
                                    <div class="product-details-list-item">
                                        <!-- <span class="product-details-icon"><?php echo get_icon('wine_soil'); ?></span>  -->
                                        <span class="product-details-list-item-label"><?php echo get_label('wine_soil'); ?></span> 
                                        <span class="product-details-list-item-info"><?php echo $soil; ?></span>
                                    </div>
                                <?php 
                                    endif; 
                                    
                                    $labels = $pod->display('wine_labels');

                                    if ( ! empty($labels) ) :
                                    $labels_array = explode('___', $labels);
                                ?>
                                    <div class="product-details-list-labels">
                                        <span class="product-details-list-item-label">
                                            <?php echo get_label('wine_labels'); ?>
                                        </span>

                                        <span class="product-details-list-item-info">
                                            <?php
                                                foreach ( $labels_array as $label ) {
                                                    $label = trim($label);
                                                    if ( ! empty($label) ) {
                                                        echo get_icon_label($label);
                                                    }
                                                }
                                            ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </details>
                    <?php 
                        $qr_code = $pod->display('wine_qr_code');
                        if ( isset($qr_code) && !empty($qr_code) ) :
                    ?>
                        <details class="toggle">
                            <summary>
                            <?php echo get_label('wine_ingredients'); ?>
                            <span class="icon"></span>
                            </summary>
                            <div class="content">
                                <img src="<?php echo $qr_code; ?>" alt="<?php echo get_the_title(); ?>" />
                            </div>
                        </details>

                    <?php 
                        endif;
                    ?>

                    </div>



                </div>

            </div>
        </div>
    </div>
</div>


<div class="block block-interlude">
    <div class="block-inside">
        <h4><?php echo get_label('punchline'); ?></h4>
        <div class="signature">
            <?php echo file_get_contents( get_template_directory_uri() . '/assets/img/signature-paul-albert.svg' ); ?>
        </div>
    </div>
</div>


<?php
    }

    get_template_part('template-parts/common/component/wine-list', false, array(
        'title' => get_label('related_products'),
        'id' => get_the_id()
    ));

    get_footer();
?>