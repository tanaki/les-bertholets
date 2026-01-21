<?php
// Déclarer un emplacement de menu
function berto_register_menus() {
    register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu', 'berto' ),
        )
    );
}
add_action( 'init', 'berto_register_menus' );

function berto_theme_setup() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'berto_theme_setup' );

function berto_theme_files() { 
    // wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js', array(), false, true );
    // wp_enqueue_script( 'gsap-st', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js', array('gsap-js'), false, true );
    wp_enqueue_script( 'theme_script', get_template_directory_uri() . '/script.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'berto_theme_files');

function berto_theme_add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'berto_theme_add_slug_body_class' );

function get_label(string $key): string {
    static $labels;

    if (!$labels) {
        $labels = require get_template_directory() . '/inc/labels.php';
    }

    // Fallback si la clé n'existe pas
    $default = $labels[$key] ?? $key;

    if (function_exists('pll__')) {
        return pll__($default);
    }

    return $default;
}

function get_icon(string $key): string {
    return '<img 
        class="icon"
        src="'. get_template_directory_uri() .'/assets/img/icons/icon_'. $key .'.png" 
        alt="'. get_label($key) .'">';
}

function get_icon_label(string $key): string {
    return '<img 
        class="icon"
        src="'. get_template_directory_uri() .'/assets/img/icons/icon_'. $key .'.png" 
        alt="'. get_label($key) .'">';
}


add_action('init', function () {

    if (!function_exists('pll_register_string')) {
        return;
    }

    $labels = require get_template_directory() . '/inc/labels.php';

    foreach ($labels as $key => $default) {
        pll_register_string(
            $key,
            $default,
            'Theme labels'
        );
    }
});

add_filter('style_loader_tag', function ($html, $handle, $href) {
  if ($handle === 'theme-style') {
    return "<link rel='preload' as='style' href='$href' onload=\"this.rel='stylesheet'\">";
  }
  return $html;
}, 10, 3);

add_action('wp_footer', function () {
  ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const fileInput = document.querySelector('input[name="your-file"]');

      if (!fileInput) return;

      // Création du bouton "supprimer"
      const removeBtn = document.createElement('button');
      removeBtn.type = 'button';
      removeBtn.innerHTML = '✕';
      removeBtn.className = 'cf7-remove-file';
      removeBtn.style.display = 'none';

      fileInput.parentNode.appendChild(removeBtn);

      // Quand un fichier est sélectionné
      fileInput.addEventListener('change', function () {
        removeBtn.style.display = fileInput.files.length ? 'inline-flex' : 'none';
      });

      // Clic sur la croix
      removeBtn.addEventListener('click', function () {
        fileInput.value = '';
        removeBtn.style.display = 'none';
      });
    });
  </script>
  <?php
});

/*
function get_thumb ( $postType, $id ) {
    return pods($postType, array( 'where'   => 't.ID = "' . $id . '"'))->display('thumbnail_image');
}
function get_block_contenu ( $id, $layout = null, $className = null ) {
    $podContenu = pods( 'block_contenu', [ 'where' => [ 'contenu_id' => $id ] ] );
    $podColumns = array();

    forEach( $podContenu->field('contenu_content') as $key => $column ) {
        
        $relatedPod = pods( 'contenu', $column['ID'] );

        array_push( $podColumns, array(
            "title" => $column['post_title'],
            "icon" => get_the_post_thumbnail_url($column['ID']),
            "content" => $column['post_content'],
            "subtitle" => $relatedPod->display('contenu_subtitle')
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
        "id" => $id,
        "title" => $podContent->display('post_title'),
        "content" => $podContent->display('post_content'),
        "className" => $className
    ];
}

function get_block_split ($id) {
    $podSplit = pods( 'split', [ 'where' => [ 'split_id' => $id ] ] );

    return [
        "id" => $id,
        "title" => $podSplit->display('post_title'),
        "intro" => $podSplit->display('split_intro'),
        "text" => $podSplit->display('split_text'),
        "button" => $podSplit->display('split_btn_label')
    ];
}
*/
?>