<?php
    $allCaseStudies = get_posts([
        'post_type'      => 'case_study', // Vérifie le slug exact
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'orderby'        => 'menu_order'
    ]);

    if ( ! empty($allCaseStudies) ) {
        $currentId = get_the_ID();
        $currentIndex = array_search( $currentId, $allCaseStudies );

        if ($currentIndex !== false) {
            $total = count($allCaseStudies);

            $prevIndex = ($currentIndex - 1 + $total) % $total;
            $nextIndex = ($currentIndex + 1) % $total;

            $prevId = $allCaseStudies[$prevIndex];
            $nextId = $allCaseStudies[$nextIndex];

            $prevTitle = get_the_title($prevId);
            $nextTitle = get_the_title($nextId);
?>
            
            <div class="block block-nav-case-study">
                <div class="block-inside">
                    <div class="prev">
                        <a href="<?php echo get_permalink($prevId); ?>">
                            <span class="thumbnail">
                                <img src="<?php echo get_thumb('case_study', $prevId); ?>" alt="<?php echo $prevTitle; ?>" />
                            </span>
                            <span><?php echo get_label('title_case_study'); ?></span>
                            <span><?php echo get_label('btn_previous'); ?></span>
                            <img class="arrow" src="<?php echo get_template_directory_uri() . '/assets/img/arrow-left.svg'; ?>" alt="Etude de Cas - Précédente" />
                        </a>
                    </div>
                    <div class="next">
                        <a href="<?php echo get_permalink($nextId); ?>">
                            <span class="thumbnail">
                                <img src="<?php echo get_thumb('case_study', $nextId); ?>" alt="<?php echo $nextTitle; ?>" />
                            </span>
                            <span><?php echo get_label('title_case_study'); ?></span>
                            <span><?php echo get_label('btn_next'); ?></span>
                            <img class="arrow" src="<?php echo get_template_directory_uri() . '/assets/img/arrow-left.svg'; ?>" alt="Etude de Cas - Suivante" />
                        </a>
                    </div>
                </div>
            </div>
            
<?php
        }
    }
?>