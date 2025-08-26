<?php
    get_header();

    get_template_part('template-parts/common/block-hero', null, [
        'title' => 'Etude de Cas',
        'chapo' => 'Je restaure des objets d’art métalliques, des pièces mécaniques anciennes et des collections horlogères, avec une approche sur mesure, documentée et respectueuse du patrimoine.'
    ]);

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

    get_footer(); 
?>
