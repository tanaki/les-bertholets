<?php extract($args); ?>
<div class="block block-wine-navigation">
    <div class="block-inside">
        <?php echo $title; ?>

        <div class="wine-list">
            <?php
                $lang = pll_current_language();

                $params = [
                    'limit'      => 3,
                    'orderby'    => 'RAND()',   // tri aléatoire
                    'where'      => "
                        t.ID != $id 
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
                        
                        <a class="wine-link" href="<?php echo get_permalink($post_id); ?>">
                            <?php
                                $gallery = pods('wines', $post_id)->field('wine_gallery');
                                $first_img = (!empty($gallery) && !empty($gallery[0]['guid'])) ? $gallery[0]['guid'] : null;
                            ?>

                            <?php if ($first_img) : ?>
                                <div class="wine-thumb">
                                    <img src="<?php echo esc_url($first_img); ?>" alt="<?php echo esc_attr(get_the_title($post_id)); ?>">
                                </div>
                            <?php endif; ?>

                            <h3><?php echo get_the_title($post_id); ?></h3>

                            <div>
                                <?php echo $related->display('wine_category'); ?>
                            </div>

                            
                        </a>

                    <?php endwhile;
                endif;
            ?>

        </div>
    </div>
</div>
