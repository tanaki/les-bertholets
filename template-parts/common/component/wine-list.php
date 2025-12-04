<?php extract($args); ?>
<div class="block block-wine-navigation">
    <div class="block-inside">
        <div class="wine-navigation-title">
            <?php echo $title; ?>
        </div>

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
                        $post_id = $related->field('ID'); 
                        $gallery = pods('wines', $post_id)->field('wine_gallery');
                        $first_img = (!empty($gallery) && !empty($gallery[0]['guid'])) ? $gallery[0]['guid'] : null;
                        
                        get_template_part('template-parts/common/component/wine-item', null, array(
                            "image" => $first_img,
                            "link" => get_permalink($post_id),
                            "label" => esc_attr(get_the_title($post_id)),
                            "collection" => $related->display('wine_appellation'),
                            "detail" => $related->display('wine_category'),
                        ));
                    endwhile;
                endif;
            ?>

        </div>
    </div>
</div>
