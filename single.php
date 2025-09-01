<?php
    get_header();

    global $post;

    $podPage = pods('page', [
        'limit' => 1,
        'where' => "ID = '". $post->ID ."'"
    ]);

    get_template_part('template-parts/common/block-hero', null, [
        'title' => $podPage->display('post_title'),
        'chapo' => $podPage->display('hero_intro'),
        'image' => $podPage->display('hero_image')
    ]);

    get_footer();
?>