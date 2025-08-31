<?php

    // Prestations
    $podsPrestations = pods('prestation', array(
        'limit' => -1
    ));
    $prestations = array();

    while ( $podsPrestations->fetch() ) :
        $prestations[] = array(
            'title' => $podsPrestations->display('post_title'),
            'image' => $podsPrestations->display('prestation_image'),
            'content' => $podsPrestations->display('post_content'),
        );
    endwhile;

    get_template_part('template-parts/common/block-grid-detail', null, [
        'items' => $prestations
    ]);

    get_template_part('template-parts/common/block-content', null, [
        "title" => "Valeurs et vision",
        "content" => "<p><strong>Respect du patrimoine</strong> </p>
        <p>Des objets d’art, de leur histoire, et du travail des conservateurs.</p>
        <p><strong>Transmission & pédagogie</strong></p>
        <p>Engagement fort dans la formation, les échanges interprofessionnels et l’enseignement (INP, journées interprofessionnelles...).</p>
        <p><strong>Justesse & excellence</strong></p>
        <p>une recherche constante d’équilibre entre technicité, éthique, et pertinence des choix.</p>
        <p><strong>Harmonie</strong></p>
        <p>une approche sensible, presque sacrée, du temps, des matériaux, et de la restauration.</p>",
        "className" => "bg-purple-light bg-has-circles"
    ]);

    get_template_part('template-parts/common/block-columns', null, [
        "title" => "Commanditaires",
        "chapo" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "columns" => [
            [
                "title" => "Title block 1",
                "icon" => "icon_building",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
            ],
            [
                "title" => "Title block 2",
                "icon" => "icon_clock",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
            ],
            [
                "title" => "Title block 3",
                "icon" => "icon_frame",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
            ]
        ]
    ]);

    get_template_part('template-parts/case-studies/block-case-studies', null, [
        'title' => 'Etudes de cas',
        'items' => [
            [
                // 'title' => 'L\'horloge astronomique de Besançon',
                'title' => 'L\'horloge astronomique',
                'image' => 'horloge.png',
                'link' => '/horloge'
            ],
            [
                'title' => 'Oiseau chanteur lorem ipsum dolor sit amet',
                'image' => 'oiseau.png',
                'link' => '/oiseau'
            ],
            [
                'title' => 'Consectitur dolor lorem ispum nemo enim',
                'image' => 'lorem.png',
                'link' => '/lorem'
            ]
        ]
    ]);

    get_template_part('template-parts/common/block-columns', null, [
        "layout" => "grid",
        "title" => "Processus de travail",
        "chapo" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "columns" => [
            [
                "title" => "Title block 1",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
            ],
            [
                "title" => "Title block 2",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
            ],
            [
                "title" => "Title block 3",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
            ],
            [
                "title" => "Title block 4",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
            ],
            [
                "title" => "Title block 5",
                "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
            ]
        ]
    ]);

    get_template_part('template-parts/common/block-contact');
?>