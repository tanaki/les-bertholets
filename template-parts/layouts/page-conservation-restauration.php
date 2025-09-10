<?php
    get_template_part('template-parts/common/block-split', null, array(
        "left" => get_block_split('conservation'),
        "right" => get_block_split('restauration')
    ));

    // conservation
    get_template_part(
        'template-parts/common/block-content', 
        null, 
        get_block_content('conservation', 'bg-purple-light')
    );

    // restauration
    get_template_part(
        'template-parts/common/block-content', 
        null, 
        get_block_content('restauration', 'bg-green-dark')
    );

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
            "link" => "/case-studies",
            "className" => "button-dark"
        ],
        'className' => 'light-mode'
    ]);

    get_template_part('template-parts/common/block-contact');
?>