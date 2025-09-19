<?php
    if ( isset($_GET['preview']) ) {
        // Prestations
        $podsPrestations = pods('prestation', array(
            'limit' => 6,
            'orderby' => 'menu_order'
        ));
        $prestations = array();

        while ( $podsPrestations->fetch() ) :
            $prestations[] = array(
                'title' => $podsPrestations->display('post_title'),
                'image' => $podsPrestations->display('prestation_image'),
                'excerpt' => $podsPrestations->display('prestation_excerpt'),
            );
        endwhile;

        get_header(); 
        
        get_template_part('template-parts/home/block-hero');
        
        get_template_part('template-parts/common/block-grid', null, [
            'title' => get_label('title_prestations', true),
            'items' => $prestations,
            "button" => [
                "label" => get_label('btn_know_more', true),
                "link" => "/prestations"
            ]
        ]);
        
        // Case Studies
        $podsCaseStudies = pods('case_study', array(
            'limit' => -1,
            'orderby' => 'menu_order'
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
            'title' => get_label('title_case_studies', true),
            'items' => $caseStudies,
            "button" => [
                'label' => get_label('btn_see_all', true),
                "link" => "/case-studies"
            ]
        ]);

        get_template_part('template-parts/common/block-columns', null, get_block_contenu('engagements'));

        // Valeurs & vision
        get_template_part(
            'template-parts/common/block-content', 
            null, 
            get_block_content('values_vision', 'bg-purple-light bg-has-circles')
        );

        // Clients & partenaires
        $podsClients = pods('client', array(
            'limit' => -1,
            'orderby' => 'menu_order'
        ));
        $clients = array();

        while ( $podsClients->fetch() ) :
            $clients[] = array(
                'name' => $podsClients->display('post_title'),
                'image' => $podsClients->display('client_logo'),
                'link' => $podsClients->display('client_link'),
            );
        endwhile;

        get_template_part('template-parts/common/block-clients', null, [
            "title" => get_label('title_clients', true),
            "clients" => $clients
        ]);

        get_template_part('template-parts/common/block-contact');
        get_footer(); 

    } else {

        get_template_part('/template-parts/temp');
    }
?>
