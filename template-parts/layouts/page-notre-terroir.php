<?php
    get_header();

    /*
    global $post;

    $podPage = pods('page', [
        'limit' => 1,
        'where' => "ID = '". $post->ID ."'"
    ]);
    */

    get_template_part( 'template-parts/home/block-hero', null, array(
        'image' => get_template_directory_uri() . '/assets/img/temp/misc/terroir.jpg',
        'title' => 'Terroir',
    ) );
    
    get_template_part( 'template-parts/home/block-intro', null, array(
        'title' => 'Notre terroir',
        'subtitle' => 'The Languedoc-Roussillon Region.',
        'text' => 'Texte sur 2 colonnes si besoin. Texte sur 2 colonnes si besoin? Texte sur 2 colonnes si besoin? Texte sur 2 colonnes si besoin? Texte sur 2 colonnes si besoin, Texte sur 2 colonnes si besoin'
    ) );
    
    get_footer();
?>

    