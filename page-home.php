<?php 
    /*
    Template Name: Home Page
    */

    $lang = pll_current_language();
    
    get_header(); 

    get_template_part( 'template-parts/common/block-hero', null, array(
        'image' => get_template_directory_uri() . '/assets/img/temp/home/home.jpeg',
        'title' => 'Wineyard',
        'classname' => 'is-home'
    ) );

    $podPage = pods('page', [
        'limit' => 1,
        'where' => "ID = '". $post->ID ."'"
    ]);

    get_template_part( 'template-parts/common/block-intro', null, array(
        'title' => $podPage->display('intro_title'),
        'subtitle' => $podPage->display('intro_subtitle'),
        'text' => $podPage->display('intro_text'),
        'stamp' => $podPage->display('intro_stamp') === "Oui" ? true : false,
    ) );

    $paramsWines = [
        'limit'      => 6,
        'orderby'    => 'RAND()',
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