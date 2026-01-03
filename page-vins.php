<?php
/*
Template Name: Wine List Page
*/

get_header();

global $wpdb;

/**
 * -------------------------------------------------------
 * Langue courante (Polylang)
 * -------------------------------------------------------
 */
$lang = function_exists('pll_current_language') ? pll_current_language() : 'fr';

/**
 * -------------------------------------------------------
 * Catégorie parente selon la langue
 * -------------------------------------------------------
 */
$parent_slug = ($lang === 'en') ? 'vins-en' : 'vins';
$parent_cat  = get_category_by_slug($parent_slug);

if (!$parent_cat) {
    echo '<p>Aucune catégorie trouvée.</p>';
    get_footer();
    return;
}

/**
 * -------------------------------------------------------
 * Catégories enfants
 * -------------------------------------------------------
 */
$child_categories = get_categories([
    'taxonomy'   => 'category',
    'child_of'   => $parent_cat->term_id,
    'hide_empty' => false,
    'orderby'    => 'name',
    'order'      => 'ASC',
]);

/**
 * -------------------------------------------------------
 * Catégorie active
 * - ?category=slug
 * - sinon première catégorie
 * -------------------------------------------------------
 */
$active_category_slug = null;

if (!empty($_GET['category'])) {
    $active_category_slug = sanitize_text_field($_GET['category']);
} elseif (!empty($child_categories)) {
    $active_category_slug = $child_categories[0]->slug;
}

/**
 * -------------------------------------------------------
 * Navigation des catégories
 * -------------------------------------------------------
 */
function render_child_categories_nav($categories, $active_category_slug) {

    if (empty($categories)) return;

    echo '<ul class="nav-child-categories">';

    foreach ($categories as $cat) {

        $is_active = ($cat->slug === $active_category_slug) ? 'is-active' : '';

        echo '<li class="nav-item ' . esc_attr($is_active) . '">';
        echo '<a href="' . esc_url(add_query_arg('category', $cat->slug)) . '">';
        echo esc_html($cat->name);
        echo '</a>';
        echo '</li>';
    }

    echo '</ul>';
}

/**
 * -------------------------------------------------------
 * Filtrage catégorie (SQL)
 * -------------------------------------------------------
 */
$where_category = '';

if ($active_category_slug) {
    $where_category = "
        AND t.ID IN (
            SELECT tr2.object_id
            FROM {$wpdb->term_relationships} tr2
            INNER JOIN {$wpdb->term_taxonomy} tt2 ON tr2.term_taxonomy_id = tt2.term_taxonomy_id
            INNER JOIN {$wpdb->terms} t3 ON tt2.term_id = t3.term_id
            WHERE tt2.taxonomy = 'category'
            AND t3.slug = '{$active_category_slug}'
        )
    ";
}

/**
 * -------------------------------------------------------
 * Requête Pods
 * -------------------------------------------------------
 */
$params = [
    'limit'   => -1,
    'orderby' => 'post_title ASC',
    'where'   => "
        t.post_type = 'wines'
        AND t.post_status = 'publish'
        {$where_category}
        AND t.ID IN (
            SELECT tr.object_id
            FROM {$wpdb->term_relationships} tr
            INNER JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
            INNER JOIN {$wpdb->terms} t2 ON tt.term_id = t2.term_id
            WHERE tt.taxonomy = 'language'
            AND t2.slug = '{$lang}'
        )
    ",
];

$pods = pods('wines', $params);

$podPage = pods('page', [
    'limit' => 1,
    'where' => "ID = '". $post->ID ."'"
]);

get_template_part( 'template-parts/common/block-intro', null, array(
    'text' => $podPage->display('intro_text'),
) );

?>
<div class="block block-grid">
    <div class="block-inside">

        
        <?php render_child_categories_nav($child_categories, $active_category_slug); ?>
        
        <?php if ($pods->total() > 0) : ?>

            <div class="block-grid-items">

                <?php while ($pods->fetch()) :

                    $post_id = $pods->field('ID');
                    $item = pods('wines', $post_id);

                    $gallery   = $item->field('wine_gallery');
                    $first_img = (!empty($gallery) && !empty($gallery[0]['guid'])) ? $gallery[0]['guid'] : null;

                    get_template_part(
                        'template-parts/common/component/wine-item',
                        null,
                        [
                            'className'  => 'block-list-item',
                            'image'      => $first_img,
                            'link'       => get_permalink($post_id),
                            'label'      => esc_attr(get_the_title($post_id)),
                            'collection' => $item->display('wine_appellation'),
                            'detail'     => $item->display('wine_category'),
                        ]
                    );

                endwhile; ?>
            </div>

        <?php else : ?>

            <p class="no-wines">
                <?php echo get_label('no-wine-found'); ?>
            </p>

        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>
