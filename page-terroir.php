<?php
    /*
    Template Name: Terroir Page
    */

    function get_region_block_data_from_content( $content ) {
        $data = [
            'title' => '',
            'items' => [],
        ];

        libxml_use_internal_errors( true );

        $dom = new DOMDocument();
        $dom->loadHTML(
            mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' )
        );

        $body = $dom->getElementsByTagName( 'body' )->item( 0 );
        if ( ! $body ) {
            return $data;
        }

        $nodes = iterator_to_array( $body->childNodes );

        $current_item = null;
        $title_set    = false;

        foreach ( $nodes as $node ) {

            // H3 = titre principal (une seule fois)
            if ( $node->nodeName === 'h3' && ! $title_set ) {
                $data['title'] = trim( $node->textContent );
                $title_set = true;
                continue;
            }

            // H4 = nouveau item
            if ( $node->nodeName === 'h4' ) {
                if ( $current_item ) {
                    $data['items'][] = $current_item;
                }

                $current_item = [
                    'title' => trim( $node->textContent ),
                    'text'  => '',
                ];
                continue;
            }

            // Paragraphes liés au dernier H4
            if ( $node->nodeName === 'p' && $current_item ) {
                $current_item['text'] .= trim( $node->textContent ) . ' ';
            }
        }

        // Dernier item
        if ( $current_item ) {
            $data['items'][] = $current_item;
        }

        return $data;
    }


    get_header();

    get_template_part( 'template-parts/common/block-hero', null, array(
        'image' => get_template_directory_uri() . '/assets/img/temp/misc/terroir.jpg',
        'title' => 'Terroir',
    ) );

    $podPage = pods('page', [
        'limit' => 1,
        'where' => "ID = '". $post->ID ."'"
    ]);

    get_template_part( 'template-parts/common/block-intro', null, array(
        'title' => $podPage->display('intro_title'),
        'subtitle' => $podPage->display('intro_subtitle'),
        'text' => $podPage->display('intro_text')
    ) );
    
    $content = apply_filters( 'the_content', get_the_content() );

    $block_data = get_region_block_data_from_content( $content );

    $image_html = get_the_post_thumbnail(
        get_the_ID(),
        'large',
        [
            'loading' => 'lazy',
        ]
    );

    get_template_part(
        'template-parts/region/block-region',
        null,
        [
            'image' => preg_replace('/\s*sizes="[^"]*"/i', '', $image_html),
            'title' => $block_data['title'],
            'items' => $block_data['items'],
        ]
    );

    get_footer();
?>

    