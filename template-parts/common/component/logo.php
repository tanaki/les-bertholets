<?php extract($args); ?>
<div class="logo-collection--container">
    <div class="logo-collection--svg">
        <?php echo file_get_contents( get_template_directory_uri() . '/assets/img/logo'. (isset($mode) && $mode === 'white' ? '_white' : '' ) .'.svg' ); ?>
    </div>
    <?php 
        if ( isset($subtitle) && $subtitle === true ): ?>
        <div class="logo-collection--subtitle <?php echo $mode === 'white' ? 'logo-collection--subtitle--white' : '' ?>">
            Collection
        </div>
    <?php 
        endif;
        if ( isset($signature) && $signature === true ): ?>
        <div class="logo-collection--signature">
            <?php echo file_get_contents( get_template_directory_uri() . '/assets/img/signature-paul-albert'. ($mode === 'white' ? '_white' : '' ) .'.svg' ); ?>
        </div>
    <?php endif; ?>
</div>