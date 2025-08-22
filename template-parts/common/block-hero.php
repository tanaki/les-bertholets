<?php
    $title = $args['title'];
    $chapo = $args['chapo'];
?>
<div class="block block-hero">

    <div class="block-inside">
        <h1><?php echo $title; ?></h1>
        <?php if (isset($chapo) && !empty($chapo)) echo '<div class="chapo">'.$chapo.'</div>'; ?>
    </div>
</div>