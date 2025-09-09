<div class="block block-post-content page-content">
    <div class="block-inside">
        <?php the_content(); ?>
    </div>
</div>
<?php  
    // Valeurs & vision
    get_template_part(
        'template-parts/common/block-content', 
        null, 
        get_block_content('values_vision', 'bg-purple-light bg-has-circles')
    );
?>