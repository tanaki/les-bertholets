<?php 

    get_header(); 

    get_template_part( 'template-parts/common/block-hero', null, array(
        'image' => get_template_directory_uri() . '/assets/img/temp/home/home.jpeg',
        'title' => 'Wineyard',
    ) );

    get_template_part( 'template-parts/common/block-intro', null, array(
        'title' => 'The villages around Montpellier',
        'subtitle' => 'have preserved their traditionnal know-how related to wine culture.',
        'text' => 'The Languedoc-Roussillon, France’s largest wine region, combines ancestral know-how with exceptional natural conditions. Its hot, dry climate, winds from land and sea, and mosaic of soils create a unique diversity of terroirs. Grenache, Syrah, Mourvèdre, and Carignan thrive here, each expressing distinctive nuances shaped by the land. Winemakers, both guardians of tradition and modern pioneers, craft sun-kissed wines full of character. Today, a new generation embraces sustainable and organic practices, ensuring the region’s heritage endures. From bold reds to delicate rosés and fresh whites, Languedoc-Roussillon wines offer authenticity in every glass.',
        'stamp' => true
    ) );

    $lang = pll_current_language();
    
    $params = [
        'limit'      => -1,
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

    $wines = pods('wines', $params);
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
        'title' => 'Discover our wines',
        'button' => array(
            'text' => 'See more',
            'link' => '#',
        ),
        'items' => $items,
    ));
    
    get_footer(); 
?>