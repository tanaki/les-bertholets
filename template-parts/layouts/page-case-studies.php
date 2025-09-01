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
            'text' => $podsCaseStudies->display('hero_intro'),
            'image' => $podsCaseStudies->display('hero_image'),
        );
    endwhile;

    get_template_part('template-parts/case-studies/block-case-studies', null, [
        'className' => 'bg-white bg-full-list',
        'items' => $caseStudies
    ]);
?>