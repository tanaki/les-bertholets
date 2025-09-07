<div class="block block-post-content">
    <div class="block-inside">
        <?php the_content(); ?>
    </div>
</div>

<div class="block block-form-contact">
    <div class="block-inside">

        <div class="h3"><?php echo get_label('title_contact_me', true); ?></div>

        <div class="grid grid-5">
            <div class="col-2 intro-form-contact">
                <?php
                    $pod  = pods( 'page', get_the_ID() );
                    if ( $pod->exists() ) {
                        echo $pod->display('hero_intro');
                    }
                ?>
            </div>

            <div class="col-3">
                <?php echo do_shortcode('[contact-form-7 id="2af8acd" title="Formulaire de contact"]'); ?>
            </div>
        </div>
    </div>
</div>