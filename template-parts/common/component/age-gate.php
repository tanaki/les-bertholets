<div id="age-gate" class="age-gate--container">
    <div class="age-gate--overlay"></div>
    <div class="age-gate--modal">
        <?php get_template_part('template-parts/common/component/logo'); ?>
        <div class="age-gate--title">
            <?php echo get_label('age_gate_title'); ?>
        </div>
        <div class="age-gate--subtitle">
            <?php echo get_label('age_gate_subtitle'); ?>
        </div>
        <div class="age-gate--text">
            <?php echo get_label('age_gate_text'); ?>
        </div>
        <div class="age-gate--buttons">
            <a href="#" class="button button--primary" data-answer="yes">
                <?php echo get_label('age_gate_btn_yes'); ?>
            </a>
            <a href="#" class="button button--transparent" data-answer="no">
                <?php echo get_label('age_gate_btn_no'); ?>
            </a>
        </div>
    </div>
</div>