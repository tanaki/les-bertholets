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

        <?php the_title(); ?><br/>
        <?php the_content(); ?>
        Appellation : <?php echo $pod->display('wine_appellation'); ?><br/>
        Catégorie : <?php echo $pod->display('wine_category'); ?><br/>
        Variétés : <?php echo $pod->display('wine_varietes'); ?><br/>
    </div>
</div>

<div class="block block-wine-navigation">
    <div class="block-inside">
        Title

        <div>
            <?php
                $current_id = get_the_ID();
                $lang = pll_current_language();

                $params = [
                    'limit'      => 3,
                    'orderby'    => 'RAND()',   // tri aléatoire
                    'where'      => "
                        t.ID != $current_id 
                        AND t.post_type = 'wines'
                        AND t.post_status = 'publish'
                        AND t.ID IN (
                            SELECT object_id 
                            FROM {$wpdb->prefix}term_relationships tr
                            INNER JOIN {$wpdb->prefix}term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                            INNER JOIN {$wpdb->prefix}terms t2 ON tt.term_id = t2.term_id
                            WHERE tt.taxonomy = 'language' AND t2.slug = '$lang'
                        )
                    ",
                ];

                $related = pods('wines', $params);

                if ( $related->total() > 0 ) :
                    while ( $related->fetch() ) :
                        $post_id = $related->field('ID'); ?>
                        
                        <article>
                            <h3><?php echo get_the_title($post_id); ?></h3>
                            <div>
                                <?php echo $related->display('wine_category'); ?>
                            </div>
                            <a href="<?php echo get_permalink($post_id); ?>">Voir le vin</a>
                        </article>

                    <?php endwhile;
                endif;
            ?>

        </div>
    </div>
</div>

<?php
    }
    get_footer();
?>