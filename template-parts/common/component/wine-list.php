<?php 
    extract($args); 

    $lang = function_exists('pll_current_language')
        ? pll_current_language()
        : null;

    $current_categories = wp_get_post_terms($id, 'category', [
        'fields' => 'ids',
    ]);

    if ( ! empty($current_categories) ) :

        $query_args = [
            'post_type'      => 'wines',
            'posts_per_page' => 3,
            'post__not_in'   => [$id],
            'category__in'   => $current_categories,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ];

        if ( $lang ) {
            $query_args['lang'] = $lang;
        }

        $query = new WP_Query($query_args);

        if ( $query->have_posts() ) :
?>

<div class="block block-wine-navigation">
    <div class="block-inside">

        <?php if ( ! empty($title) ) : ?>
            <div class="wine-navigation-title">
                <?php echo esc_html($title); ?>
            </div>
        <?php endif; ?>

        <div class="wine-list">
            <?php
                while ( $query->have_posts() ) :
                    $query->the_post();

                    $post_id = get_the_ID();

                    $gallery = pods('wines', $post_id)->field('wine_gallery');
                    $first_img = (!empty($gallery) && !empty($gallery[0]['guid'])) ? $gallery[0]['guid'] : null;
                    
                    get_template_part(
                        'template-parts/common/component/wine-item',
                        null,
                        [
                            'image'      => $first_img,
                            'link'       => get_permalink(),
                            'label'      => esc_attr(get_the_title()),
                            'collection' => get_post_meta($post_id, 'wine_appellation', true),
                        ]
                    );

                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

<?php
        endif;
    endif;
?>