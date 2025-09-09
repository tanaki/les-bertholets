<?php

    // Prestations
    $podsPrestations = pods('prestation', array(
        'limit' => -1,
        'orderby' => 'menu_order'
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

    // Valeurs & vision
    get_template_part(
        'template-parts/common/block-content', 
        null, 
        get_block_content('values_vision', 'bg-purple-light bg-has-circles')
    );

    get_template_part('template-parts/common/block-columns', null, get_block_contenu('sponsors'));
    
    // Case Studies
    $podsCaseStudies = pods('case_study', array(
        'limit' => -1
    ));
    $caseStudies = array();

    while ( $podsCaseStudies->fetch() ) :
        $caseStudies[] = array(
            'title' => $podsCaseStudies->display('post_title'),
            'slug' => $podsCaseStudies->display('post_name'),
            'image' => $podsCaseStudies->display('thumbnail_image'),
        );
    endwhile;

    get_template_part('template-parts/case-studies/block-case-studies', null, [
        "title" => get_label('title_case_studies', true),
        'items' => $caseStudies,
        "button" => [
            "label" => get_label('btn_see_all', true),
            "link" => "/case-studies"
        ]
    ]);

    get_template_part('template-parts/common/block-columns', null, get_block_contenu('work_process', 'grid'));

    get_template_part('template-parts/common/block-contact');
?>