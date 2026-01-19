<?php 
    /*
    Template Name: Home Page
    */

    $lang = pll_current_language();
    
    get_header(); 


    $pod = pods( get_post_type(), get_the_ID() );
    $intro_images = $pod->field( 'intro_images' );
    $hero_image = null;
    if ( ! empty( $intro_images ) ) {
        $hero_image = wp_get_attachment_image_url( $intro_images[0]['ID'], 'full' );
    }

    get_template_part(
        'template-parts/common/block-hero',
        null,
        array(
            'image'     => $hero_image,
            'title'     => get_the_title(),
            'classname' => 'is-home'
        )
    );

    get_template_part( 'template-parts/common/block-home' );

    $paramsWines = [
        'limit'      => -1,
        'orderby'    => 'menu_order',
        'where'      => "
            t.post_type = 'wines'
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

    $wines = pods('wines', $paramsWines);
    $items = array();

    if ( $wines->total() > 0 ) :
        while ( $wines->fetch() ) :
            $post_id = $wines->field('ID'); 
            $gallery = pods('wines', $post_id)->field('wine_gallery');
            $first_img = (!empty($gallery) && !empty($gallery[0]['guid'])) ? $gallery[0]['guid'] : null;

            array_push($items, array(
                "image" => $first_img,
                "link" => get_permalink($post_id),
                "label" => esc_attr(get_the_title($post_id)),
                "collection" => $wines->display('wine_appellation'),
                "detail" => $wines->display('wine_category'),
            ));
        endwhile;
    endif;

    get_template_part('template-parts/common/block-list', null, array(
        'title' => get_label('discover-wines'),
        'button' => array(
            'text' => get_label('see-more'),
            'link' => get_label('wines-url'),
        ),
        'items' => $items,
    ));
    
    get_footer(); 
?>