<?php
    get_header();

    get_template_part('template-parts/common/block-hero', null, [
        'title' => 'Prestations',
        'chapo' => 'Je restaure des <strong>objets d’art métalliques,</strong> des <strong>pièces mécaniques anciennes</strong> et des <strong>collections horlogères,</strong> avec une approche sur mesure, documentée et respectueuse du patrimoine.'
    ]);

    get_template_part('template-parts/common/block-grid-detail', null, [
        'items' => [
            [
                'icon' => 'icon_globe',
                'title' => 'Études préalables & conseil technique',
                'excerpt' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut.',
                'content' => '<ul><li>Analyse des besoins et du contexte</li><li>État des lieux et constats d’état d’objets ou de collections</li><li>Rédaction de dossiers d\'étude avec propositions de traitement</li><li>Accompagnement dans la définition des stratégies de conservation et restauration</li></ul>'
            ],
            [
                'icon' => 'icon_compass',
                'title' => 'Restauration & conservation d’objets métalliques',
                'excerpt' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut.',
                'content' => '<ul><li>Réalisation de traitements techniques sur objets en métal</li><li>Application des procédés adaptés à la nature des matériaux</li><li>Suivi rigoureux des interventions</li></ul>'
            ],
            [
                'icon' => 'icon_microscope',
                'title' => 'Expertise & investigation scientifique',
                'excerpt' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut.',
                'content' => '<ul><li>Identification des matériaux et procédés de fabrication</li><li>Compréhension du vieillissement des matériaux métalliques</li><li>Études des phénomènes de corrosion et de dégradations chimiques</li></ul>'
            ],
            [
                'icon' => 'icon_erlenmeyer',
                'title' => 'Coordination d’analyses scientifiques',
                'excerpt' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut.',
                'content' => '<ul><li>Mise en relation avec des spécialistes pour des analyses physico-chimiques ciblées</li><li>Sélection des méthodes d’analyse pertinentes selon les objets</li><li>Interprétation des résultats pour orienter les traitements</li></ul>'
            ],
            [
                'icon' => 'icon_feather',
                'title' => 'Recherche historique & documentation',
                'excerpt' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut.',
                'content' => '<ul><li>Recherche sur l’origine, les usages et les transformations des objets</li><li>Mise en perspective historique et technique</li><li>Valorisation documentaire des objets étudiés</li></ul>'
            ],
            [
                'icon' => 'icon_handshake',
                'title' => 'Gestion de projet & coordination d’équipe',
                'excerpt' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut.',
                'content' => '<ul><li>Organisation et pilotage d’équipes pluridisciplinaires</li><li>Suivi de chantiers de conservation/restauration</li><li>Communication avec les différents intervenants (musées, laboratoires, institutions…)</li></ul>'
            ]
        ]
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
        "class" => "bg-purple-light bg-has-circles"
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
    get_footer(); 
?>
