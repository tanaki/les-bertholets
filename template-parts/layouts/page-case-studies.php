<?php

    // Case Studies
    $podsCaseStudies = pods('case_study', array(
        'limit' => -1
    ));
    $caseStudies = array();

    while ( $podsCaseStudies->fetch() ) :
        $caseStudies[] = array(
            'title' => $podsCaseStudies->display('post_title'),
            'slug' => $podsCaseStudies->display('post_name'),
            'intro' => $podsCaseStudies->display('hero_intro'),
            'image' => $podsCaseStudies->display('hero_image'),
        );
    endwhile;

    echo '<pre>';
    print_r( $caseStudies );
    echo '</pre>';

    get_template_part('template-parts/case-studies/block-case-studies', null, [
        'className' => 'bg-white bg-full-list',
        'items' => [
            [
                'title' => 'L\'horloge astronomique de Besançon',
                'image' => 'horloge.png',
                'link' => '/horloge',
                'text' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.'
            ],
            [
                'title' => 'Oiseau chanteur lorem ipsum dolor sit amet',
                'image' => 'oiseau.png',
                'link' => '/oiseau',
                'text' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.'
            ],
            [
                'title' => 'Consectitur dolor lorem ispum nemo enim',
                'image' => 'lorem.png',
                'link' => '/lorem',
                'text' => 'Nemo enim ipsam voluptatem quia voluptas sit.'
            ],
            [
                'title' => 'L\'horloge astronomique',
                'image' => 'horloge.png',
                'link' => '/horloge',
                'text' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.'
            ],
            [
                'title' => 'Oiseau chanteur lorem ipsum dolor sit amet',
                'image' => 'oiseau.png',
                'link' => '/oiseau',
                'text' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.'
            ],
            [
                'title' => 'Consectitur dolor lorem ispum nemo enim',
                'image' => 'lorem.png',
                'link' => '/lorem',
                'text' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.'
            ]
        ]
    ]);
?>