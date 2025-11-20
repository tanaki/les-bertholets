<?php
    /*
    Template Name: Wine List Page
    */

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

    // TEMPS
    $wines = array_merge(...array_fill(0, 6, $wines));
?>
<div class="block block-grid">
    <div class="block-inside">
        <?php if ( isset($title) ) : ?>
            <h3>
                <?php echo $title; ?>
            </h3>
        <?php endif; ?>
        <div class="block-grid-items">
            <?php 
                foreach( $wines as $key => $wine ) {
                    echo '<a href="' . get_permalink( $wine['ID'] ) . '" class="block-list-item">';
                        echo '<h4>' . $wine['title'] . '</h4>';
                        echo '<img src="' . get_the_post_thumbnail_url( $wine['ID'], 'medium' ) . '" alt="' . $wine['title'] . '"/>';
                    echo '</a>';
                }
            ?>
        </div>  
    </div>
</div>

<?php
    get_footer();
?>