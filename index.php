<?php 

    get_header(); 

    get_template_part( 'template-parts/home/block-hero', null, array(
        'image' => get_template_directory_uri() . '/assets/img/temp/home/home.jpeg',
        'title' => 'Wineyard',
    ) );

    get_template_part( 'template-parts/home/block-intro', null, array(
        'title' => 'The villages around Montpellier',
        'subtitle' => 'have preserved their traditionnal know-how related to wine culture.',
        'text' => 'The Languedoc-Roussillon, France’s largest wine region, combines ancestral know-how with exceptional natural conditions. Its hot, dry climate, winds from land and sea, and mosaic of soils create a unique diversity of terroirs. Grenache, Syrah, Mourvèdre, and Carignan thrive here, each expressing distinctive nuances shaped by the land. Winemakers, both guardians of tradition and modern pioneers, craft sun-kissed wines full of character. Today, a new generation embraces sustainable and organic practices, ensuring the region’s heritage endures. From bold reds to delicate rosés and fresh whites, Languedoc-Roussillon wines offer authenticity in every glass.',
        'stamp' => true
    ) );

    get_template_part('template-parts/common/block-list', null, array(
        'title' => 'Discover our wines',
        'button' => array(
            'text' => 'See all wines',
            'link' => '#',
        ),
        'items' => array(
            array(
                'title' => 'Wine 1',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'title' => 'Wine 2',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'title' => 'Wine 3',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'title' => 'Wine 4',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'title' => 'Wine 5',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'title' => 'Wine 6',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'title' => 'Wine 7',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
            array(
                'title' => 'Wine 8',
                'link' => '#',
                'image' => get_template_directory_uri() . '/assets/img/temp/home/viognier.png',
            ),
        ),
    ));
    
    get_footer(); 
?>