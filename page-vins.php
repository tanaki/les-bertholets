<?php
    /*
    Template Name: Wine List Page
    */

    get_header();

    $args = array(
        'post_type'      => 'wines', 
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'lang'           => pll_current_language(),
    );

    $query = new WP_Query( $args );

    $wines = array();

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();

            $wines[] = array(
                'ID'       => get_the_ID(),
                'slug'     => get_post_field( 'post_name', get_the_ID() ),
                'title'    => get_the_title(),
                'content'  => get_the_content(),
            );

        endwhile;
        wp_reset_postdata();
    endif;
?>
<div class="block block-list <?php if ( isset($className) ) echo $className; ?>">
    <div class="block-inside">
        <?php if ( isset($title) ) : ?>
            <h3>
                <?php echo $title; ?>
            </h3>
        <?php endif; ?>
        <div class="block-list-items animate-list">
            <?php 
                foreach( $wines as $key => $wine ) {
                    echo '<a href="' . get_permalink( $wine['ID'] ) . '" class="block-list-item">';
                        echo '<h4>' . $wine['title'] . '</h4>';
                    echo '</a>';
                }
            ?>
        </div>
<!-- 
        <?php if ( isset($buttonLabel) && isset($buttonLink) ) : ?>
            <a class="button <?php echo $buttonClassName; ?> animate-button" href="<?php echo $buttonLink; ?>"><?php echo $buttonLabel; ?></a>
        <?php endif; ?> -->
    </div>
</div>

<?php
    get_footer();
?>