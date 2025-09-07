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
                <?php if ( isset($client['link']) ) { ?><a href="<?php echo $client['link']; ?>" target="_blank"><?php } ?>
                    <img src="<?php echo $client['image']; ?>" alt="<?php echo $client['name']; ?>" />
                <?php if ( isset($client['link']) ) { ?></a><?php } ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>