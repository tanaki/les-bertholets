<?php
    /*
    Template Name: Wine List Page
    */

    function render_child_categories_nav($slug_fr, $slug_en) {
        // Détecte la langue (WPML / Polylang ou autre)
        $lang = function_exists('pll_current_language') ? pll_current_language() : 'fr'; // exemple avec Polylang
        $slug = ($lang === 'en') ? $slug_en : $slug_fr;

        // Récupère la catégorie parent par slug
        $parent_cat = get_category_by_slug($slug);
        if (!$parent_cat) return; // si la catégorie n'existe pas

        // Récupère les enfants
        $child_categories = get_categories([
            'taxonomy'   => 'category',  // ou ton slug Pods si custom
            'child_of'   => $parent_cat->term_id,
            'hide_empty' => false,
            'orderby'    => 'name',
            'order'      => 'ASC',
        ]);

        if (!empty($child_categories)) {
            echo '<ul class="nav-child-categories">';
            foreach ($child_categories as $cat) {
                echo '<li class="nav-item">';
                echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' 
                    . esc_html($cat->name) . '</a>';
                echo '</li>';
            }
            echo '</ul>';
        }
    }

    get_header();

    global $wpdb;

    $lang = pll_current_language(); // ex : 'fr'

    $params = [
        'limit'      => -1,
        'orderby'    => 'post_title ASC',
        'where'      => "
            t.post_type = 'wines'
            AND t.post_status = 'publish'
            AND t.ID IN (
                SELECT tr.object_id
                FROM {$wpdb->term_relationships} tr
                INNER JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                INNER JOIN {$wpdb->terms} t2 ON tt.term_id = t2.term_id
                WHERE tt.taxonomy = 'language'
                AND t2.slug = '$lang'
            )
        ",
    ];

    $pods = pods( 'wines', $params );

    $wines = [];

    if ( $pods->total() > 0 ) :
        while ( $pods->fetch() ) :

            $id = $pods->field('ID');

            $wines[] = [
                'ID'      => $id,
                'slug'    => $pods->field('post_name'),
                'title'   => get_the_title($id),
                'content' => apply_filters('the_content', get_post_field('post_content', $id)),
            ];

        endwhile;
    endif;
?>

<div class="block block-grid">
    <div class="block-inside">

        <?php render_child_categories_nav('vins', 'wines'); ?>

        <?php if ( isset($title) ) : ?>
            <h3>
                <?php echo $title; ?>
            </h3>
        <?php endif; ?>
        <div class="block-grid-items">

            <?php foreach ( $wines as $key => $wine ) :
                
                $post_id = $wine['ID'];
                $item = pods('wines', $post_id);
                $gallery = $item->field('wine_gallery');
                $first_img = (!empty($gallery) && !empty($gallery[0]['guid'])) ? $gallery[0]['guid'] : null;
                
                get_template_part('template-parts/common/component/wine-item', null, array(
                    "className" => "block-list-item",
                    "image" => $first_img,
                    "link" => get_permalink($post_id),
                    "label" => esc_attr(get_the_title($post_id)),
                    "collection" => $item->display('wine_appellation'),
                    "detail" => $item->display('wine_category'),
                ));
            endforeach; ?>
        </div>  
    </div>
</div>

<?php
    get_footer();
?>