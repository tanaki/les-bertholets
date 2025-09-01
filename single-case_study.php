<?php
    get_header();

    $pod  = pods( 'case_study', get_the_ID() );

    if ( $pod->exists() ) {
        get_template_part('template-parts/common/block-hero', null, [
            'title' => $pod->display('post_title'),
            'image' => $pod->display('hero_image')
        ]);
?>
    <div class="block block-post-content">
        <div class="block-inside">
            <?php the_content(); ?>
        </div>
    </div>

<?php
        get_template_part('template-parts/case-studies/block-nav');
    }

    get_footer();
?>