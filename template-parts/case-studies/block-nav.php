<?php
    $all_case_studies = get_posts([
        'post_type'      => 'case_study', // Vérifie le slug exact
        'posts_per_page' => -1,
        'fields'         => 'ids'
    ]);

    if ( ! empty($all_case_studies) ) {
        $current_id = get_the_ID();
        $current_index = array_search( $current_id, $all_case_studies );

        if ($current_index !== false) {
            $total = count($all_case_studies);

            $prev_index = ($current_index - 1 + $total) % $total;
            $next_index = ($current_index + 1) % $total;

            $prev_id = $all_case_studies[$prev_index];
            $next_id = $all_case_studies[$next_index];
?>
            
            <div class="block block-nav-case-study">
                <div class="block-inside">
                    <div class="prev">
                        <a href="<?php echo get_permalink($prev_id); ?>">
                            ← <?php echo get_the_title($prev_id); ?>
                        </a>
                    </div>
                    <div class="next">
                        <a href="<?php echo get_permalink($next_id); ?>">
                            <?php echo get_the_title($next_id); ?> →
                        </a>
                    </div>
                </div>
            </div>
            
<?php
        }
    }
?>