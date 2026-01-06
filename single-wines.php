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
                        </div>
                    <?php 
                        endif; 
                    ?>
                    <div class="product-details-list">

                    <?php 
                        $tasting = $pod->display('wine_tasting');
                        if ( isset($tasting) && !empty($tasting)  ) : 
                    ?>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_tasting'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_tasting'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $tasting; ?></span>
                        </div>
                    <?php 
                        endif; 
                        $pairing = $pod->display('wine_pairing');
                        if ( isset($pairing) && !empty($pairing)  ) : 
                    ?>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_pairing'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_pairing'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $pairing; ?></span>
                        </div>
                    <?php 
                        endif; 
                        $temperature = $pod->display('wine_temperature');
                        if ( isset($temperature) && !empty($temperature)  ) : 
                    ?>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_temperature'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_temperature'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $temperature; ?></span>
                        </div>
                    <?php 
                        endif; 
                        $volume = $pod->display('wine_volume');
                        if ( isset($volume) && !empty($volume)  ) : 
                    ?>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_volume'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_volume'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $volume; ?></span>
                        </div>
                    <?php 
                        endif; 
                        $appellation = $pod->display('wine_appellation');
                        if ( isset($appellation) && !empty($appellation)  ) : 
                    ?>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_appellation'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_appellation'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $appellation; ?></span>
                        </div>
                    <?php 
                        endif; 
                        $producer = $pod->display('wine_producer');
                        if ( isset($producer) && !empty($producer)  ) : 
                    ?>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_producer'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_producer'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $producer; ?></span>
                        </div>
                    <?php 
                        endif; 
                        $varieties = $pod->display('wine_varieties');
                        if ( isset($varieties) && !empty($varieties)  ) : 
                    ?>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_varieties'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_variety'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $varieties; ?></span>
                        </div>
                    <?php 
                        endif; 
                        $geography = $pod->display('wine_geography');
                        if ( isset($geography) && !empty($geography)  ) : 
                    ?>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_geography'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_geography'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $geography; ?></span>
                        </div>
                    <?php 
                        endif; 
                        $climate = $pod->display('wine_climate');
                        if ( isset($climate) && !empty($climate)  ) : 
                    ?>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_climate'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_climate'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $climate; ?></span>
                        </div>
                    <?php 
                        endif; 
                        $soil = $pod->display('wine_soil');
                        if ( isset($soil) && !empty($soil)  ) : 
                    ?>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_soil'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_soil'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $soil; ?></span>
                        </div>
                    <?php 
                        endif; 
                        $alcohol = $pod->display('wine_alcohol');
                        if ( isset($alcohol) && !empty($alcohol)  ) : 
                    ?>
                        <div class="product-details-list-item">
                            <span class="product-details-list-item-icon"><?php echo get_icon('wine_alcohol'); ?></span> 
                            <span class="product-details-list-item-label"><?php echo get_label('wine_alcohol'); ?></span> 
                            <span class="product-details-list-item-info"><?php echo $alcohol; ?></span>
                        </div>
                    <?php 
                        endif; 

                        $labels = $pod->display('wine_labels');

                        if ( ! empty($labels) ) :
                        // On transforme la chaîne en tableau
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

                    <div class="product-toggles">
                        
                    <?php 
                        $ingredients = $pod->display('wine_ingredients');
                        if ( isset($ingredients) && !empty($ingredients) ) :
                    ?>
                        <details class="toggle">
                            <summary>
                            <?php echo get_label('wine_ingredients'); ?>
                            <span class="icon"></span>
                            </summary>
                            <div class="content">
                                <?php echo $ingredients; ?>
                            </div>
                        </details>

                    <?php 
                        endif;

                        $info = $pod->display('wine_info');
                        if ( isset($info) && !empty($info) ) :
                    ?>

                        <details class="toggle">
                            <summary>
                                <?php echo get_label('wine_nutritional_values'); ?>
                                <span class="icon"></span>
                            </summary>
                            <div class="content">
                                <?php echo $info; ?>
                            </div>
                        </details>

                    <?php endif; ?>

                    </div>



                </div>

            </div>
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