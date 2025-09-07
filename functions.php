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
?>