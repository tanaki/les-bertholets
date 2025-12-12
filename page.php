<?php
    get_header();
?>
    <main class="page-content">
        <div class="block block-post-content">
            <div class="block-inside">
                <h2>
                    <?php the_title(); ?>
                </h2>
                <div class="block-post-content-container">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </main>
<?php    
    get_footer();
?>