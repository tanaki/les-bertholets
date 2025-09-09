<?php
function rhc_theme_register_columns_variation() {
    wp_enqueue_script(
        'mytheme-columns-variation',
        get_stylesheet_directory_uri() . '/columns-variation.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
        filemtime( get_stylesheet_directory() . '/columns-variation.js' ),
        true
    );
}
add_action( 'enqueue_block_editor_assets', 'rhc_theme_register_columns_variation' );


function rhc_theme_setup() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'rhc_theme_setup' );

function rhc_theme_files() { 
    wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js', array(), false, true );
    wp_enqueue_script( 'gsap-st', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js', array('gsap-js'), false, true );
    wp_enqueue_script( 'theme_script', get_template_directory_uri() . '/script.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'rhc_theme_files');

function rhc_theme_add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'rhc_theme_add_slug_body_class' );

function get_label ( $label, $stripTags = false ) {
    $label = pods('label', array( 'where' => 't.post_title = "' . $label . '"'))->display('label_text');
    return $stripTags ? strip_tags($label) : $label;
}
function get_thumb ( $postType, $id ) {
    return pods($postType, array( 'where'   => 't.ID = "' . $id . '"'))->display('thumbnail_image');
}
function get_block_contenu ( $id, $layout = null, $className = null ) {
    $podContenu = pods( 'block_contenu', [ 'where' => [ 'contenu_id' => $id ] ] );
    $podColumns = array();

    forEach( $podContenu->field('contenu_content') as $key => $column ) {
        array_push( $podColumns, array(
            "title" => $column['post_title'],
            "icon" => get_the_post_thumbnail_url($column['ID']),
            "content" => $column['post_content']
        ));
    }

    $button = null;
    $btnLink = $podContenu->display('btn_link');
    $btnLabel = $podContenu->display('btn_label');
    if ( isset($btnLink) && isset($btnLabel) && !empty($btnLink) && !empty($btnLabel) ) {
        $button = [
            "label" => $btnLabel,
            "link" => $btnLink
        ];
    }
    
    return [
        "title" => $podContenu->display('post_title'),
        "chapo" => $podContenu->display('post_content'),
        "columns" => $podColumns,
        "layout" => $layout,
        "button" => $button,
        "className" => $className
    ];
}

function get_block_content ($id, $className = null) {
    $podContent = pods( 'block_contenu', [ 'where' => [ 'contenu_id' => $id ] ] );

    return [
        "title" => $podContent->display('post_title'),
        "content" => $podContent->display('post_content'),
        "className" => $className
    ];
}
?>