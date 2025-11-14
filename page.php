<?php
    get_header();

    global $post;

    $podPage = pods('page', [
        'limit' => 1,
        'where' => "ID = '". $post->ID ."'"
    ]);
?>
    <div class="block">
        <div class="block-inside">
            <?php the_title(); ?>
        </div>
    </div>

<?php
    /*
    $slug = $post->post_name;
    if ( locate_template("template-parts/layouts/page-{$slug}.php") ) {
        get_template_part("template-parts/layouts/page", $slug);
    } else {
        get_template_part("template-parts/layouts/page", "default");
    }
    */

    get_footer();
?>