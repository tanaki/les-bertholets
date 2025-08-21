<?php
    $title = $args['title'];
    $clients = $args['clients'];
?>
<div class="block block-clients">
    <div class="block-inside">
        <h3>
            <?php echo $title; ?>
        </h3>
        <ul>
            <?php foreach ( $clients as $key => $client ) : ?>
            <li>
                <a href="<?php echo $client['link']; ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/clients/' . $client['image']; ?>" alt="<?php echo $client['name']; ?>" />
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>