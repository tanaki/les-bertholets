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

    get_template_part('template-parts/common/block-list', null, array(
        'title' => 'Discover our wines',
        'button' => array(
            'text' => 'See more',
            'link' => '#',
        ),
        'items' => array(
            array(
                'collection' => 'IGP Pays d\'Oc',
                'label' => 'Viognier 2022',
                'detail' => 'Reserve',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'collection' => 'IGP Pays d\'Oc',
                'label' => 'Viognier 2023',
                'detail' => 'Reserve',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'collection' => 'IGP Pays d\'Oc',
                'label' => 'Viognier 2024',
                'detail' => 'Reserve',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'collection' => 'IGP Pays d\'Oc',
                'label' => 'Viognier 2025',
                'detail' => 'Reserve',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'collection' => 'IGP Pays d\'Oc',
                'label' => 'Viognier 2026',
                'detail' => 'Reserve',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'collection' => 'IGP Pays d\'Oc',
                'label' => 'Viognier 2027',
                'detail' => 'Reserve',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'collection' => 'IGP Pays d\'Oc',
                'label' => 'Viognier 2028',
                'detail' => 'Reserve',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'collection' => 'IGP Pays d\'Oc',
                'label' => 'Viognier 2029',
                'detail' => 'Reserve',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
        ),
    ));
    
    get_footer(); 
?>